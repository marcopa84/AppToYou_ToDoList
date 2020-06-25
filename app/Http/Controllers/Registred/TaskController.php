<?php

namespace App\Http\Controllers\Registred;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();

        return view('registred.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registred.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


        $newTask = new Task;
        $newTask->user_id = Auth::id();
        $newTask->text = $data['text'];
        $newTask->date = $data['date'];
        $newTask->priority = $data['priority'];

        $saved = $newTask->save();


        if (!$saved) {
            return redirect()->back()->with('error', 'Task Store ERROR!');;
        }

        return redirect()->route('registred.index')->with('message', 'Task Stored!');
    }
   
}
