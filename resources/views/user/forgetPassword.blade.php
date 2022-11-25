@extends('master')
@section('content')

<!--Main area-->
<main id="main" class="main-site">
    <div class="container w-50" style="margin-top:50px; margin-bottom:200px;">

        <div class="card" style="border-radius: 1rem;" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-header">Reset Password</div>
            <div class="card-body p-5 text-center">
                @if (Session::has('message'))
                <div class="alert alert-success text-left" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif

                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" style="float:left" class="form-label">E-Mail Address</label>
                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">           
                        <button class="btn btn-primary text-capitalize" type="submit">Send Password Reset Link</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
</main>
@endsection