@include('frontend.include.header')

<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">

    <div class="row w-100 justify-content-center py-5">

        <div class="col-lg-6 col-md-8 col-sm-10">

            <h2 class="text-center fw-bold mb-4 text-uppercase fs-1">Create Account</h2>

           <form id="registerForm" action="{{ route('club-register') }}" method="POST">

                @csrf

                <!-- First Name -->
                <div class="mb-3">
                    <label class="form-label fw-bold">First Name</label>
                    <input type="text" name="first_name"
                        class="form-control py-3"
                        placeholder="Enter First Name"
                        style="border-radius:12px;">
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Last Name</label>
                    <input type="text" name="last_name"
                        class="form-control py-3"
                        placeholder="Enter Last Name"
                        style="border-radius:12px;">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email"
                        class="form-control py-3"
                        placeholder="Enter Email"
                        style="border-radius:12px;">
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Phone Number</label>
                    <input type="text" name="phone"
                        class="form-control py-3"
                        placeholder="Enter Phone Number"
                        style="border-radius:12px;">
                </div>

                <!-- Age Group -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Age Group</label>
                    <select name="age_group"
                        class="form-select py-3"
                        style="border-radius:12px;">
                        <option value="">Select Age Group</option>
                        <option value="Under 12">Under 12</option>
                        <option value="Under 15">Under 15</option>
                        <option value="Under 18">Under 18</option>
                        <option value="18+">18+</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>

                    <div class="position-relative">
                        <input type="password"
                            name="password"
                            class="form-control py-3 password-field"
                            placeholder="Enter Password"
                            style="border-radius:12px;">

                        <i class="fa fa-eye toggle-password"
                           style="position:absolute; right:15px; top:20px; cursor:pointer;"></i>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Confirm Password</label>

                    <div class="position-relative">
                        <input type="password"
                            name="confirm_password"
                            class="form-control py-3 confirm-password-field"
                            placeholder="Confirm Password"
                            style="border-radius:12px;">

                        <i class="fa fa-eye toggle-confirm-password"
                           style="position:absolute; right:15px; top:20px; cursor:pointer;"></i>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="btn btn-primary w-100 py-3 fw-bold mt-4"
                    style="border-radius:12px; background:#002d72; border:none;">
                    Create Account
                </button>

            </form>

            <div class="text-center mt-5">
                <a href="#">Already have an account ?</a>
            </div>

        </div>

    </div>

</div>

<script>
$(document).ready(function () {

    $("#registerForm").submit(function (e) {
        e.preventDefault();

        let isValid = true;
        $(".error-text").remove();

        function showError(field, message) {
            $("[name='" + field + "']").after(
                "<div class='text-danger error-text mt-1'>" + message + "</div>"
            );
        }

        function validateEmail(email) {
            let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return pattern.test(email);
        }

        // First Name
        if ($("input[name='first_name']").val().trim() === "") {
            showError("first_name", "First name is required");
            isValid = false;
        }

        // Last Name
        if ($("input[name='last_name']").val().trim() === "") {
            showError("last_name", "Last name is required");
            isValid = false;
        }

        // Email
        let email = $("input[name='email']").val().trim();
        if (email === "") {
            showError("email", "Email is required");
            isValid = false;
        } else if (!validateEmail(email)) {
            showError("email", "Invalid email format");
            isValid = false;
        }

        // Phone
        let phone = $("input[name='phone']").val().trim();
        if (phone === "") {
            showError("phone", "Phone number is required");
            isValid = false;
        } else if (!/^[0-9]{10,15}$/.test(phone)) {
            showError("phone", "Enter valid phone number");
            isValid = false;
        }

        // Age Group
        if ($("select[name='age_group']").val() === "") {
            showError("age_group", "Please select age group");
            isValid = false;
        }

        // Password
        let password = $("input[name='password']").val();
        let confirm = $("input[name='confirm_password']").val();

        if (password === "") {
            showError("password", "Password is required");
            isValid = false;
        } else if (password.length < 6) {
            showError("password", "Minimum 6 characters required");
            isValid = false;
        }

        if (confirm === "") {
            showError("confirm_password", "Confirm password is required");
            isValid = false;
        } else if (password !== confirm) {
            showError("confirm_password", "Passwords do not match");
            isValid = false;
        }

        if (isValid) {
            this.submit();
        }
    });

    // 👁 Toggle Password
    $(document).on("click", ".toggle-password", function () {
        let input = $(".password-field");

        if (input.attr("type") === "password") {
            input.attr("type", "text");
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            input.attr("type", "password");
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    // 👁 Toggle Confirm Password
    $(document).on("click", ".toggle-confirm-password", function () {
        let input = $(".confirm-password-field");

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