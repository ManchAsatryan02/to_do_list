// Add new Tag button event
$(document).on('click', '.addnewTagBtn', function() {
  var to_do_id = $(this).attr('data-to-do-id'); 
  $('.addNewTag').attr('data-to-do-id', to_do_id);
});

// Add new Tag process
$(document).on('click', '.addNewTag', function() {
  var to_do_id = $(this).attr('data-to-do-id');
  addNewTag(to_do_id);
});

// Add new image button event
$(document).on('click', '#addedNewImg', function(){
  $('.newImg').val('');
  $('.newImgCont').html('');
  var to_do_id = $(this).attr('data-to-do-id'); 
  $('.addNewImgBtn').attr('data-to-do-id', to_do_id);
});

// Add new Image process
$(document).on('click', '.addNewImgBtn', function(e) {
  var to_do_id = $(this).attr('data-to-do-id'); 
  addNewImg(to_do_id);
});

// Image input change event
$(document).on('change', '.newImg', function(e) {
  var file_input = e.currentTarget.files;
  for (var i = 0; i < file_input.length; i++) {

    // Create an image tag dynamically for preview
    var image_tag = $('<img>', {
      class: 'img-fluid w-100 rounded',
      alt: 'Preview Image'
    });

    // Read and preview the selected image file
    var reader = new FileReader();
    reader.onload = (function (image) {
      return function (e) {
        image.attr('src', e.target.result);

        // Create a container div for each image tag
        var image_container = $('<div>').append(image);

        // Append the container to the body or any desired element
        $('.newImgCont').append(image_container);
      };
    })(image_tag);
    reader.readAsDataURL(file_input[i]);
  }
});

// Add new role process
$(document).on('click', '.addNewRole', function() {
  var list_id = $('#addNewToDoModal').attr('data-list-id');
  addNewRole(list_id);
});

// Add new role function
function addNewRole(list_id){
  var role = $('#role').val();
  var email = $('#emailshare').val();
  var token = $("meta[name='csrf-token']").attr("content");
  var bodysection = $('.rolersSection');
  var permision = 'Owner'; 
  if(role == 1) {
    permision = 'Owner';
  }
  else if(role == 2){
    permision = 'Viewer';
  }
  else if(role == 3){
    permision = 'Editor';
  }
                
  $.ajax(
  {
      url: APP_URL+"/roles/store",
      method: 'POST',
      data: {
          "_token": token,
          "role": role,
          "email": email,
          "list_id": list_id,
      },
      success: function (response){
        if(response.success == true){
        $('.empty_rolers').html('');
        $('#role').val('1');
        $('#emailshare').val('');
        bodysection.prepend('<tr id="rollerRow'+response.id+'">'+
        '<td>'+email+'</td>'+
        '<td>'+permision+'</td>'+
        '<td>'+
          '<span data-id="'+response.id+'" class="deleteRoler btn btn-danger">'+
          '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">'+
            '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>'+
            '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>'+
          '</svg>'+
        '</td>'+
      '</tr>');}else{
        $('#role').val('2');
        $('#emailshare').val('');
        alert('User Not Found');
      }
      },
      error: function (response){
        alert('Please check all required inputs Or User not found to this email');
      }
  });
}

// Delete to do process
$(document).on('click', '.deleteToDo', function() {
    var id = $(this).attr('data-id');
    var parent = $(this).closest('.card');
    
    // Perform the delete action
    deleteToDoItem(id, parent);
  });
  
// Update to do process
  $(document).on('click', '.updateToDo', function() {
    var id = $(this).attr('data-id');
    var name = $(this).closest('.modal').find('.formName').val();
    var description = $(this).closest('.modal').find('.formDescription').val();
    
    // Perform the update action
    updateToDoItem(id, name, description);
  });
  
