@extends('admin.layout.default')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif


    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif


    <div class="mb-5">
        <h4 class="text-center">Admin Login Here</h4>
    </div>
    </div>
    </div>
    <form action="{{ route('admin.authenticate') }}" method="POST">
        @csrf
        <div class="row gy-3 overflow-hidden">
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror " name="email"
                        id="email" value="{{ old('email') }}" placeholder="name@example.com">
                    <label for="email" class="form-label">Email</label>
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="password" value="" placeholder="Password">
                    <label for="password" class="form-label">Password</label>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Log in now</button>
                </div>
            </div>
        </div>
    </form>
@endsection
