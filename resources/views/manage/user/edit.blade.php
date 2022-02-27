@extends('layout.manage', ['title' => 'Create user'])

@section('content')
<div class="row mb-5">
    <div class="col-lg-7">
        <div class="card shadow border-0 shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-start">
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left mr-2"></i> Back</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @include('manage.parts.error_alert')
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="{{ $user->email }}" class="form-control" placeholder="Enter email" readonly>
                    </div>
                    <div class="form-group">
                        <label>Profile</label>
                        <div class="row align-self-center">
                            <div class="col-sm-2 col-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body p-2">
                                        <img src="{{ $user->avatar() }}" alt="avatar" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-8 mt-lg-3">
                                <input type="file" name="file" class="form-control" id="customFile">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" {{ ($user->status == 'active' ? 'selected' : '') ?? (old('status') == 'active' ? 'selected' : '') }}>Active</option>
                            <option value="suspend" {{ ($user->status == 'suspend' ? 'selected' : '') ?? (old('status') == 'suspend' ? 'selected' : '') }}>Suspend</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop