

@extends('layouts.app')

@section('content')
<div class="container">

    <h1> {{Auth::user()->name}}'s Tasks List</h1>
          <a class="btn btn-primary" href="{{route('registred.create')}}">Make a new task</a>


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Text</th>
            <th>Date</th>
            <th>Priority</th>
            <th colspan="3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->user->name}}</td>
            <td>{{$task->text}}</td>
            <td>{{$task->date}}</td>
            <td>{{$task->priority}}</td>
            <td><a class="btn btn-primary">View</a> </td>
            <td><a class="btn btn-success">Edit</a> </td>
            <td>
            <td><a class="btn btn-success">Delete</a> </td>
        </tr>
        @endforeach
        
        </tbody>
    </table>
    
</div>
@endsection

