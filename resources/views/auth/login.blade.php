<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Login Page | GBSC Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="">

     <!-- Loader -->
    <div class="site_loader d-none">
        <div class="page-loader">
            <div class="img-loader">
                <img src="{{ asset('assets/site/loader_blue.png') }}" alt="Loader">
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-5 ">

                <div class="card shadow border-0 rounded-4">

                    <div class="card-body p-5">

                        <!-- Logo -->
                        <div class="text-center mb-5">

                            <img src="{{ asset('assets/site/greater_logo_black.png') }}" alt="Logo"  class="login_image">

                        </div>

                        <!-- Error Message -->
                        @if(session('error'))

                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>

                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('authenticate') }}">

                            @csrf

                            <!-- Email -->
                            <div class="mb-3">

                                <label class="form-label  fw-bolder">
                                    Email Address
                                </label>

                                <div class="input-group mt-1">
                                    <input type="email"
                                           name="email"
                                           class="form-control py-2"
                                           placeholder="Enter Email">
                                        
                                </div>

                                <p class="login_email_error error_text"></p>

                            </div>

                            <!-- Password -->
                            <div class="mb-4">

                                <label class="form-label fw-bolder">
                                    Password
                                </label>

                                <div class="password_box mt-1" >

                                    <input type="password"
                                        name="password"
                                        id="password"
                                        class="form-control py-2"
                                        placeholder="Enter Password">

                                    <i class="fa fa-eye toggle-password text-dark"></i>

                                </div>

                                 <p class="login_password_error error_text"></p>

                            </div>

                                                        

                            <!-- Login Button -->
                            <div class="mt-4 pt-2">

                                <button type="submit"
                                        class="btn gbsc_btn py-3 btn-lg rounded-3 w-100 login_btn">
                                    Login

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

   <script>

        $(document).ready(function(){

            // Show Hide Password

            $(".toggle-password").click(function(){

                let input = $("#password");

                if(input.attr("type") == "password"){

                    input.attr("type","text");

                    $(this).removeClass("fa-eye");
                    $(this).addClass("fa-eye-slash");

                }else{

                    input.attr("type","password");

                    $(this).removeClass("fa-eye-slash");
                    $(this).addClass("fa-eye");

                }

            });


            // Login Validation

            $("form").submit(function(e){

                let isValid = true;

                $(".login_email_error").text('');
                $(".login_password_error").text('');

                $(".form-control").removeClass("border-danger");

                let email = $("input[name='email']").val().trim();
                let password = $("input[name='password']").val().trim();

                // Email Validation

                if(email == ""){

                    isValid = false;

                    $("input[name='email']").addClass("border-danger");

                    $(".login_email_error").text("Email is required");

                }

                // Password Validation

                if(password == ""){

                    isValid = false;

                    $("input[name='password']").addClass("border-danger");

                    $(".login_password_error").text("Password is required");

                }

                // Stop Submit

                if(!isValid){

                    e.preventDefault();

                }else{
                     $(".site_loader").removeClass("d-none");
                }

            });

        });

    </script>
</body>

</html>