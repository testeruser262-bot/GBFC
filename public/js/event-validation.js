$(function () {
    // START DATEPICKER
    $("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 1,
        changeMonth: true,
        changeYear: true,

        onSelect: function (selectedDate) {
            // SET MIN DATE FOR END DATE
            $("#end_date").datepicker("option", "minDate", selectedDate);
        },
    });

    // END DATEPICKER
    $("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 1,
        changeMonth: true,
        changeYear: true,
    });
});

$(document).on("change", "#event_image", function () {
    let file = this.files[0];

    $(".event_image_error").text("");

    if (file) {
        // IMAGE VALIDATION
        let allowedTypes = [
            "image/jpeg",
            "image/png",
            "image/jpg",
            "image/webp",
        ];

        if (!allowedTypes.includes(file.type)) {
            $(".event_image_error").text("Please select a valid image");

            $("#imagePreview").attr("src", "").addClass("d-none");

            $("#dummyImage").removeClass("d-none");

            $(this).val("");

            return;
        }

        // IMAGE PREVIEW
        let reader = new FileReader();

        reader.onload = function (e) {
            $("#imagePreview")
                .attr("src", e.target.result)
                .removeClass("d-none");

            // HIDE DUMMY IMAGE
            $("#dummyImage").addClass("d-none");
        };

        reader.readAsDataURL(file);
    }
});

// FORM SUBMIT VALIDATION
$(document).on("submit", "#eventForm", function (e) {
    e.preventDefault();

    let isValid = true;

    $(".error_text").text("");

    $(".form-control, .form-select, textarea").removeClass("error-border");

    let event_name = $("input[name='event_name']").val().trim();

    let category = $("select[name='category']").val();

    let location = $("input[name='location']").val().trim();

    let pay_later = $("select[name='pay_later']").val();

    let start_date = $("input[name='start_date']").val().trim();

    let end_date = $("input[name='end_date']").val().trim();

    let description = $("textarea[name='description']").val().trim();

    // EVENT NAME
    if (event_name == "") {
        $(".event_name_error").text("Event name is required");

        $("input[name='event_name']").addClass("error-border");

        isValid = false;
    }

    // CATEGORY
    if (category == "") {
        $(".category_error").text("Category is required");

        $("select[name='category']").addClass("error-border");

        isValid = false;
    }

    // LOCATION
    if (location == "") {
        $(".location_error").text("Location is required");

        $("input[name='location']").addClass("error-border");

        isValid = false;
    }

    // PAY LATER
    if (pay_later == "") {
        $(".pay_later_error").text("Please select pay later option");

        $("select[name='pay_later']").addClass("error-border");

        isValid = false;
    }

    // START DATE
    if (start_date == "") {
        $(".start_date_error").text("Start date is required");

        $("input[name='start_date']").addClass("error-border");

        isValid = false;
    }

    // END DATE
    if (end_date == "") {
        $(".end_date_error").text("End date is required");

        $("input[name='end_date']").addClass("error-border");

        isValid = false;
    }

    // DATE VALIDATION
    if (start_date != "" && end_date != "") {
        let start = new Date(start_date);

        let end = new Date(end_date);

        if (end <= start) {
            $(".end_date_error").text(
                "End date must be greater than start date",
            );

            $("input[name='end_date']").addClass("error-border");

            isValid = false;
        }
    }

    // DESCRIPTION
    if (description == "") {
        $(".description_error").text("Description is required");

        $("textarea[name='description']").addClass("error-border");

        isValid = false;
    }

    // FINAL SUBMIT
    if (isValid) {
        $(".site_loader").removeClass("d-none");
        this.submit();
    }
});
