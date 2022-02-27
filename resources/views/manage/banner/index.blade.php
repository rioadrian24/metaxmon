@extends('layout.manage', ['title' => 'Banner setting'])

@section('content')
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">

                @include('manage.parts.error_alert')

                <form action="{{ route('banner.update', banner()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">Title</label>
                        <div class="col">
                            <input type="text" name="title" value="{{ banner()->title ?? old('title') }}" class="form-control" placeholder="Enter title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">Link whitepaper</label>
                        <div class="col">
                            <input type="text" name="link_whitepaper" value="{{ banner()->link_whitepaper ?? old('link_whitepaper') }}" class="form-control" placeholder="Enter link whitepaper">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">Link trustlink</label>
                        <div class="col">
                            <input type="text" name="link_trustlink" value="{{ banner()->link_trustlink ?? old('link_trustlink') }}" class="form-control" placeholder="Enter link trustlink">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">Description</label>
                        <div class="col">
                            <textarea name="description" id="description" cols="4" class="form-control">{{ banner()->description ?? old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">image</label>
                        <div class="col">
                            <input type="file" name="file" id="file" data-default-file="{{ Storage::url(banner()->thumbnail) }}" class="dropify" data-height="200">
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