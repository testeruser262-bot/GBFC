$(document).on("submit", "form", function (e) {
    e.preventDefault();

    let isValid = true;

    $(".error_text").text("");

    // remove old borders first
    $("input, select, textarea").removeClass("error-border");

    let first_name = $("input[name='first_name']").val().trim();
    let email = $("input[name='email']").val().trim();
    let phone = $("input[name='phone']").val().trim();
    let dob = $("input[name='dob']").val().trim();
    let gender = $("select[name='gender']").val();

    // FIRST NAME
    if (first_name == "") {
        $(".first_name_error").text("First name is required");
        $("input[name='first_name']").addClass("error-border");
        isValid = false;
    }

    // EMAIL
    if (email == "") {
        $(".email_error").text("Email is required");
        $("input[name='email']").addClass("error-border");
        isValid = false;
    } else {
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            $(".email_error").text("Enter valid email address");
            $("input[name='email']").addClass("error-border");
            isValid = false;
        }
    }

    // PHONE
    if (phone == "") {
        $(".phone_error").text("Phone number is required");
        $("input[name='phone']").addClass("error-border");
        isValid = false;
    } else {
        let phonePattern = /^[0-9]{10}$/;

        if (!phonePattern.test(phone)) {
            $(".phone_error").text("Enter valid 10 digit phone number");
            $("input[name='phone']").addClass("error-border");
            isValid = false;
        }
    }

    // DOB
    if (dob == "") {
        $(".dob_error").text("Date of birth is required");
        $("input[name='dob']").addClass("error-border");
        isValid = false;
    }

    // GENDER
    if (gender == "") {
        $(".gender_error").text("Please select gender");
        $("select[name='gender']").addClass("error-border");
        isValid = false;
    }

    // FINAL CHECK
    if (isValid) {
        $(".site_loader").removeClass("d-none");
        this.submit();
    }
});
