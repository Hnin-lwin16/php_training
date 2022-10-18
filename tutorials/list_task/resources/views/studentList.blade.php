<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel list tasks basic</title>
   <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/min.css">
</head>
<body>
    <div class="container list">
        <div class="row">
            <div class="col-12">
   <h1>Student List</h1>
    <div class="link m-list s-list">
    <div class="link created">
    <a href="{{route('major.index')}}" class="create m-create creat-link">Create Major</a>
    <a href="{{route('student.index')}}" class="create m-create creat-link">Create Student</a>
    </div>
    <div class="link port-link">
    <a href="{{route('excel')}}" class="create m-create creat-link">Export</a>
    <form action="{{route('student.get')}}" method="POST" enctype="multipart/form-data" class="import">
    {{ csrf_field() }}
                
        <input type="file" name = "file" class="upload">
        <button type="submit" class="btn-act btn-import">Import</button>
                
    </form>
    </div>
    </div>
    
    <form action="{{route('student.get.list')}}" method="get" >
    {{ csrf_field() }}
        <input type="text" name="name" placeholder="Name" value={{$name}}>
        <input type="text" name="major" placeholder="Major" placeholder="Major" value={{$major}}>
        <input type="text" name="location" placeholder="Location" value={{$location}}>
        <input type="date" name="date">
        <input type="date" name="end-date">
        <button type="submit" class="btn-act btn-import">Search</button>
        <a href="{{route('student.get.list')}}" class="create m-create creat-link">Remove</a>
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
                            [$d->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
 
                            <button type="submit" class="btn btn-danger btn-act">
                            Delete</button>
                            </form>
                                
                            <form class="edit-form" action="{{route('student.edit', 
                            [$d->id])}}" method="get">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>     


    

    