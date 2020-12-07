<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Http\Controllers\campaigns\linkTokenController;
use Illuminate\Support\Facades\Auth;
use App\Models\CampaignsCategory;

class CampaignsController extends Controller
{
    protected $table = 'campaigns';

    protected $fillable = [
        'id', 'campaign_name', 
        'campaign_spend', 'project_token', 'created_by',
        'start','end', 
        'created_at', 'status', 
        'updated_at', 'template', 
        'category'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function access(Request $req = null)
    {
        if(!session('selected_project')) {
            redirect('home')->flash('info','You need to select a project first.')->send();
        }
    }

    public function index(request $request) {
        $data['campaigns'] = Campaign::all();
        return view('campaigns.index',$data);
    }
    public function addcategory()
    {
        return view('campaigns.addcategory');
    }
    public function gantt()
    {
        return view('campaigns.gantt');
    }
    public function save(Request $request)
    {
        dd($request);
        
        $camp = new Campaign();
        $camp->campaign_name = $request->campaign_name;
        $camp->campaign_spend = $request->campaign_spend;
        $camp->start = $request->start;
        $camp->end = $request->end;
        $camp->created_by = Auth::id();
        $camp->project_token = session('selected_project');
        $res = $camp->save();
        if($res){
            redirect('campaigns')->with('success', 'The campaign was successfully registered.');
        } else {
            redirect('campaigns')->with('error', 'Error! The campaign could not be saved.');
        }
    }

    public function update(Request $request)
    {
        $camp = Campaign::find($request->campaign_id);
        $camp->campaign_name = $request->campaign_name;
        $camp->campaign_spend = $request->campaign_spend;
        $camp->start = $request->start;
        $camp->end = $request->end;
        $camp->created_by = Auth::id();
        $res = $camp->save();
    if($res){
            redirect('campaigns')->with('success', 'The campaign was successfully updated.');
        } else {
            redirect('campaigns')->with('error', 'Error! The campaign could not be updated.');
        }
    }

    public function new($id=null) //set session project ID
    {
        if(!session('selected_project')) {
            back();
        }
        $data['categories'] = CampaignsCategory::all();
        $data['selected_project'] = session('selected_project');
        return view('campaigns.new',$data);
    }

    public function edit($id = null)
    {
        $data['data'] = Campaign::findOrFail($id);
        return view('campaigns.edit',$data);
    }
    public function view($id = null)
    {
        $data['data'] = Campaign::findOrFail($id);
        return view('campaigns.view',$data);
    }

    public function delete($id=null)
    {
        $data = Campaign::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect('campaigns')->with('success','The project was successfully deleted.');
        } else {
            return redirect('campaigns')->with('success','Error. Could not delete the project');
        }
       
    }

    public function savecategory(Request $req)
    {
        $data = new CampaignsCategory();
        $data->name = $req->name;
        $data->project_token = session('selected_project');
        if($data->save()) {
            $category = CampaignsCategory::find($data->id);
            $response['id'] = $category->id;
            $response['name'] = $category->name;
            return response()->json([
                'status' => 'success',
                'id'=> $category->id,
                'name' => $category->name
                ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
    public function storecategory(Request $req)
    {
        $data = new CampaignsCategory();
        $data->name = $req->campaigncategory_name;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect('/campaigns/categories')->with('success','The Category was successfully added');
        } else {
            return redirect('/campaigns/categories')->with('error','Error! The category was not added');
        }
    }
    public function deletecategory($id)
    {
        $data = CampaignsCategory::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect('/campaigns/categories')->with('success','The category was successfully deleted.');
        } else {
            return redirect('/campaigns/categories')->with('success','Error. Could not delete the category');
        }
    }

    public function categories()
    {
        $cats = new CampaignsCategory();
        $data['categories'] = $cats->getCategories(session('selected_project'));
        return view('campaigns.categories',$data);
    }
}
