@extends('layout.manage', ['title' => 'Create contact'])

@section('content')
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">

                @include('manage.parts.error_alert')

                <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">Link</label>
                        <div class="col">
                            <input type="text" name="link" value="{{ old('link') }}" class="form-control" placeholder="Enter link">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">Icon</label>
                        <div class="col">
                            <input type="text" name="icon" value="{{ old('icon') }}" class="form-control" placeholder="Enter icon">
                        </div>
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