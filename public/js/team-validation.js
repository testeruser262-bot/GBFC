$(document).ready(function () {
    $("form").on("submit", function (e) {
        let isValid = true;

        // clear previous errors
        $(".error_text").text("");

        // remove old red borders
        $("input, select, textarea").removeClass("error-border");

        let teamName = $("input[name='team_name']").val().trim();
        let ageGroup = $("select[name='age_group']").val();
        let gender = $("select[name='gender']").val();
        let status = $("select[name='status']").val();

        // Team Name
        if (teamName === "") {
            $(".team_name_error").text("Team name is required");
            $("input[name='team_name']").addClass("error-border");
            isValid = false;
        }

        // Age Group
        if (ageGroup === "") {
            $(".age_group_error").text("Please select age group");
            $("select[name='age_group']").addClass("error-border");
            isValid = false;
        }

        // Gender
        if (gender === "") {
            $(".gender_error").text("Please select gender");
            $("select[name='gender']").addClass("error-border");
            isValid = false;
        }

        // Status
        if (status === "") {
            $(".status_error").text("Please select status");
            $("select[name='status']").addClass("error-border");
            isValid = false;
        }

        // stop submit if invalid
        if (!isValid) {
            e.preventDefault();
        } else {
            $(".site_loader").removeClass("d-none");
        }
    });
});
