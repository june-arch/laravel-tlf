<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('title', 'Login')

@section('content')
@php
    $file = fopen("test.txt", "w");
    fwrite($file, "Testing file creation");
    fclose($file);
    echo "File created successfully!";
@endphp
<div class="container vh-100">
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-6">
            <!-- Success Alert -->
            <div class="alert alert-success d-none alert-dismissible fade show" role="alert" id="successAlert">
                Login successful!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <!-- Error Alert -->
            <div class="alert alert-danger d-none alert-dismissible fade show" role="alert" id="errorAlert">
                Login failed! Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Welcome to Laravel TLF, please log in first.') }}</div>

                <div class="card-body">
                    <form id="login-form">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control mt-1" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group mt-2">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control mt-1" name="password" required autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module">
    $(document).ready(function () {
        $('#login-form').submit(function (e) {
            e.preventDefault();

            var formData = {
                email: $('#email').val(),
                password: $('#password').val(),
                _token: $('input[name=_token]').val()
            };

            $.ajax({
                url: '/api/auth/login',
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Handle successful login
                    console.log('sukses', response)
                    localStorage.setItem('jwtToken', response.data.token);
                    $('#successAlert').removeClass('d-none');

                    // Redirect the user or perform other actions as needed
                    window.location.href = '/home'; 
                },
                error: function (xhr, status, error) {
                    // Handle login errors
                    console.log('error', error)
                    $('#errorAlert').removeClass('d-none');
                }
            });
        });
    });
</script>
@endpush
