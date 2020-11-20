<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Task;


class GanttController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function get()
    {
        $tasks = new Task();
        $links = new Link();

        return response()->json([
            'data' => $tasks->all(),
            'links' => $links->all()
        ]);
    }

    public function gantt(){
        return view('gantt.gantt');
    }
}
