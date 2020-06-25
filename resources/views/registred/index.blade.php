

@extends('layouts.app')

@section('content')
<div class="container">

    <h1> {{Auth::user()->name}}'s Tasks List</h1>
    <a class="btn btn-primary" href="{{route('registred.create')}}">Make a new task</a>



    <a class="btn btn-primary" href="{{route('registred.donelist')}}">List of Done! task</a>




    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Text</th>
                <th>Date</th>
                <th>Priority</th>
                <th>Done</th>
                <th>Commands</th>
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
                <td>{{($task->done != 0) ? 'Done!' : 'ToDo'}}</td>
                <td>
                    <form action="{{route('registred.done', $task)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="done" value="1">
                        <button type="submit" class="btn btn-primary">Done!</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<div class="container">
    <form action="{{route('registred.store')}}" method="post" enctype="multipart/form-data">
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
            <input type="number" min="1" max="3" name="priority" id="priority">
        </div>
    

        <button class="btn btn-success" type="submit">Save</button>
    </form>
</div>
@endsection

