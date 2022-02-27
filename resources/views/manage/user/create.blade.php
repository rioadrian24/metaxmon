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
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label>Profile</label>
                        <input type="file" name="file" class="form-control" id="customFile">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="suspend">Suspend</option>
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