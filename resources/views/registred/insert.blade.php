@extends('layouts.app')

@section('content')
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