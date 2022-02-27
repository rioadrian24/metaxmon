@extends('layout.manage', ['title' => 'Users'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4 border-0 shadow">
            <div class="card-body">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ !request()->get('tab') ? 'active' : '' }}" href="{{ route('user.index') }}">All <span class="badge badge-{{ !request()->get('tab') ? 'white' : 'primary' }}">{{ $total_user }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->get('tab') == 'active' ? 'active' : '' }}" href="?tab=active">active <span class="badge badge-{{ request()->get('tab') == 'active' ? 'white' : 'primary' }}">{{ $total_active }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->get('tab') == 'pending' ? 'active' : '' }}" href="?tab=pending">Pending <span class="badge badge-{{ request()->get('tab') == 'pending' ? 'white' : 'primary' }}">{{ $total_pending }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->get('tab') == 'suspend' ? 'active' : '' }}" href="?tab=suspend">Suspend <span class="badge badge-{{ request()->get('tab') == 'suspend' ? 'white' : 'primary' }}">{{ $total_suspend }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->get('tab') == 'trash' ? 'active' : '' }}" href="?tab=trash">Trash <span class="badge badge-{{ request()->get('tab') == 'trash' ? 'white' : 'primary' }}">{{ $total_trash }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row mb-5">
    <div class="col-lg-12">
        <div class="card shadow border-0 shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Create New</a>
                @if (request()->get('tab') == 'trash')
                <form class="d-inline" action="{{ route('user.destroy.all') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-danger ml-2 confirm-delete" type="submit">Empty Trash</button>
                </form>
                @endif
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if ($user->status == 'active')
                                <td><div class="badge px-3 py-2 badge-success">{{ $user->status }}</div></td>
                                @elseif ($user->status == 'pending')
                                <td><div class="badge px-3 py-2 badge-warning">{{ $user->status }}</div></td>
                                @else
                                <td><div class="badge px-3 py-2 badge-danger">{{ $user->status }}</div></td>
                                @endif
                                <td>
                                    @if (request()->get('tab') == 'trash')
                                    <a href="{{ route('user.restore', $user->id) }}" class="btn btn-link text-decoration-none p-0">Restore</a>
                                    &middot;
                                    <form class="d-inline" action="{{ route('user.destroy.force', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-decoration-none text-danger p-0 confirm-delete" type="submit">Delete Permanently</button>
                                    </form>
                                    @else
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm confirm-delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    @endif
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
@stop