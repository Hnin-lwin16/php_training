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
                        <th>Action</th>
                    </tr>
                </thead>
                    <!-- Table Body -->
                <tbody class="">
                    @foreach (\App\Models\Student::with("major")->get() as $va => 
                    $re)
                        <tr>
                                <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $re->name }}</div>
                            </td>
                               
                            <td class="table-text">
                                <div>{{ $re->major->major}}</div>
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
        </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>     


    

    