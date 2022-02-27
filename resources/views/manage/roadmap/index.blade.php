@extends('layout.manage', ['title' => 'Road Map'])

@section('content')
<div class="row mb-5">
    <div class="col-lg-12">
        <div class="card shadow border-0 shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                <a href="{{ route('roadmaps.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Create New</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (roadmaps() as $roadmap)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($roadmap->title, 40) }}</td>
                                <td>{{ Str::limit($roadmap->description, 40) }}</td>
                                <td>
                                    <a href="{{ route('roadmaps.edit', $roadmap->id) }}" class="btn btn-primary btn-sm btn-rounded"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('roadmaps.destroy', $roadmap->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-rounded confirm-delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
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