@extends('layout.manage', ['title' => 'Contact'])

@section('content')
<div class="row mb-5">
    <div class="col-lg-12">
        <div class="card shadow border-0 shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Create New</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (contacts() as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <h4><i class="{{ $contact->icon }}"></i></h4>
                                </td>
                                <td>{{ $contact->link }}</td>
                                <td>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm btn-rounded"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
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