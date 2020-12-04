<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Campaigns\LinkTokenController;

class HomeController extends Controller
{
    protected $table = 'projects';

    protected $fillable = [
        'id', 'project_name', 
        'url', 'location', 'language',
        'description','updated_at', 
        'created_at', 'project_token'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) 
    {
        $data['projects'] = Project::all();
        return view('home',$data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new(Request $request)
    {
        return view('projects.new');
    }

    public function create(Request $request)
    {
        return view('projects.wizard');
    }

    public function update(Request $request)
    {
        $data = Project::find($request->project_id);
        $data->project_name = $request->project_name;
        $data->location = $request->project_location;
        $data->language = $request->project_language;
        $data->description = $request->project_description;
        $data->url = $request->project_url;
        $data->save();
        redirect('home');
    }
    protected function token($var = null)
    {
        $customAlphabet = '0123456789ABCDEFGHIJKLMNOP';
        $generator = new LinkTokenController($customAlphabet);
        $tokenlength = '6';
        $token = $generator->generate($tokenlength);
        return $token;
    }
    
    public function edit($token)
    {
        $data['data']= DB::table('projects')
                            ->where('project_token',$token)
                            ->first();
        return view('projects.edit',$data);
    }

    public function save(Request $request)
    {
        
        $project = new Project();
        $project->project_name = $request->project_name;
        $project->location = $request->project_location;
        $project->language = $request->project_language;
        $project->project_token = $this->token();
        $project->description = $request->project_description;
        $project->url = $request->project_url;

        $project->save();
        return redirect('home')->with('success','Project successfully added.');;
    }

    public function delete($id = null)
    {
        $data = new Project();
        $res = $data->delete_project($id);
        if($res){
            return redirect('home')->with('success','The project was successfully deleted.');
        } else {
            return redirect('home')->with('success','Error. Could not delete the project');
        }
       
    }

    function select($id = null)
    {    
        
        $data = DB::table('projects')
                            ->where('project_token',$id)
                            ->first();
        session([
            'selected_project' => $id,
            'selected_project_name' => $data->project_name
        ]);

        return back();
    }
    public function deselect($var = null)
    {
        
        session()->forget('selected_project');
        session()->forget('selected_project_name');
        session('selected_project', null);
        session('selected_project_name', null);
        return redirect('home');
    }
}
