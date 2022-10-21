@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container list">
        <div class="row">
            <div class="col-12">
   <h1>Student List</h1>
    <div class="link m-list s-list">
    <div class="link created">
    <a href="{{route('major.index')}}" class="create m-create creat-link">Create Major</a>
    <a href="{{route('student.index')}}" class="create m-create creat-link">Create Student</a>
    <a href="{{route('data.index')}}" class="create m-create creat-link" 
                id="create-new-stu">Ajax Student</a>
    </div>
    <div class="link port-link">
    <a href="{{route('excel')}}" class="create m-create creat-link">Export</a>
    <form action="{{route('student.get')}}" method="POST" enctype="multipart/form-data" class="import">
    {{ csrf_field() }}
                
        <input type="file" name = "file" class="upload">
        <button type="submit" class="btn-import">Import</button>
                
    </form>
    </div>
    </div>
    
    <form action="{{route('student.get.list')}}" method="get" class="r-form">
    {{ csrf_field() }}
        
         <input type="text" name="name" placeholder="Name" value={{$name}}></td>
         <input type="text" name="major" placeholder="Major" placeholder="Major" value={{$major}}>
         <input type="text" name="location" placeholder="Location" value={{$location}}>
        <input type="date" name="date" value="{{$start}}">
        <input type="date" name="end-date"  value="{{$end}}">
        <button type="submit" class="s-link">Search</button>
        <a href="{{route('student.get.list')}}" class="r-link">Remove</a>        
    </form>
    <div class="panel panel-default stu-panel">
        <div class="panel-heading">
            Student List
        </div>
 
        <div class="panel-body">
            <table class="table table-striped task-table stu-table list-table">
                <thead>
                    <tr>
                        <th class="head">Student Name</th>
                        <th>Major</th>
                        <th>Location</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                    <!-- Table Body -->
                <tbody class="">
                @foreach ($data as $d)
                    
                        <tr>
                                <!-- Task Name -->
                            <td class="table-text">
                                <div>{{$d->name}}</div>
                            </td>
                               
                            
                            <td class="table-text">
                                <div>
                                {{$d->major}}
                                </div>
                            </td>   

                            <td class="table-text">
                                <div>{{ $d->location }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $d->created_at }}</div>
                            </td>

                            <td class="table-act">
                                
                            <form class="delete-form" action="{{ route('student.destroy',
                            $d->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
 
                            <button type="submit" class="btn btn-danger btn-act">
                            Delete</button>
                            </form>
                                
                            <form class="edit-form" action="{{route('student.edit', 
                            $d->id)}}" method="get">
                                <button type="submit" class="btn btn-danger btn-act">
                                edit</button>
                                </form>

                                </td>
                            </tr>
                            
                            
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links()}}
            </div>
        </div>
       
        </div>
        </div>
    </div>
       
@endsection


    

    