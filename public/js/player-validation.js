$(document).on("submit", "#playerForm", function (e) {
    e.preventDefault();

    let isValid = true;

    $(".error_text").text("");

    $("input, select, textarea").removeClass("error-border");

    // VALUES
    let first_name = $("input[name='first_name']").val().trim();
    let last_name = $("input[name='last_name']").val().trim();
    let email = $("input[name='email']").val().trim();
    let phone = $("input[name='phone']").val().trim();
    let dob = $("input[name='dob']").val().trim();
    let gender = $("select[name='gender']").val();
    let parent_name = $("input[name='parent_name']").val().trim();
    let parent_contact = $("input[name='parent_contact']").val().trim();
    let address = $("textarea[name='address']").val().trim();
    let image = $("input[name='image']").val();

    // PATTERNS
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let phonePattern = /^[0-9]{10}$/;

    // FIRST NAME
    if (first_name === "") {
        $(".first_name_error").text("First name is required");

        $("input[name='first_name']").addClass("error-border");

        isValid = false;
    }

    // LAST NAME
    if (last_name === "") {
        $(".last_name_error").text("Last name is required");

        $("input[name='last_name']").addClass("error-border");

        isValid = false;
    }

    // EMAIL
    if (email === "") {
        $(".email_error").text("Email is required");
        $("input[name='email']").addClass("error-border");
        isValid = false;
    } else if (!emailPattern.test(email)) {
        $(".email_error").text("Enter valid email address");
        $("input[name='email']").addClass("error-border");
        isValid = false;
    }

    // PHONE
    if (phone === "") {
        $(".phone_error").text("Phone number is required");
        $("input[name='phone']").addClass("error-border");
        isValid = false;
    } else if (!phonePattern.test(phone)) {
        $(".phone_error").text("Enter valid 10 digit phone number");
        $("input[name='phone']").addClass("error-border");
        isValid = false;
    }

    // DOB
    if (dob === "") {
        $(".dob_error").text("Date of birth is required");
        $("input[name='dob']").addClass("error-border");
        isValid = false;
    }

    // GENDER
    if (gender === "") {
        $(".gender_error").text("Please select gender");
        $("select[name='gender']").addClass("error-border");
        isValid = false;
    }

    // PARENT NAME
    if (parent_name === "") {
        $(".parent_name_error").text("Parent name is required");
        $("input[name='parent_name']").addClass("error-border");
        isValid = false;
    }

    // PARENT CONTACT

    if (parent_contact === "") {
        $(".parent_contact_error").text("Parent contact is required");
        $("input[name='parent_contact']").addClass("error-border");
        isValid = false;
    } else if (!phonePattern.test(parent_contact)) {
        $(".parent_contact_error").text("Enter valid 10 digit number");
        $("input[name='parent_contact']").addClass("error-border");
        isValid = false;
    }

    // ADDRESS

    if (address === "") {
        $(".address_error").text("Address is required");
        $("textarea[name='address']").addClass("error-border");
        isValid = false;
    }

    // IMAGE VALIDATION (OPTIONAL)

    if (image !== "") {
        let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(image)) {
            $(".image_error").text("Only JPG, JPEG, PNG allowed");
            $("input[name='image']").addClass("error-border");
            isValid = false;
        }
    }

    // FINAL SUBMIT
    if (isValid) {
        $(".site_loader").removeClass("d-none");
        this.submit();
    }
});
