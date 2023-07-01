@extends('layouts.admin')

@section('title', 'User List')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Users List
                    <a href=" {{ url('admin/users/create') }} " class='btn btn-primary btn-sm float-end'>
                        Add User
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td> {{$user->id}} </td>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}} </td>
                                <td>
                                    @if ($user->role_as == '0')
                                        <label class="badge rounded-pill btn-primary">User</label>
                                    @elseif($user->role_as == '1')
                                       <label class="badge rounded-pill btn-success ">Admin</label>
                                    @else
                                        <label class="badge rounded-pill btn-danger ">none</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success">
                                        Edit
                                    </a>
                                    <a href="{{ url('admin/users/'.$user->id.'/delete') }}"
                                        onclick="return confirm('Are you sure')" class="btn btn-sm btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Users Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
