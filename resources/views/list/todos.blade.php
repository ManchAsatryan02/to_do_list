@if($role_permission == 1)
  <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" id="rolersBtn" data-bs-target="#thisListRolersModal">View rolers</button>
@endif
<div class="modal fade" id="thisListRolersModal" tabindex="-1" aria-labelledby="thisListRolersModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="thisListRolersModalLabel">All Roles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table caption-top">
          <p>
            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Add New Roler +
            </button>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <form action="" id="addNewRoleForm">
                <div class="form-floating mb-3">
                  <input type="email" name="email" class="form-control formNewName" id="emailshare" placeholder="Email">
                  <label for="emailshare">Email</label>
                </div>
                <div class="form-floating mb-3">
                   <select name="" id="role" class="form-control" id="">
                    <option value="1" disabled>Owner</option>
                    <option value="2" selected>Viewer</option>
                    <option value="3">Editor</option>
                   </select>
                    <label for="newDescription" class="form-label">Permission</label>
                </div>
                <button class="btn btn-success btn-sm addNewRole" id="newRoleBtn" data-list-id="1">Add</button>
              </form>
            </div>
          </div>
          
          <thead>
            <tr>
              <th scope="col">Email</th>
              <th scope="col">Permission</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody class="rolersSection">
            @if(isset($rolers) && count($rolers) > 0)
              @foreach($rolers as $role)
                <tr id="rollerRow{{ $role->id }}">
                  <td>{{ $role->user->email }}</td>
                  {{-- owner --}}
                  @if($role->role == 1) 
                    <td>Owner</td>
                  {{-- viewer --}}
                  @elseif($role->role == 2)
                    <td>Viewer</td>
                  {{-- editor --}}
                  @elseif($role->role == 3)
                    <td>Editor</td>
                  @endif
                  <td> 
                    <span data-id="{{ $role->id }}" class="deleteRoler btn btn-danger">
                      Remove
                    </span>
                  </td>
                </tr>
              @endforeach
            @else
              <tr class="empty_rolers">
                <td colspan="4">This list has not any roler</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@if($role_permission == 1)
  <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" id="addNewToDoButton" data-bs-target="#addNewToDoModal">+ Add New To Do</button>
@endif
<div class="modal fade" id="addNewToDoModal" tabindex="-1" aria-labelledby="addNewToDoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewToDoModalLabel">+ Add New To Do</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" name="new_name" class="form-control formNewName" id="newTitle" placeholder="Title">
                        <label for="newTitle">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="new_description" class="form-control h-100 formNewDescription" id="newDescription" placeholder="newDescription"></textarea>
                        <label for="newDescription" class="form-label">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="file" name="img[]" multiple class="form-control newImg">
                      <div class="newImgCont"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success addNewToDo" data-bs-dismiss="modal">Add</button>
            </div>
        </div>
    </div>
</div>

@if(count($list_item) < 1)
  <div class="container mt-5" id="toDoEmptyCont">
    <div class="jumbotron text-center">
      <p class="lead" id="toDoEmpty">Your selected To Do list is empty</p>
    </div>
  </div>
@endif

<div id="newToDoSection">
@foreach($list_item as $item)
  <div class="card mb-2">
    <div class="card-header">Created at: {{ $item->created_at }}</div>
      <div class="card-body">
        <h5 class="card-title cardName{{ $item->id }}">{{ $item->name }}</h5>
        <p class="card-text cardText{{ $item->id }}">{{ $item->description }}</p>
        <hr>
        <h4>Tags 
          @if(isset($role_permission) && $role_permission != 2)
            <span class="btn btn-outline-secondary btn-sm addnewTagBtn" data-to-do-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#addNewTagModal">Add new tag +</span></h4>
          @endif
          <div class="w-100" id="newTagSection">
          @foreach($item->tags as $tag)
            @if(isset($role_permission) && $role_permission == 1)
                <span id="tag{{ $tag->id }}" class="btn btn-sm btn-secondary position-relative deleteTag mr-2"  data-id="{{ $tag->id }}">
                  {{ $tag->name }}
                  <i class='fa fa-trash-alt'></i>
                </span>
                @else
                  <span class="btn btn-sm btn-secondary position-relative mr-2">{{ $tag->name }}</span>
              @endif
          @endforeach
        </div>
        <hr>
        <h4>Images 
          @if(isset($role_permission) && $role_permission == 1)
            <span id="addedNewImg" class="btn btn-outline-secondary btn-sm addnewImg" data-to-do-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#addNewImageModal">Add new image +</span>
          @endif
        </h4>
        <div class="w-100 row" id="newImagesSection">
          @foreach($item->images as $img)
              <div class="card mb-2 col-sm-4 no-border">
                <img src="{{ asset('images/'.$img->img) }}" class="img-fluid w-100 rounded" alt="To Do Image">
                <div class="p-0 pt-2 card-body">
                @if(isset($role_permission) && $role_permission == 1)
                  <span data-id="{{ $img->id }}" class="deleteImage btn btn-sm btn-danger">
                    <span>Remove</span>
                  </span>
                  @endif
                </div>
              </div>
          @endforeach
        </div>
        <hr>
        @if(isset($role_permission) && $role_permission == '1')
          <div class="btn btn-sm btn-danger deleteToDo" data-id="{{ $item->id }}">
            <i class='fa fa-trash-alt'></i>
          </div>
          @endif
        @if(isset($role_permission) &&  $role_permission == 3 || $role_permission == 1)
          <div class="btn btn-sm btn-warning" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#updateToDo{{ $item->id }}">
            <i class='fa fa-edit text-light'></i>
          </div>
          @endif
      </div>
    </div>
  </div>


  <div class="modal fade" id="updateToDo{{ $item->id }}" tabindex="-1" aria-labelledby="updateToDo{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateToDo{{ $item->id }}Label">{{ $item->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control formName" id="Title{{ $item->id }}" placeholder="Title" value="{{ $item->name }}">
                    <label for="Title{{ $item->id }}">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="description" class="form-control h-100 formDescription" id="description{{ $item->id }}" placeholder="Description">{{ $item->description }}</textarea>
                    <label for="description{{ $item->id }}" class="form-label">Description</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="closeAddModal btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <div class="btn btn-success updateToDo" data-id="{{ $item->id }}" data-bs-dismiss="modal">Save changes</div>
        </div>
      </div>
    </div>
  </div>
@endforeach

<div class="modal fade" id="addNewTagModal" tabindex="-1" aria-labelledby="addNewTagModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewTagModalLabel">New Tag</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-floating mb-3">
              <input type="text" name="name" class="form-control" id="TagName" placeholder="TagName">
              <label for="TagName">Tag Name</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" data-bs-dismiss="modal" class="btn btn-success addNewTag">Add</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewImageModal" tabindex="-1" aria-labelledby="addNewImageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewImageModalLabel">Add New Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-floating mb-3">
            <input type="file" name="newImg[]" multiple class="form-control newImg">
          </div>
          <div class="newImgCont"></div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success addNewImgBtn" data-bs-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
</div>
</div>
