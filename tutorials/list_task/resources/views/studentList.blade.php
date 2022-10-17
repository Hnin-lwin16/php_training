<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="/css/min.css">
</head>
<body>
   
    <a href="{{route('major.index')}}" class="create m-create">Major</a>
    <a href="{{route('student.index')}}" class="create m-create">Student</a>
    <a href="{{route('excel')}}" class="create m-create">Import</a>
    
    <form action="{{route('student.get')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
                
                <input type="file" name = "file" class="upload">
                <br>
                <button type="submit" class="btn-act">Import</button>
                
    </form>
        <div class="panel panel-default stu-panel">
            <div class="panel-heading">
                Student List
            </div>
 
            <div class="panel-body">
                <table class="table table-striped task-table stu-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Major</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody >
                        @foreach (\App\Models\Studend::get() as $va => 
                        $re)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $re->name }}</div>
                                </td>
                               
                                <td class="table-text">
                                    <div>{{ $re->major}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $re->location }}</div>
                                </td>

                                <td class="table-act">
                                
                                <form class="delete-form" action="{{ route('student.destroy',
                                [$re->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
 
                                <button type="submit" class="btn btn-danger btn-act">
                                Delete</button>
                                </form>
                                
                                <form class="edit-form" action="{{route('student.edit',[$va])}}
                                " method="get">
                                <button type="submit" class="btn btn-danger btn-act">
                                edit</button>
                                </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
</body>
</html>

    

    