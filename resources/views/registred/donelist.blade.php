

@extends('layouts.app')

@section('content')
<div class="container">

    <h1> {{Auth::user()->name}}'s DONE! List</h1>

    <a class="btn btn-primary" href="{{route('registred.create')}}">Make a new task</a>

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Text</th>
                <th>Date</th>
                <th>Priority</th>
                <th>Done</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{$task->user->name}}</td>
                <td>{{$task->text}}</td>
                <td>{{$task->date}}</td>
                <td>{{$task->priority}}</td>
                <td>{{($task->done != 0) ? 'Done!' : 'ToDo'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection

