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
use App\Models\CampaignsCustomParameter;
use App\Models\CampaignsLinks;
use App\Models\Link;
use App\Models\Template;
use App\Models\Templates;
use Mockery\Generator\Parameter;

class CampaignsController extends Controller
{
    protected $table = 'campaigns';

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
        $campaign = new Campaign();
        $data['campaigns'] = $campaign->getCampaigns(session('selected_project'));
        return view('campaigns.index',$data);
    }



   

    /*
    * Listing methods
    */
    public function testing(Request $request)
    {
        $url = trim($request->url);

        $domain = "";
        $query ="";
        $fragment = "";

        if(strpos($url,'#')) {
            $exploded = explode('#',$url);
            $url = $exploded[0];
            $fragment = $exploded[1];
        }
        if(strpos($url,'?')) {
            $exploded2 = explode('?',$url);
            $domain = $exploded2[0];
            $query = $exploded2[1];
        }
        $data['domain'] = $domain;
        $data['query'] = $query;
        $data['fragment'] = $fragment;

        return view('campaigns.testing',$data);
    }
    public function view($id = null)
    {
        $data['data'] = Campaign::findOrFail($id);
        return view('campaigns.view',$data);
    }
    public function templates($id = null)
    {
        $templates = new Templates();
        $data['templates'] = $templates->get_templates(session('selected_project'));
        return view('campaigns.templates',$data);
    }
    public function links($id = null)
    {
        $links = new CampaignsLinks();
        $data['links'] = $links->get_links(session('selected_project'));
        return view('campaigns.links',$data);
    }
    public function custom_parameters()
    {
        $parameters = new CampaignsCustomParameter();
        $data['parameters'] = $parameters->get_custom_parameters(session('selected_project'));
        return view('campaigns.custom_parameters', $data);
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
    public function new_template($id=null)
    {
        $pro = session('selected_project');
        $content = new Content();
        $sources = new Source();
        $mediums = new Medium();
        $terms = new Term();
        $parameters = new CampaignsCustomParameter();

        $data['sources'] = $sources->getSources($pro);
        $data['mediums'] = $mediums->getMediums($pro);
        $data['terms'] = $terms->getTerms($pro);
        $data['contents'] = $content->getContents($pro);
        $data['parameters'] = $parameters->get_custom_parameters($pro);

        return view('campaigns.new_template',$data);
    }
    public function new_link($id=null)
    {
        if(!$id == null) {
            $data['campaign_id'] = $id;
        } else {
            $data['campaign_id'] = null;
        }
        $pro = session('selected_project');
        $content = new Content();
        $sources = new Source();
        $mediums = new Medium();
        $terms = new Term();
        $campaigns = new Campaign();
        $parameters = new CampaignsCustomParameter();

        $data['sources'] = $sources->getSources($pro);
        $data['mediums'] = $mediums->getMediums($pro);
        $data['terms'] = $terms->getTerms($pro);
        $data['contents'] = $content->getContents($pro);
        $data['campaigns'] = $campaigns->getCampaigns($pro);
        $data['parameters'] = $parameters->get_custom_parameters($pro);

        return view('campaigns.new_link',$data);
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
    public function new_custom_parameter()
    {
        return view('campaigns.new_custom_parameter');
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
            redirect()->route('campaigns')->with('success', 'The campaign was successfully updated.');
        } else {
            redirect()->route('campaigns')->with('error', 'Error! The campaign could not be updated.');
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
        // dd($request);
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
            redirect()->route('campaigns')->with('success', 'The campaign was successfully registered.')->send();
        } else {
            redirect()->route('campaigns')->with('error', 'Error! The campaign could not be saved.')->send();
        }
    }
    
    protected function token($var = null)
    {
        $customAlphabet = '0123456789abcdefghjklmnpqrstvwxyzABCDEFGHJKLMNPQRSTVWXYZ';
        $generator = new LinkTokenController($customAlphabet);
        $tokenlength = '6';
        $token = $generator->generate($tokenlength);
        return $token;
    }
    public function save_template(Request $request)
    {
        //dd($request);
        $data = new Template();
        $data->template_name = $request->template_name;
        $data->project_token = session('selected_project');
        $data->source = $request->source;
        $data->medium = $request->medium;
        $data->term = $request->term;
        $data->content = $request->content;
        $data->parameters = serialize($request->parameters);
        if($data->save()) {
            return redirect()->route('campaigns.templates')->with('success','The Template was successfully added');
        } else {
            return redirect()->route('campaigns.templates')->with('error','Error! The Template was not added');
        }
    }
 
    public function save_link(Request $request)
    {
        //dd($request);
        $campaign  = new Campaign();
        $data = new CampaignsLinks();
        $data->link_token = $this->token();
        $data->landing_page = trim($request->landing_page);
        $data->project_token = session('selected_project');
        $campaignID = $request->set_campaign_id ?: $request->campaign;
       
        $campaign_name = $campaign->get_campaign_name($campaignID);
        $campaign_name = $campaign_name[0];
        $campaign_name = str_replace( "-", " ", $campaign_name);
        $campaign_name = preg_replace('/\s+/', '_', $campaign_name);

        $data->campaign_name = strtolower($campaign_name);
        $data->source = strtolower($request->source);
        $data->medium = strtolower($request->medium);
        $data->term = strtolower($request->term);
        $data->content = strtolower($request->content);
        $data->target = strtolower($request->target);
        $data->campaign_id = strtolower($campaignID);
        $data->custom_parameters = serialize($request->parameters);

        $url = trim($request->landing_page);

        $domain = "";
        $query ="";
        $fragment = "";
        $exploded = "";
        $exploded2 = "";
        $question = false;
        $utm = "";
        $fragments = false;

        if(strpos($url,'#')) {
            $exploded = explode('#',$url);
            $url = $exploded[0];
            $fragments = true;
            $fragment = $exploded[1];
        }
        if(strpos($url,'?')) {
            $exploded2 = explode('?',$url);
            $domain = $exploded2[0];
            $query = $exploded2[1];
            $question = true;
        } else {
            $domain = $url;
        }
        if($question) {
            $utm = strtolower($domain).strtolower($query).'&utm_campaign='.$data->campaign_name;
        } else {
            $utm = strtolower($domain).strtolower($question).'?utm_campaign='.strtolower($data->campaign_name);
        }
        if($data->source != null) {
            $utm= $utm.'&utm_source='.strtolower($data->source);
        }
        if($data->medium != null) {
            $utm = $utm.'&utm_medium='.strtolower($data->medium);
        }
        if($data->term != null) {
            $utm = $utm.'&utm_term='.strtolower($data->term);
        }
        if($data->content != null) {
            $utm = $utm.'&utm_content='.strtolower($data->content);
        }
        if(count($request->parameters) >0) {
            foreach($request->parameters as $key => $value) {
                if(!empty($value)) {
                    $utm = strtolower($utm).'&'.strtolower($key).'='.strtolower($value);
                }
            }
        }
        if($fragments) {
            $utm = $utm.'#'.$fragment;
        }
        $data->tagged_url = $utm;
        $data->marcam = "https://marc.am/".$data->link_token;

        if($data->save()) {
            return redirect()->route('campaigns.links')->with('success','The Link was successfully added');
        } else {
            return redirect()->route('campaigns.links')->with('error','Error! The Link was not added');
        }
    }
    public function save_term(Request $request)
    {
        // dd($request);
        $data = new Term();
        $data->term = $request->campaign_term;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect()->route('campaigns.terms')->with('success','The Term was successfully added');
        } else {
            return redirect()->route('campaigns.terms')->with('error','Error! The Term was not added');
        }
    }
    public function save_custom_parameter(Request $request)
    {
       // dd($request);
        $data = new CampaignsCustomParameter();
        $data->custom_parameter = $request->campaign_parameter;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect()->route('campaigns.custom_parameters')->with('success','The Custom Parameter was successfully added');
        } else {
            return redirect()->route('campaigns.custom_parameters')->with('error','Error! The Custom Parameter was not added');
        }
    }
    public function save_medium(Request $request)
    {
        // dd($request);
        $data = new Medium();
        $data->medium = $request->campaign_medium;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect()->route('campaigns.mediums')->with('success','The Medium was successfully added');
        } else {
            return redirect()->route('campaigns.mediums')->with('error','Error! The Medium was not added');
        }
    }
    public function save_source(Request $request)
    {
        // dd($request);
        $data = new Source();
        $data->source = $request->source_name;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect()->route('campaigns.sources')->with('success','The Source was successfully added');
        } else {
            return redirect()->route('campaigns.sources')->with('error','Error! The Source was not added');
        }
    }
    public function save_content(Request $request)
    {
        // dd($request);
        $data = new Content();
        $data->content = $request->campaign_content;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect()->route('campaigns.contents')->with('success','The Content was successfully added');
        } else {
            return redirect()->route('campaigns.contents')->with('error','Error! The Content was not added');
        }
    }
    public function storecategory(Request $req)
    {
        // dd($request);
        $data = new CampaignsCategory();
        $data->name = $req->campaigncategory_name;
        $data->project_token = session('selected_project');
        if($data->save()) {
            return redirect()->route('campaigns.categories')->with('success','The Category was successfully added');
        } else {
            return redirect()->route('campaigns.categories')->with('error','Error! The category was not added');
        }
    }
    public function savecategory(Request $req)
    {
        // dd($request);
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
        // dd($request);
        $data = Campaign::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns')->with('success','The project was successfully deleted.');
        } else {
            return redirect()->route('campaigns')->with('success','Error. Could not delete the project');
        }
       
    }
    public function delete_custom_parameter($id)
    {
        // dd($request);
        $data = CampaignsCustomParameter::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns.custom_parameters')->with('success','The Custom Parameter was successfully deleted.');
        } else {
            return redirect()->route('campaigns.custom_parameters')->with('success','Error. Could not delete the Custom Parameter');
        }
    }
    public function medium_delete($id)
    {
        // dd($request);
        $data = Medium::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns.mediums')->with('success','The medium was successfully deleted.')->send();
        } else {
            return redirect()->route('campaigns.mediums')->with('success','Error. Could not delete the medium')->send();
        }
    }
    public function deletecategory($id)
    {
        // dd($request);
        $data = CampaignsCategory::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns.categories')->with('success','The category was successfully deleted.');
        } else {
            return redirect()->route('campaigns.categories')->with('success','Error. Could not delete the category');
        }
    }
    public function content_delete($id)
    {
        // dd($request);
        $data = Content::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns.contents')->with('success','The content was successfully deleted.')->send();
        } else {
            return redirect()->route('campaigns.contents')->with('success','Error. Could not delete the content')->send();
        }
    }
    public function term_delete($id)
    {
        // dd($request);
        $data = Term::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns.terms')->with('success','The term was successfully deleted.')->send();
        } else {
            return redirect()->route('campaigns.terms')->with('success','Error. Could not delete the term')->send();
        }
    }
    public function delete_link($id)
    {
        // dd($request);
        $data = CampaignsLinks::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns.links')->with('success','The Link was successfully deleted.')->send();
        } else {
            return redirect()->route('campaigns.links')->with('success','Error. Could not delete the link')->send();
        } 
    }
    public function delete_template($id)
    {
        // dd($request);
        $data = Template::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns.templates')->with('success','The Template was successfully deleted.')->send();
        } else {
            return redirect()->route('campaigns.templates')->with('success','Error. Could not delete the template')->send();
        } 
    }
    public function source_delete($id)
    {
        // dd($request);
        $data = Source::findOrFail($id);
        $res = $data->delete();
        if($res){
            return redirect()->route('campaigns.sources')->with('success','The source was successfully deleted.')->send();
        } else {
            return redirect()->route('campaigns.sources')->with('success','Error. Could not delete the source')->send();
        }
    }
  
}
