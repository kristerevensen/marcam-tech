<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Http\Controllers\campaigns\linkTokenController;
use Illuminate\Support\Facades\Auth;
use App\Models\CampaignsCategory;
use App\Models\Content;
use App\Models\Medium;
use App\Models\Source;
use App\Models\Term;

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
     **/
    public function __construct()
    {
        $this->middleware('auth');
    }
  


    /**
     * Index Method
     **/
    public function index(request $request) {
        $data['campaigns'] = Campaign::all();
        return view('campaigns.index',$data);
    }



   

    /*
    * Listing methods
    */
    public function view($id = null)
    {
        $data['data'] = Campaign::findOrFail($id);
        return view('campaigns.view',$data);
    }
    public function categories()
    {
        $cats = new CampaignsCategory();
        $data['categories'] = $cats->getCategories(session('selected_project'));
        return view('campaigns.categories',$data);
    }
    public function sources()
    {
        $sources = new Source();
        $data['sources'] = $sources->getSources(session('selected_project'));
        return view('campaigns.sources',$data);
    }
    public function mediums()
    {
        $mediums = new Medium();
        $data['mediums'] = $mediums->getMediums(session('selected_project'));
        return view('campaigns.mediums',$data);
    }
    public function contents()
    {
        $contents = new Content();
        $data['contents'] = $contents->getContents(session('selected_project'));
        return view('campaigns.contents',$data);
    }
    public function terms()
    {
        $terms = new Term();
        $data['terms'] = $terms->getTerms(session('selected_project'));
        return view('campaigns.terms',$data);
    }




    /*
    * Creating methods
    */
    public function new_source()
    {
        return view('campaigns.new_source');
    }
    public function addcategory()
    {
        return view('campaigns.addcategory');
    }
    public function new_medium()
    {
        return view('campaigns.new_medium');
    }
    public function new_content()
    {
        return view('campaigns.new_content');
    }
    public function new_term()
    {
        return view('campaigns.new_term');
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
    
   
  
        
    /*
    * Update methods
    */
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



    /*
    * Edit methods
    */
    public function edit($id = null)
    {
        $data['data'] = Campaign::findOrFail($id);
        return view('campaigns.edit',$data);
    }
  
  
   

    /*
    * Save methods
    */
    public function save(Request $request)
    {

        $camp = new Campaign();
        $camp->campaign_name = $request->campaign_name;
        $camp->campaign_spend = $request->campaign_spend;
        $camp->start = $request->start;
        $camp->end = $request->end;
        $camp->status = $request->campaign_status;
        $camp->category = $request->campaign_category;
        $camp->template = $request->campaign_template;
        $camp->model = $request->model;
        $camp->reporting = $request->campaign_reportings;
        $camp->created_by = Auth::id();
        $camp->project_token = session('selected_project');
        $res = $camp->save();
        if($res){
            redirect('campaigns')->with('success', 'The campaign was successfully registered.')->send();
        } else {
            redirect('campaigns')->with('error', 'Error! The campaign could not be saved.')->send();
        }
    }
    public function save_term(Request $request)
    {
        $data = new Term();
        $data->term = $request->campaign_term;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect('/campaigns/terms')->with('success','The Term was successfully added');
        } else {
            return redirect('/campaigns/terms')->with('error','Error! The Term was not added');
        }
    }
    public function save_medium(Request $request)
    {
        $data = new Medium();
        $data->medium = $request->campaign_medium;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect('/campaigns/mediums')->with('success','The Medium was successfully added');
        } else {
            return redirect('/campaigns/mediums')->with('error','Error! The Medium was not added');
        }
    }
    public function save_source(Request $request)
    {
        $data = new Source();
        $data->source = $request->source_name;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect('/campaigns/sources')->with('success','The Source was successfully added');
        } else {
            return redirect('/campaigns/sources')->with('error','Error! The Source was not added');
        }
    }
    public function save_content(Request $request)
    {
        $data = new Content();
        $data->content = $request->campaign_content;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect('/campaigns/contents')->with('success','The Content was successfully added');
        } else {
            return redirect('/campaigns/contents')->with('error','Error! The Content was not added');
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




    
     /*
    * Delete methods
    */
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
    public function medium_delete($id)
    {
        $data = Medium::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect('/campaigns/mediums')->with('success','The medium was successfully deleted.')->send();
        } else {
            return redirect('/campaigns/mediums')->with('success','Error. Could not delete the medium')->send();
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
    public function content_delete($id)
    {
        $data = Content::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect('/campaigns/contents')->with('success','The content was successfully deleted.')->send();
        } else {
            return redirect('/campaigns/contents')->with('success','Error. Could not delete the content')->send();
        }
    }
    public function term_delete($id)
    {
        $data = Term::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect('/campaigns/terms')->with('success','The term was successfully deleted.')->send();
        } else {
            return redirect('/campaigns/terms')->with('success','Error. Could not delete the term')->send();
        }
    }
    public function source_delete($id)
    {
        $data = Source::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect('/campaigns/sources')->with('success','The source was successfully deleted.')->send();
        } else {
            return redirect('/campaigns/sources')->with('success','Error. Could not delete the source')->send();
        }
    }
  
}
