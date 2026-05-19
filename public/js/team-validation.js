$(document).ready(function () {
    $("form").on("submit", function (e) {
        let isValid = true;

        // Clear old errors
        $(".error_text").text("");

        // Remove old error borders
        $("input, select, textarea").removeClass("error-border");

        // Get values
        let teamName = $("input[name='team_name']").val().trim();
        let ageGroup = $("select[name='age_group']").val();
        let gender = $("select[name='gender']").val();
        let sportId = $("select[name='sportId']").val();
        let description = $("textarea[name='description']").val().trim();

        // Team Name Validation
        if (teamName === "") {
            $(".team_name_error").text("Team name is required");
            $("input[name='team_name']").addClass("error-border");
            isValid = false;
        }

        // Age Group Validation
        if (ageGroup === "") {
            $(".age_group_error").text("Please select age group");
            $("select[name='age_group']").addClass("error-border");
            isValid = false;
        }

        // Gender Validation
        if (gender === "") {
            $(".gender_error").text("Please select gender");
            $("select[name='gender']").addClass("error-border");
            isValid = false;
        }

        // Sport Validation
        if (sportId === "") {
            $(".status_error").text("Please select sport");
            $("select[name='sportId']").addClass("error-border");
            isValid = false;
        }

        // Description Validation
        if (description === "") {
            $(".description_error").text("Description is required");
            $("textarea[name='description']").addClass("error-border");
            isValid = false;
        }

        // Stop submit if invalid
        if (!isValid) {
            e.preventDefault();
        } else {
            $(".site_loader").removeClass("d-none");
        }
    });
});
