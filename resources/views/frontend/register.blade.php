@include('frontend.include.header')

<style>

body{
    background:#f4f7fb;
}

/* Main Card */
.register-card {
    background: #ffffff;
    border-radius: 25px;
    padding: 45px;
    border: 1px solid #edf0f5;
    box-shadow: 0 1px 27px rgba(0, 0, 0, 0.08), 0 3px 8px rgba(0, 0, 0, 0.04);
    transition: 0.3s ease;
}

.register-card:hover{
    transform:translateY(-2px);
    box-shadow:
        0 15px 50px rgba(0,0,0,0.10),
        0 5px 20px rgba(0,0,0,0.06);
}

/* Title */
.form-title{
    color:#002d72;
    letter-spacing:1px;
}

/* Inputs */
.form-control,
.form-select{
    border-radius:14px !important;
    border:1px solid #dce3eb;
    background:#f9fbfd;
    transition:0.3s;
    font-size:15px;
    box-shadow:none !important;
}

.form-control:focus,
.form-select:focus{
    border-color:#002d72;
    background:#fff;
    box-shadow:0 0 0 4px rgba(0,45,114,0.08) !important;
}

/* Labels */
.form-label{
    color:#1f2937;
    font-weight:600;
}

/* Image Upload */
.player-image-upload{
    width:180px;
    height:180px;
    border-radius:50%;
    overflow:hidden;
    position:relative;
    border:5px solid #ffffff;
    cursor:pointer;
    background:#f8f9fa;
    box-shadow:0 10px 30px rgba(0,0,0,0.12);
}

.player-preview-img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:50%;
}

.upload-overlay{
    position:absolute;
    bottom:0;
    left:0;
    width:100%;
    height:45px;
    background:rgba(0,45,114,0.75);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    cursor:pointer;
}

