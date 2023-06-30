{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Forgot Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="loading authentication-bg" data-layout-config='{"darkMode":false}'> --}}
@extends('layouts.authentication')
@section('title')
        Forgot password
@endsection
@section('content')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary" style="background-color: white !important">
                            <a href="{{ route('index') }}">
                                <span><img src="{{ asset('assets/images/GR_Infotech_final.png') }}" alt="" height="60"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Forgot Password</h4>
                                <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                            </div>

                            <form action="#">
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="email" required="" placeholder="Enter your email">
                                </div>

                                <div class="mb-0 text-center">
                                    <button class="btn btn-primary" id="resetBtn" type="button">Reset Password</button>
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to <a href="{{ route('login') }}" class="text-muted ms-1"><b>Log In</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
@endsection

@section('scripts')
    <script>
        $('#resetBtn').click(function(){
            $('body').css('opacity', '0.5');
            $('#preloader, #status').css('display', 'block');
            var email = $('#email');

            $.ajax({
                type: "POST",
                url: "{{ route('forgot') }}",
                data: {
                    email: email.val(),
                },
                success: function(data){
                    $('body').css('opacity', '');
                    $('#preloader, #status').css('display', 'none');
                    console.log(data);
                    if(data){
                        $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.message);
                        setTimeout(() => {
                            window.location.href = "{{ route('index') }}"
                        }, 1000);
                    }
                }
            })
        })
    </script>
@endsection