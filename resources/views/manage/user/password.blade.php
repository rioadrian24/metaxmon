@extends('layout.manage', ['title' => 'Setting password'])

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
                <form action="{{ route('user.password.update', user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="{{ user()->email }}" class="form-control" placeholder="Enter email" readonly>
                    </div>
                    <div class="form-group">
                        <label>Old password</label>
                        <input type="password" name="old_password" class="form-control" placeholder="Enter old password">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label>Repeat password</label>
                        <input type="password" name="re_password" class="form-control" placeholder="Enter repeat password">
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