<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    

    public function index()
    {
        $project_id = session('selected_project');
        $data = new Link();
        $data->get_project_links($project_id);
        
        return view('campaigns.links',$data);
    }
    public function store(Request $request)
    {
        $link = new Link();

        $link->type = $request->type;
        $link->source = $request->source;
        $link->target = $request->target;

        $link->save();

        return response()->json([
            'action' => 'inserted',
            'tid' => $link->id
        ]);
    }

    public function update(Request $request)
    {
        $link = new Link();

        $link->type = $request->type;
        $link->source = $request->type;
        $link->target = $request->target;

        $link->save();

        return response()->json([
            'action' => 'updated'
        ]);
    }

    public function destroy($id)
    {
        $link = Link::find($id);
        $link->delete();

        return response()->json([
            'action' => 'deleted'
        ]);
    }
}
