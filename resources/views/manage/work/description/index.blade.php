@extends('layout.manage', ['title' => 'Work description'])

@section('content')
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">

                @include('manage.parts.error_alert')

                <form action="{{ route('work-description.update', description()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">Description</label>
                        <div class="col">
                            <textarea name="description" id="description" cols="4" class="form-control">{{ description()->description ?? old('description') }}</textarea>
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