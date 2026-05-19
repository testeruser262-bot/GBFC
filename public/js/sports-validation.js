$(document).ready(function () {
    $("form").on("submit", function (e) {
        let sportName = $("input[name='sportName']");
        let errorLabel = $(".sportName_error");
        let value = $.trim(sportName.val());
        let isValid = true;

        // Reset error state
        errorLabel.text("");
        sportName.css("border", "1px solid #ced4da");

        // Required validation
        if (value === "") {
            errorLabel.text("Sport name is required.");
            sportName.css("border", "1px solid red");
            isValid = false;
        }

        // Min length
        else if (value.length < 2) {
            errorLabel.text("Sport name must be at least 2 characters.");
            sportName.css("border", "1px solid red");
            isValid = false;
        }

        // Only letters and spaces
        else if (!/^[a-zA-Z\s]+$/.test(value)) {
            errorLabel.text("Only letters are allowed.");
            sportName.css("border", "1px solid red");
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        } else {
            $(".site_loader").removeClass("d-none");
        }
    });

    // Live validation remove error on typing
    $("input[name='sportName']").on("input", function () {
        $(".sportName_error").text("");
        $(this).css("border", "1px solid #ced4da");
    });
});
