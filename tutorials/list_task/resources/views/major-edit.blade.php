@extends('layout.app')
@section('content')
    <h1 class="major-text ma-edit">Edit Major</h1>
    @include('common.errors')
    <div class="two-side">
    <form action="{{route('major.update',[$edit->id])}}" method="POST" 
    class="form-horizontal s-form major ma-form">
        {{ csrf_field() }}
           <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="major_only" id="task-name" 
                    class="form-control" placeholder="Major Name" value="{{$edit->major}}">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default tast-btn s-btn">
                        <img src="/img/plus.png" alt=""> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection