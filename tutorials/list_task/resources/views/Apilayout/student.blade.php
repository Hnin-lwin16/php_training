<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api Student</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="/css/api.css">

</head>
<body>
 
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Student List</h1>
                <a href="javascript:void(0)" class="btn btn-success mb-2" 
                id="create-new-stu">Add Student</a>
                <a href="{{route('student.get.list')}}" class="btn btn-success mb-2" 
                id="create-new-stu">Student List</a>
                <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                <th>Name</th>
                 <th>Gender</th>
                 <th>Email</th>
                 <th colspan="2">Action</th>
              </tr>
           </thead>
           <tbody id="stu-crud">
              @foreach($posts as $post)
              <tr id="post_id_{{ $post->id }}">
                 <td>{{ $post->StudentName }}</td>
                 <td>{{ $post->Gender }}</td>
                 <td>{{ $post->Email }}</td>
                 <td><a href="javascript:void(0)" id="edit-post" data-id="{{ $post->id }}" 
                 class="btn btn-info">Edit</a>
                 
                <a href="javascript:void(0)" id="delete-post" data-id="{{ $post->id }}" 
                  class="btn btn-danger delete-post">Delete</a></td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {{ $posts->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
<!--Form-->

<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="stuCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form  id="stuForm" name="stuForm" class="form-horizontal">
           <input type="hidden" name="post_id" id="post_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" 
                    value="" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Gender</label>
                <select class="form-select" aria-label="Default select example" id="gender" 
                name="gender" value="" required="">
                <option selected>Open this select menu</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" name="email" 
                    value="" required="">
                </div>
            </div>
            
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save
             </button>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        
    </div>
<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#create-new-stu').click(function () {
        $('#btn-save').val("create-post");
        $('#stuForm').trigger("reset");
        $('#stuCrudModal').html("Add New Student");
        $('#ajax-crud-modal').modal('show');
    });

    //Edit
    $('body').on('click', '#edit-post', function () {
        var post_id = $(this).data('id');
        $.get('data/'+post_id, function (data) {
            $('#stuCrudModal').html("Edit Student");
            $('#btn-save').val("edit-post");
            $('#ajax-crud-modal').modal('show');
            $('#post_id').val(data.id);
            $('#name').val(data.StudentName);
            $('#gender').val(data.Gender);
            $('#email').val(data.Email);
        });
    });
   //Delete
    $('body').on('click', '.delete-post', function () {
        var post_id = $(this).data("id");
        confirm("Are You sure want to delete !");
 
        $.ajax({
            type: "DELETE",
            url: "{{ url('api/data')}}"+'/'+post_id,
            success: function (data) {
                $("#post_id_" + post_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    if ($("#stuForm").length > 0) {
        $("#stuForm").validate({
    
        submitHandler: function(form) {
        var actionType = $('#btn-save').val();
        $('#btn-save').html('Sending..');
        
        $.ajax({
            data: $('#stuForm').serialize(),
            url: "{{ url('api/data')}}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                var post = '<tr id="post_id_' + data.id + '"><td style="display: none;">' 
                + data.id + '</td><td>'+
                data.StudentName + '</td><td>' + data.Gender + '</td><td>' + data.Email + 
                '</td>';
                post += '<td><a href="javascript:void(0)" id="edit-post" data-id="' + data.
                id 
                + '" class="btn btn-info">Edit</a>';
                post += '<a href="javascript:void(0)" id="delete-post" data-id="' + 
                data.
                id + '" class="btn btn-danger delete-post">Delete</a></td></tr>';
                
                if (actionType == "create-post") {
                    $('#stu-crud').prepend(post);
                } else {
                    $("#post_id_" + data.id).replaceWith(post);
                }
    
                $('#stuForm').trigger("reset");
                $('#ajax-crud-modal').modal('hide');
                $('#btn-save').html('Save Changes');
                
            },
            error: function (data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
            }
        });
        }
        })
    }
     });

</script>
</body>
</html>