// Delete to do item function
  function deleteToDoItem(id, parent) {
    var token = $("meta[name='csrf-token']").attr("content");
    
    $.ajax({
      url: APP_URL+"/todo/destroy/" + id,
      method: 'post',
      type: 'DELETE',
      data: {
        "id": id,
        "_token": token,
      },
      success: function() {
        parent.remove();
      }
    });
  }

  // Delete image process
  $(document).on('click', '.deleteImage', function() {
    var id = $(this).attr('data-id');
    var parent = $(this).closest('.card');
    
    // Perform the delete action
    deleteImage(id, parent);
  });
  
  // Delete image function
  function deleteImage(id, parent) {
    var token = $("meta[name='csrf-token']").attr("content");
    
    $.ajax({
      url: APP_URL+"/todo/destroy_img/" + id,
      method: 'post',
      type: 'DELETE',
      data: {
        "id": id,
        "_token": token,
      },
      success: function() {
        parent.remove();
      }
    });
  }

  // Update to do function
  function updateToDoItem(id, name, description) {
    var token = $("meta[name='csrf-token']").attr("content");
    var cardName = $('.cardName' + id);
    var cardText = $('.cardText' + id);
  
    $.ajax({
      url: APP_URL+"/todo/update/" + id,
      method: 'POST',
      type: 'UPDATE',
      data: {
        "id": id,
        "_token": token,
        "name": name,
        "description": description,
      },
      success: function() {
        cardName.text(name);
        cardText.text(description);
      }
    });
  }

  // Delete list function 
  function deleteListItem(id) {
    var token = $("meta[name='csrf-token']").attr("content");
    var parent = $('#list_item_'+id);
    $.ajax({
      url: APP_URL+"/list/destroy/" + id,
      method: 'post',
      type: 'DELETE',
      data: {
        "id": id,
        "_token": token,
      },
      success: function() {
        parent.remove();
        $('li.list-item:first').trigger('click');
      }
    });
  }

  // Delete tag function
  function deleteTag(id) {
    var token = $("meta[name='csrf-token']").attr("content");
    
    $.ajax({
      url: APP_URL+"/tag/destroy/" + id,
      method: 'post',
      type: 'DELETE',
      data: {
        "id": id,
        "_token": token,
      },
      success: function() {
        $('#tag'+id).remove();
      }
    });
  }

  // Delete tag process
  $(document).on('click', '.deleteTag', function() {
    var id = $(this).attr('data-id');
    deleteTag(id);
});

// Delete role function
function deleteRoler(id) {
  var token = $("meta[name='csrf-token']").attr("content");
  
  $.ajax({
    url: APP_URL+"/roles/destroy/" + id,
    method: 'post',
    type: 'DELETE',
    data: {
      "id": id,
      "_token": token,
    },
    success: function() {
      $('#rollerRow'+id).remove();
    }
  });
}

// Delete role process
$(document).on('click', '.deleteRoler', function() {
  var id = $(this).attr('data-id');
  deleteRoler(id);
});

// Add new to do process
$(document).on('click', '.addNewToDo', function(){
  addNewToDo();
});

// Add new to do function
function addNewToDo(){
        var name = $('#addNewToDoModal #newTitle').val();
        var description = $('#addNewToDoModal #newDescription').val();
        var list_id = $('#addNewToDoModal').attr('data-list-id');
        var token = $("meta[name='csrf-token']").attr("content");
        var empty = $('#toDoEmpty');
        var emptyCont = $('#toDoEmptyCont');
        var formData = new FormData();
        var file_input = $('.newImg')[$('.newImg').index(this)].files; 
        for (var i = 0; i < file_input.length; i++) {
          formData.append('img[]', file_input[i]);
          };
        formData.append('name', name);
        formData.append('list_id', list_id);
        formData.append('description', description);
        formData.append('_token', token);
        $.ajax(
            {
              url: APP_URL+"/todo/store",
              method: 'POST',
              type: 'POST',
              data: formData,
              processData: false,
              contentType: false,
                success: function (response){
                  showItems(response.list_id);
                  $('#newTitle').val('');
                  $('#newDescription').val('');
                  $('.newImg').val('');
                  $('.newImgCont').html('');
                }
          });
}

