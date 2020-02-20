<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>hello</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <br />
        <button onclick="window.history.back()">Back to central admin home page</button>
        <h1 align="center">Video App Administration Molveno</h1>
        <br />
        <div align="right">
            <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
        </div>
        <br />
        <div class="table-responsive">
            <table id="user_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">Created at</th>
                        <th width="5%">Updated at</th>
                        <th width="5%">Youtube_UID</th>
                        <th width="5%">Title</th>
                        <th width="5%">Description</th>
                        <th width="5%">Category</th>
                        <th width="5%">Reviews</th>
                        <th width="5%">Video Available?</th>
                        <th width="5%">Suitable for Kids?</th>
                        <th width="5%">Created by</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <br />
        <br />
    </div>

<!--MODAL-->


<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal">
                        @csrf
                        {{-- {{ csrf_field() }} --}}
                    <div class="form-group">
                        <label class="control-label col-md-4" for="youtube_uid">Youtube UID:</label>
                            <div class="col-md-8">
                                <input class="form-control" id="youtube_uid" type="text" name="youtube_uid">
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4" for="title">Title:</label>
                            <div class="col-md-8">
                                <input class="form-control" id="title" type="text" name="title" >
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4" for="description">Description:</label>
                            <div class="col-md-8">
                                <input class="form-control" id="description" type="text" name="description">
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4" for="category">Choose a category:</label>
                            <div class="col-md-8">
                                <select multiple class="form-control" name="category" id="category">
                                    <option value="">--Please choose an option--</option>
                                    {{-- @foreach ($categories as $category) --}}
                                    <option value="cat1">cat1</option>
                                    <option value="cat2">cat2</option>
                                    <option value="cat3">cat3</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <div class="checkbox">
                                <label for="available_to_watch"><input type="checkbox" id="available_to_watch" name="available_to_watch" >Video is available to watch</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <div class="checkbox">
                                <label for="suitable_for_kids"><input type="checkbox" id="suitable_for_kids" name="suitable_for_kids">Suitable for kids</label>
                            </div>
                        </div>
                    </div>

                        <br />
                        <div class="form-group" align="center">
                            <input type="hidden" name="action" id="action" value="Add" />
                            <input type="hidden" name="id" id="hidden_id" />
                            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
       </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Delete video</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){

    $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
    url: "{{ route('video.index') }}",
    },
    columns: [
    {
    data: 'created_at',
    name: 'created_at'
    },
    {
    data: 'updated_at',
    name: 'updated_at'
    },
    {
    data: 'youtube_uid',
    name: 'youtube_uid'
    },
    {
    data: 'title',
    name: 'title'
    },
    {
    data: 'description',
    name: 'description'
    },
    {
    data: 'category',
    name: 'category'
    },
    {
    data: 'reviews',
    name: 'reviews'
    },
    {
    data: 'available_to_watch',
    name: 'available_to_watch'
    },
    {
    data: 'suitable_for_kids',
    name: 'suitable_for_kids'
    },
    {
    data: 'created_by',
    name: 'created_by'
    },
    {
    data: 'action',
    name: 'action',
    orderable: false
    }
    ]
});

    $('#create_record').click(function(){
    // $('.modal-title').text('Add New Record');
    // $('#action_button').val('Add');
    // $('#action').val('Add');
    // $('#form_result').html('');
    $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  let action_url = '';

  if($('#action').val() === 'Add')
  {
   action_url = "{{ route('video.store') }}";
  }

  if($('#action').val() ==='Edit')
  {
   action_url = "{{ route('video.update') }}";
  }

  $.ajax({
   url: action_url,
   method:"POST",
   data:$(this).serializeArray(),
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//    dataType:"json",
    // contentType: "application/json",
   success:function(data)
   {
    let html = '';
    if(data.errors)
    {
     html = '<div class="alert alert-danger">';
     for(let count = 0; count < data.errors.length; count++)
     {
      html += '<p>' + data.errors[count] + '</p>';
     }
     html += '</div>';
    }
    if(data.success)
    {
     html = '<div class="alert alert-success">' + data.success + '</div>';
     $('#sample_form')[0].reset();
     $('#user_table').DataTable().ajax.reload();
    }
    $('#form_result').html(html);
   }
  });
//   $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

});

$(document).on('click', '.edit', function(){
    let id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url:"/admin/video/"+id+"/edit",
    //   dataType: "json",
      success:function(data) {
        $('#youtube_uid').val(data.result.youtube_uid);
        $('#title').val(data.result.title);
        $('#description').val(data.result.description);
        $('#category').val(data.result.category);
        $('#suitable_for_kids').prop('checked', !!data.result.suitable_for_kids);
        $('#available_to_watch').prop('checked', !!data.result.available_to_watch);
        $('#hidden_id').val(id);
        $('.modal-title').text('Edit Record');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#formModal').modal('show');
      }
    })

})

let user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"/admin/video/"+user_id,
   method: 'DELETE',
   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
     alert('Data Deleted');
    }, 2000);
   }
  })
 });


});

</script>

</body>
</html>


