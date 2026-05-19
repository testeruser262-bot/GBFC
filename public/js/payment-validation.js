$(document).on("submit", "form", function (e) {
    e.preventDefault();

    let isValid = true;

    $(".error_text").text("");
    $(".form-control, .form-select").removeClass("error-border");

    let amount = $("input[name='amount']").val().trim();
    let discount = $("input[name='discount']").val().trim();
    let pay_later = $("select[name='pay_later']").val().trim();
    let deposit_amount = $("input[name='deposit_amount']").val().trim();

    // Amount Validation
    if (amount == "") {
        $(".amount_error").text("Amount is required");
        $("input[name='amount']").addClass("error-border");
        isValid = false;
    } else if (parseFloat(amount) <= 0) {
        $(".amount_error").text("Enter valid amount");
        $("input[name='amount']").addClass("error-border");
        isValid = false;
    }

    // Discount Validation
    if (discount == "") {
        $(".discount_error").text("Discount is required");
        $("input[name='discount']").addClass("error-border");
        isValid = false;
    } else if (parseFloat(discount) < 0 || parseFloat(discount) > 100) {
        $(".discount_error").text("Discount must be between 0 to 100");
        $("input[name='discount']").addClass("error-border");
        isValid = false;
    }

    // Pay Later Validation
    if (pay_later == "") {
        $(".pay_later_error").text("Please select pay later option");
        $("select[name='pay_later']").addClass("error-border");
        isValid = false;
    }

    // Deposit Amount Validation
    if (deposit_amount == "") {
        $(".deposit_amount_error").text("Deposit amount is required");
        $("input[name='deposit_amount']").addClass("error-border");
        isValid = false;
    } else if (parseFloat(deposit_amount) <= 0) {
        $(".deposit_amount_error").text("Enter valid deposit amount");
        $("input[name='deposit_amount']").addClass("error-border");
        isValid = false;
    }

    // Deposit amount should not exceed total amount
    if (
        amount != "" &&
        deposit_amount != "" &&
        parseFloat(deposit_amount) > parseFloat(amount)
    ) {
        $(".deposit_amount_error").text(
            "Deposit amount cannot exceed total amount",
        );
        $("input[name='deposit_amount']").addClass("error-border");
        isValid = false;
    }

    // Submit form if valid
    if (isValid) {
        $(".site_loader").removeClass("d-none");
        this.submit();
    }
});
