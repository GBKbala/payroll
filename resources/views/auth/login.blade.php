@extends('layouts.authentication')
@section('title')
    Login
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
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                </div>

                                <form action="#">

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="mb-3">
                                        <a href="{{ route('forgot') }}" class="text-muted float-end"><small>Forgot your password?</small></a>
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-3 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div> --}}

                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" id="login" type="button"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                {{-- <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-muted ms-1"><b>Sign Up</b></a></p> --}}
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
        $('#login').click(function(){
            $('body').css('opacity', '0.5');
            $('#preloader, #status').css('display', 'block');
            var email = $('#emailaddress')
            var password = $('#password')
            console.table({
                email: email.val(),
                password: password.val()
            })
            $.ajax({
                type: 'POST',
                url: '{{ route("login") }}',
                data: {
                    email: email.val(),
                    password: password.val()
                },
                success: function(data){
                    if(data){
                        $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.message);
                    }
                    if(data.status == 'Success'){
                        setTimeout(() => {
                            window.location.href = "{{ route('index') }}"
                        }, 1000);
                    } else {
                        $('body').css('opacity', '');
                        $('#preloader, #status').css('display', 'none');
                    }
                }
            })
        })
    </script>
@endsection