// Add new tag function
function addNewTag(to_do_id){
    var name = $('#TagName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var bodysection = $('#newTagSection');
    $.ajax(
    {
        url: APP_URL+"/tag/store",
        method: 'POST',
        data: {
            "_token": token,
            "name": name,
            "to_do_id": to_do_id,
        },
        success: function (response){
          $('#TagName').val('');
          bodysection.prepend('<span id="tag'+response.success.id+'" class="btn btn-sm btn-secondary position-relative deleteTag" data-id="'+response.success.id+'">'+response.success.name+
                ' <i class="fa fa-trash-alt"><i/>'+
            '</span>');
        }
    });
}

// Add new image function
function addNewImg(to_do_id){
  var token = $("meta[name='csrf-token']").attr("content");
  var body = $('#newImagesSection');
  var formData = new FormData();
        var file_input = $('.newImg')[1].files; 
        console.log(file_input);
        for (var i = 0; i < file_input.length; i++) {
          formData.append('img[]', file_input[i]);
          };
        formData.append('_token', token);
        formData.append('to_do_id', to_do_id);
        $.ajax(
            {
              url: APP_URL+"/todo/store_img",
              method: 'POST',
              type: 'POST',
              data: formData,
              processData: false,
              contentType: false,
                success: function (response){
                  var cardHtml = '';
                  for (var i = 0; i < response.img.length; i++) {
                  var imagePath = response.imageAssetPath + '/' + response.img[i]['img'];
                  cardHtml += '<div class="card mb-2 col-sm-4 no-border">' +
                  '<img src="' + imagePath + '" class="img-fluid w-100 rounded" alt="To Do Image">' +
                  '<div class="p-0 pt-2 card-body">' +
                    '<span data-id="'+response.img[i]['id']+'" class="deleteImage btn btn-sm btn-danger">' +
                    '<span>Remove</span>' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">' +
                    '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>' +
                    '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>' +
                    '</svg>' +
                    '</span>' +
                    '</div>' +
                    '</div>';
                }
                
                body.prepend(cardHtml);
                
                }
          });
}

// Add new list process
$(document).on('click', '#addNewList', function() {
  addNewList();
});

// Add new list function
function addNewList(){
      var name = $('#newListName').val();
      var token = $("meta[name='csrf-token']").attr("content");
      var body = $('#newListSection');
      $.ajax(
      {
          url: APP_URL+"/list/store",
          method: 'POST',
          type: 'STORE',
          data: {
              "_token": token,
              "name": name,
          },
          success: function (response){
            showItems(response.success.id);
            $('#newListName').val('');
             body.prepend('\
             <li data-id="'+response.success.id+'" class="list-item list-group-item d-flex justify-content-between align-items-start" id="list_item_'+response.success.id+'">\
               <div class="ms-2 me-auto">\
                 <div class="fw-bold">'+response.success.name+'</div>\
               </div>\
               <span class="badge bg-danger rounded-pill remove-list" data-id="'+response.success.id+'">x</span>\
             </li>\
           ');
          }
      });
}

// Show to do process
$(document).on('click', '.list-item', function() {
  var id = $(this).attr("data-id");
  showItems(id);
});

// Show to do process list for roles
$(document).on('click', '.viewRoles', function(e) {
  e.preventDefault;
  var id = $(this).attr("data-id");
  showItems(id);
});


// Show to do function
function showItems(id){
  $.ajax(
  {
      url: APP_URL+"/list/show/"+id,
      method: 'GET',
      data: {
          "id": id,
      },
      success: function (response){
          document.getElementById('toDos').innerHTML = response;
          $('#addNewToDoModal').attr('data-list-id', id);
          $('.list-item').css('background-color', '#fff');
          $('#list_item_'+id).css('background-color', '#ccc');
        }
  });
}

// Delete list process
$(document).on('click', '.remove-list', function(e) {
  e.preventDefault;

  var id = $(this).attr('data-id');
  
  // Perform the delete action
  deleteListItem(id, parent);
});
