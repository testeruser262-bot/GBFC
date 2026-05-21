$(document).on("submit", "#eventForm", function (e) {
    e.preventDefault();

    let isValid = true;

    $(".error_text").text("");
    $(".form-control").removeClass("error-border");

    let event_name = $("input[name='event_name']").val().trim();
    let location = $("input[name='location']").val().trim();
    let start_date = $("input[name='start_date']").val().trim();
    let end_date = $("input[name='end_date']").val().trim();
    let description = $("textarea[name='description']").val().trim();

    if (event_name == "") {
        $(".event_name_error").text("Event name is required");
        $("input[name='event_name']").addClass("error-border");
        isValid = false;
    }

    if (location == "") {
        $(".location_error").text("Location is required");
        $("input[name='location']").addClass("error-border");
        isValid = false;
    }

    if (start_date == "") {
        $(".start_date_error").text("Start date is required");
        $("input[name='start_date']").addClass("error-border");
        isValid = false;
    }

    if (end_date == "") {
        $(".end_date_error").text("End date is required");
        $("input[name='end_date']").addClass("error-border");
        isValid = false;
    }

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

    if (description == "") {
        $(".description_error").text("Description is required");
        $("textarea[name='description']").addClass("error-border");
        isValid = false;
    }

    if (isValid) {
        $(".site_loader").removeClass("d-none");
        this.submit();
    }
});
