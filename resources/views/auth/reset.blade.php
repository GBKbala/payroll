@extends('layouts.authentication')
@section('title')
    Reset Password
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
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Reset Password</h4>
                                    {{-- <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p> --}}
                                </div>

                                <form action="#">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            <div class="invalid-feedback password">
                                                Please provide password.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cpassword" class="form-label">Confirm password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="cpassword" class="form-control" placeholder="Enter your confirm password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            <div class="invalid-feedback cpassword">
                                                Please provide confirm password.
                                            </div>
                                        </div>
                                        <div class="invalid-feedback checkPassword">
                                            password and confirm password are not same.
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
        function resetPassword(password){
            var url = '{{ route("reset_password", ["token", "id"]) }}';
            url = url.replace('token', '{{ Request::route("token") }}');
            url = url.replace('id', '{{ Request::route("id") }}');
            console.table({
                token: '{{ Request::route("token") }}',
                id: '{{ Request::route("id") }}',
                password: password,
                url: url
            })
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    password: password
                },
                success: function(data){
                    console.log(data)
                    if(data){
                        $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.message);
                    }
                    if(data.status == 'success'){
                        $('body').css('opacity', '');
                        $('#preloader, #status').css('display', 'none');
                        setTimeout(() => {
                            window.location.href = "{{ route('index') }}"
                        }, 1000);
                    } else {
                        $('body').css('opacity', '');
                        $('#preloader, #status').css('display', 'none');
                    }
                }
            })
        }

        $('#login').click(function(){
            $('body').css('opacity', '0.5');
            $('#preloader, #status').css('display', 'block');
            var password = $('#password').val();
            var cpassword = $('#cpassword').val();

            var validate = 0;

            if(password == ''){
                $('.password').css('display', 'block');
            } else {
                $('.password').css('display', 'none');
                validate = validate + 1;
            }
            
            if(cpassword == ''){
                $('.cpassword').css('display', 'block');
            } else {
                $('.cpassword').css('display', 'none');
                validate = validate + 1;
            }
            
            if(validate == 2){
                if(password == cpassword){
                    $('.checkPassword').css('display', 'none');
                    resetPassword(password);
                } else {
                    $('.checkPassword').css('display', 'block');
                }
            }
        })
    </script>
@endsection