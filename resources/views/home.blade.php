@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-start">
            <div class="col-md-4">
                <h3>My List</h3>
                <hr>
                <div class="row p-2">
                    <div class="card-header">
                        <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#addNewListModal">+ Add New List Item</button>
                    </div>
                    <ol class="list-group list-group-numbered" id="newListSection">
                        @foreach($list as $item)
                            <li data-id="{{ $item->id }}" class="list-item list-group-item d-flex justify-content-between align-items-start" id="list_item_{{ $item->id }}">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $item->name }}</div>
                                </div>
                                <span class="badge bg-danger rounded-pill remove-list" data-id="{{ $item->id }}">x</span>
                            </li>
                        @endforeach
                    </ol>
                </div>

                <h3 class="mt-5">I have access to this accounts</h3>
                <hr>
                <div class="row p-2 rolers_list">
                    @include('list.rolers')
                </div>
            </div>
            <div class="col-md-8">
                <div class="to-dos-header">
                    <h3>My To Does</h3>
                    <hr>
                </div>
                <div id="toDos" class="mt-4">
                    <div class="container mt-5">
                        <div class="jumbotron text-center">
                            <p class="lead">Select the To Do list you want to see</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addNewListModal" tabindex="-1" aria-labelledby="addNewListModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewListModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control formName" id="newListName" placeholder="Title">
                        <label for="newListName">Title</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="addNewList" data-bs-dismiss="modal">Add</button>
            </div>
            </div>
        </div>
    </div>
@endsection



