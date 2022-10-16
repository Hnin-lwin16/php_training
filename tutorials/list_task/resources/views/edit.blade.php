@extends('layout.app')
@section('content')
@include('common.errors')
    <h1 class="edit">Edit Student List</h1>
    <div class="two-side">
    <form action="{{route('student.update',[$result])}}"  
    method="POST" class="form-horizontal s-form edit-form student-form">
        {{ csrf_field() }}
            <!-- Task Name -->
            <div class="form-group stu-group">
                <label for="task" class="col-sm-3 control-label text">Edit Student Name</label>
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" 
                    class="form-control" value="{{$result->name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="major_only" id="task-name" 
                    class="form-control" placeholder="Major Name" value="
                    {{$result->major->major}}">
                   
                    <input type="text" name="major_id" id="task-name" 
                    class="form-control" placeholder="Major Name" value="{{$result->major_id}}
                    " hidden>
                </div>
            </div>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default tast-btn">
                        <img src="/img/plus.png" alt=""> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection