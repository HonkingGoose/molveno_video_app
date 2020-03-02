
$(document).ready(function(){

    $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
    url: "/admin/video/",
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
   action_url = "/admin/video/";
  }

  if($('#action').val() ==='Edit')
  {
   action_url = "/admin/video/update/";
  }

  $.ajax({
   url: action_url,
   method:"POST",
   data:$(this).serializeArray(),
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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


});

$(document).on('click', '.edit', function(){
    let id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url:"/admin/video/"+id+"/edit",
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

});

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
