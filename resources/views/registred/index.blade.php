

@extends('layouts.app')

@section('content')
<div class="container">

    <h1> {{Auth::user()->name}}'s Tasks List</h1>  

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
    <div>
        <form action="{{route('registred.task.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" name="text" id="text" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date">
            </div>

            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="number" name="priority" id="priority">
            </div>

            <button class="btn btn-success" type="submit">Save</button>
      </form>
    </div>
</div>
@endsection