/* Submit Button */
.submit-btn {
    background: linear-gradient(135deg, #002d72, #0056d6);
    border: none;
    border-radius: 14px;
    transition: 0.3s;
    font-size: 17px;
    box-shadow: 0 8px 20px rgba(0, 45, 114, 0.25);
}

.submit-btn:hover {
    transform: translateY(-2px);
}

/* Error */
.error-text{
    font-size:13px;
    font-weight:500;
}

/* Login Link */
.login-link{
    color:#002d72;
    text-decoration:none;
    font-weight:600;
}

.login-link:hover{
    text-decoration:underline;
}

</style>

<div class="container" style="padding-top:120px; padding-bottom:80px;">

    <div class="row justify-content-center">

        <div class="col-lg-8 col-md-10 col-sm-12">

            <div class="register-card">

                <h2 class="text-center fw-bold mb-5 text-uppercase fs-1 form-title">
                    Create Account
                </h2>

                <form id="registerForm"
                      action="{{ route('club-register') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <!-- Player Image (NOT REQUIRED) -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label d-block text-center mb-3">
                                Player Image (Optional)
                            </label>

                            <div class="d-flex justify-content-center">

                                <div class="player-image-upload">

                                    <img id="imagePreview"
                                         src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                                         class="player-preview-img">

                                    <input type="file"
                                           name="image"
                                           id="playerImageInput"
                                           accept="image/*"
                                           class="d-none">

                                    <label for="playerImageInput"
                                           class="upload-overlay">
                                        <i class="fa fa-camera fs-4"></i>
                                    </label>

                                </div>

                            </div>

                        </div>

                        <!-- First Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control py-3" placeholder="Enter First Name">
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control py-3" placeholder="Enter Last Name">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control py-3" placeholder="Enter Player Email">
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control py-3" placeholder="Enter Phone Number">
                        </div>

                        <!-- Age Group -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Age Group</label>
                            <select name="age_group" class="form-select py-3">
                                <option value="">Select Age Group</option>
                                <option value="Under 12">Under 12</option>
                                <option value="Under 15">Under 15</option>
                                <option value="Under 18">Under 18</option>
                                <option value="18+">18+</option>
                            </select>
                        </div>

                        <!-- DOB -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control py-3">
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select py-3">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Parent Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Parent Name</label>
                            <input type="text" name="parent_name" class="form-control py-3" placeholder="Enter Parent Name">
                        </div>

                        <!-- Parent Contact -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Parent Contact</label>
                            <input type="text" name="parent_contact" class="form-control py-3" placeholder="Enter Parent Contact">
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" rows="1" class="form-control py-3" placeholder="Enter Address"></textarea >
                        </div>

                        <!-- Password -->
                      

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password</label>

                            <div class="position-relative">
                                <input type="password"
                                    name="password"
                                    class="form-control py-3 password-field"
                                    placeholder="Enter Password">

                                <i class="fa fa-eye toggle-password"
                                data-target="password"
                                style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;"></i>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                       <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password</label>

                            <div class="position-relative">
                                <input type="password"
                                    name="confirm_password"
                                    class="form-control py-3 confirm-password-field"
                                    placeholder="Enter Confirm Password">

                                <i class="fa fa-eye toggle-password"
                                data-target="confirm_password"
                                style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;"></i>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn submit-btn text-white w-100 py-3 fw-bold mt-4">
                        Create Account
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

$(document).ready(function () {

    // Toggle Password Visibility
    $(document).on("click", ".toggle-password", function () {

        let target = $(this).data("target");
        let input = $("input[name='" + target + "']");

        let type = input.attr("type") === "password" ? "text" : "password";
        input.attr("type", type);

        // toggle icon
        $(this).toggleClass("fa-eye fa-eye-slash");
    });

    // Image Preview (optional)
    $("#playerImageInput").change(function (e) {

        let reader = new FileReader();

        reader.onload = function (event) {
            $("#imagePreview").attr("src", event.target.result);
        };

        reader.readAsDataURL(e.target.files[0]);
    });


    $("#registerForm").submit(function (e) {

        e.preventDefault();

        let isValid = true;

        $(".error-text").remove();


        function showError(field, message) {

            let element = $("[name='" + field + "']");

            element.after("<div class='text-danger error-text mt-1'>" + message + "</div>");
        }


        function validateEmail(email) {
            let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return pattern.test(email);
        }


        function onlyNumbers(value) {
            return /^[0-9]{10,15}$/.test(value);
        }


        // ======================
        // FIRST NAME
        // ======================
        let firstName = $("input[name='first_name']").val().trim();
        if (firstName === "") {
            showError("first_name", "First name is required");
            isValid = false;
        }


        // ======================
        // LAST NAME
        // ======================
        let lastName = $("input[name='last_name']").val().trim();
        if (lastName === "") {
            showError("last_name", "Last name is required");
            isValid = false;
        }


        // ======================
        // EMAIL
        // ======================
        let email = $("input[name='email']").val().trim();
        if (email === "") {
            showError("email", "Email is required");
            isValid = false;
        } else if (!validateEmail(email)) {
            showError("email", "Enter valid email");
            isValid = false;
        }


        // ======================
        // PHONE
        // ======================
        let phone = $("input[name='phone']").val().trim();
        if (phone === "") {
            showError("phone", "Phone number is required");
            isValid = false;
        } else if (!onlyNumbers(phone)) {
            showError("phone", "Enter valid phone number (10-15 digits)");
            isValid = false;
        }


        // ======================
        // AGE GROUP
        // ======================
        let ageGroup = $("select[name='age_group']").val();
        if (ageGroup === "") {
            showError("age_group", "Please select age group");
            isValid = false;
        }


        // ======================
        // DOB
        // ======================
        let dob = $("input[name='dob']").val();
        if (dob === "") {
            showError("dob", "Date of birth is required");
            isValid = false;
        }


        // ======================
        // GENDER
        // ======================
        let gender = $("select[name='gender']").val();
        if (gender === "") {
            showError("gender", "Please select gender");
            isValid = false;
        }


        // ======================
        // PARENT NAME
        // ======================
        let parentName = $("input[name='parent_name']").val().trim();
        if (parentName === "") {
            showError("parent_name", "Parent name is required");
            isValid = false;
        }


        // ======================
        // PARENT CONTACT
        // ======================
        let parentContact = $("input[name='parent_contact']").val().trim();
        if (parentContact === "") {
            showError("parent_contact", "Parent contact is required");
            isValid = false;
        } else if (!onlyNumbers(parentContact)) {
            showError("parent_contact", "Enter valid contact number");
            isValid = false;
        }


        // ======================
        // ADDRESS
        // ======================
        let address = $("textarea[name='address']").val().trim();
        if (address === "") {
            showError("address", "Address is required");
            isValid = false;
        }


        // ======================
        // PASSWORD
        // ======================
        let password = $("input[name='password']").val();

        if (password === "") {
            showError("password", "Password is required");
            isValid = false;
        } else if (password.length < 6) {
            showError("password", "Password must be at least 6 characters");
            isValid = false;
        }


        // ======================
        // CONFIRM PASSWORD
        // ======================
        let confirmPassword = $("input[name='confirm_password']").val();

        if (confirmPassword === "") {
            showError("confirm_password", "Confirm password is required");
            isValid = false;
        } else if (password !== confirmPassword) {
            showError("confirm_password", "Passwords do not match");
            isValid = false;
        }


        // ======================
        // IMAGE (OPTIONAL)
        // ======================
        let image = $("input[name='image']").val();

        if (image !== "") {

            let ext = image.split('.').pop().toLowerCase();

            let allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if ($.inArray(ext, allowed) === -1) {
                showError("image", "Only jpg, jpeg, png, gif, webp allowed");
                isValid = false;
            }
        }


        // SUBMIT
        if (isValid) {
            this.submit();
        }

    });

});

</script>

@include('frontend.include.footer')