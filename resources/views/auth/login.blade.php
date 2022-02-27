@extends('layout.login')

@section('content')
<div class="col-lg-6">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
					<img src="/front/img/logo.png" width="130" class="mb-5">
                </div>
                @include('manage.parts.error_alert')
                <form class="user" action="/auth/signin/post" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop