@include('frontend.include.header')

<div class="container">


    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="">

                <div class="card-body py-5 px-4">
 
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        {{-- <img src="{{ asset('assets/site/greater_logo_black.png') }}"
                             alt="Logo"
                             style="max-width:160px;"> --}}

                        <h1 class="fw-bolder fs-1 mb-4 text-center">LOGIN</h1>
                    </div>

                    <!-- Error Message -->   
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form id="loginForm" method="POST" action="{{ route('authenticate') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">

                            <label class="form-label fw-bolder">Email Address</label>

                            <input type="email"
                                   name="email"
                                   class="form-control py-2 mt-1"
                                   placeholder="Enter Email">

                            <p class="error_text login_email_error text-danger"></p>

                        </div>

                        <!-- Password -->
                        <div class="mb-3">

                            <label class="form-label fw-bolder">Password</label>

                            <div class="position-relative">

                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control py-2"
                                       placeholder="Enter Password">

                                <i class="fa fa-eye toggle-password position-absolute"
                                   style="right:15px; top:12px; cursor:pointer;"></i>

                            </div>

                            <p class="error_text login_password_error text-danger"></p>

                        </div>

                        <!-- Remember + Forgot -->
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <!-- Remember Me -->
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="remember"
                                       id="remember">

                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>

                            <!-- Forgot Password -->
                            <a href="/forgot-password"
                               class="text-decoration-none fw-semibold text-primary">
                                Forgot Password?
                            </a>

                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                                class="btn w-100 py-3 fw-bold text-white mt-2"
                                style="background:#002d72; border-radius:10px;">
                            Login
                        </button>

                    </form>

                    <!-- Register Link -->
                    <div class="mt-4 text-center">
                        <span>
                            Don't have an account?
                            <a href="/club-register" class="fw-semibold text-primary text-decoration-none">
                                Sign up
                            </a>
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- jQuery Validation + Toggle -->
<script>
$(document).ready(function () {

    $("#loginForm").submit(function (e) {
        e.preventDefault();

        let isValid = true;

        $(".error_text").html("");

        let email = $("input[name='email']").val().trim();
        let password = $("input[name='password']").val().trim();

        // Email validation
        if (email === "") {
            $(".login_email_error").html("Email is required");
            isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            $(".login_email_error").html("Invalid email format");
            isValid = false;
        }

        // Password validation
        if (password === "") {
            $(".login_password_error").html("Password is required");
            isValid = false;
        } else if (password.length < 6) {
            $(".login_password_error").html("Password must be at least 6 characters");
            isValid = false;
        }

        if (isValid) {
            this.submit();
        }
    });

    // 👁 Toggle Password
    $(document).on("click", ".toggle-password", function () {

        let input = $("#password");

        if (input.attr("type") === "password") {
            input.attr("type", "text");
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            input.attr("type", "password");
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        }

    });

});
</script>

@include('frontend.include.footer')