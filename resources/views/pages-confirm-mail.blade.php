@extends('layouts.authentication')
@section('content')
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="{{ route('index') }}">
                            <span><img src="{{ asset('assets/images/logo.png') }}" alt="" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center m-auto">
                            <img src="{{ asset('assets/images/mail_sent.svg') }}" alt="mail sent image" height="64" />
                            <h4 class="text-dark-50 text-center mt-4 fw-bold">Please check your email</h4>
                            <p class="text-muted mb-4">
                                A email has been send to <b>youremail@domain.com</b>.
                                Please check for an email from company and click on the included link to
                                reset your password.
                            </p>
                        </div>

                        <form action="{{ asset('index') }}">
                            <div class="mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i> Back to Home</button>
                            </div>
                        </form>

                    </div> <!-- end card-body-->
                </div>
                <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
@endsection
