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
        $tasks = Task::where('user_id', Auth::id())->orderBy('date', 'asc')->get();

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

        $request->validate([
            'text' => 'required|string',
            'date' => 'required|date',
            'priority' => 'required|numeric|min:1|max:3',
        ]);

        $newTask = new Task;
        $newTask->user_id = Auth::id();
        $newTask->text = $data['text'];
        $newTask->date = $data['date'];
        $newTask->priority = $data['priority'];
        $newTask->done = false;

        $saved = $newTask->save();


        if (!$saved) {
            return redirect()->back()->with('error', 'Task Store ERROR!');;
        }

        return redirect()->route('registred.index')->with('message', 'Task Stored!');
    }
    

    // public function done($id)
    // {
    
    //     $task = Task::where('id', $id )->get();
    //     // $task->done = 1;
    //     // return $task;
    //     $update = $task->update($task->done = 1);

    //     if (!$update) {
    //         return redirect()->back()->with('error', 'Task done ERROR!');;
    //     }

    //     return redirect()->route('registred.index')->with('message', 'Task DONE!!');
    // }    
    
    public function done(Request $request, Task $task)
    {
        $data = $request->all();
        $update = $task->update($data);

        if (!$update) {
            return redirect()->back()->with('error', 'Task done ERROR!');;
        }

        return redirect()->route('registred.index')->with('message', 'Task DONE!!');
    }
}
