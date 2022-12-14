@extends('layout.app')
@section('content')
    
    <h1 class="major-text">Create Major</h1>
    <div class="link">
    <a href="{{route('major.list')}}" class="create">Major List</a>
    <a href="{{route('student.get.list')}}" class="create">Student List</a>
    </div>
    @include('common.errors')
    <div class="two-side">
    <form action="{{route('major.store')}}" method="POST" 
    class="form-horizontal s-form major">
        {{ csrf_field() }}
           <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="major_only" id="task-name" 
                    class="form-control" placeholder="Major Name">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default tast-btn">
                        <img src="/img/plus.png" alt=""> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection