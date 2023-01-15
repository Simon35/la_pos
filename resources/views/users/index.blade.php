@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float:left">ADD a user</h4>
                        <a href="{{ route('users-add')}}" style="float: right;" class="btn btn-secondary" data-toggle="modal" data-target="#userModal">
                            <i class="fa fa-plus"></i> ADD a user</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key=>$user)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>@if ($user->is_admin == 1) Admin
                                        @else
                                        User
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$user->id}}">
                                                <i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                                                <i class="fas fa-trash"></i> Delete

                                                </svg></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"></div>
                    <h4>Search user</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal of add user -->
<div class="modal right fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New user</h5>
                <button type="button" class="close" data-hidden="true" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('users-store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label><i class="fa fa-phone"></i>
                        <input type="text" name="phone" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm password</label>
                        <input type="password" name="confirm_pass" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="is_admin" id="" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">UserTest</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save User</button>
                    </div>
                </form>
            </div>
            <!--            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal of edit user -->
<div class="modal right fade" id="editModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                <button type="button" class="close" data-hidden="true" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{$user->id}}
            </div>
            <div class="modal-body">
                <form action="{{route('users-update', $user->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{$user->email}}" id="" class="form-control">
                    </div>
                    <!--                 <div class="form-group">
                        <label for="">Phone</label><i class="fa fa-phone"></i>
                        <input type="text" name="phone" value="{{$user->phone}}" id="" class="form-control">
                    </div> -->
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" readonly value="{{$user->password}}" id="" class="form-control">
                    </div>
                    <!--                 <div class="form-group">
                        <label for="">Confirm password</label>
                        <input type="password" name="confirm_pass" id="" class="form-control">
                    </div> -->
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="is_admin" id="" class="form-control">
                            <option value="1" @if ($user->is_admin == 1) selected
                                @endif>Admin</option>
                            <option value="2" @if ($user->is_admin == 2) selected
                                @endif>UserTest</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning btn-block">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal of delete user -->
<div class="modal right fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
                <button type="button" class="close" data-hidden="true" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{$user->id}}
            </div>
            <div class="modal-body">
                <form action="{{route('users-destroy', $user->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <p>Are you sure you want to delete {{$user->name}} ?</p>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->id}}">Delete User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .modal.right .modal-dialog {
        position: absolute;
        top: 0;
        right: 0;
        margin-right: 15vh;
    }

    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }
</style>

@endsection