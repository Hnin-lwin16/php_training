@extends('layout.app')
@section('content')

    <h1>Major List</h1>
    <div class="link m-list">
    <a href="{{route('major.index')}}" class="create m-create">Create Major</a>
    <a href="{{route('student.get.list')}}" class="create m-create">Student List</a>
    </div>

    <div class="panel panel-default stu-panel">
            <div class="panel-heading">
                Major List
            </div>
 
            <div class="panel-body">
                <table class="table table-striped task-table stu-table">
                    <thead class="m-thead">
                        <tr>
                            <th>Major</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="m-tbody">
                        @foreach (\App\Models\Major::get() as $major)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text m-table">
                                    <div>{{ $major->major }}</div>
                                </td>                               
                            

                            <td class="table-act m-act">
                                
                                <form class="delete-form" action="{{ route('major.destroy',
                                [$major->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
 
                                <button type="submit" class="btn btn-danger btn-act">
                                Delete</button>
                                </form>

                                <form class="edit-form" action="{{route('major.edit',[$major->id])}}
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
@endsection