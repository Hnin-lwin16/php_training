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
                <?php
                        $major = (\App\Models\Major::all());
                ?>
                    <select class="form-select" aria-label="Default select example"         
                    name="major_only">
                   
                    @foreach ($major as $m)
                    <option value="{{$m->id}}">{{$m->major}}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group stu-group">
                <div class="col-sm-6">
                    <input type="text" name="local" id="task-name" 
                    class="form-control" placeholder="Loaction" value="{{$result->location}}">
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