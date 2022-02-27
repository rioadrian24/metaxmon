@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="alert-title">Check your form</div>
    <ul class="m-0 pl-3">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif