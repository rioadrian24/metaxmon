@extends('layout.manage', ['title' => 'Edit NFT'])

@section('content')
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">

                @include('manage.parts.error_alert')

                <form action="{{ route('nfts.update', $nft->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">EGG</label>
                        <div class="col">
                            <input type="file" name="file" id="file" class="dropify" data-default-file="{{ Storage::url($nft->egg) }}" data-height="200">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 col-form-label">NFT</label>
                        <div class="col">
                            <input type="file" name="image" id="image" class="dropify" data-default-file="{{ Storage::url($nft->nft) }}" data-height="200">
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