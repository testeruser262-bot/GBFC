@include('frontend.include.header')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="col-md-5">

        <div class="">

            <div class="text-center mb-5">
                <h1 class="fw-bold text-uppercase">GBFC Payment</h1>
            </div>

            <!-- SUCCESS / ERROR -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

           <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body px-0">

                    <h5 class="fw-bold mb-3">Payment Summary</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Amount</span>
                        <span class="fw-semibold">$10.00</span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Processing Fee</span>
                        <span class="fw-semibold">$1.00</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Total Amount</span>
                        <span class="fw-bold text-primary fs-5">$11.00</span>
                    </div>

                </div>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('stripe.charge') }}" id="payment-form">
                @csrf

                <!-- CARD NUMBER -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Card Number</label>

                    <div id="card-number"
                         class="form-control p-3"
                         style="height: 50px; border-radius: 10px;"></div>

                    <small class="text-danger" id="card-number-error"></small>
                </div>

                <!-- EXP + CVC -->
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Expiry Date</label>

                        <div id="card-expiry"
                             class="form-control p-3"
                             style="height: 50px; border-radius: 10px;"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">CVC</label>

                        <div id="card-cvc"
                             class="form-control p-3"
                             style="height: 50px; border-radius: 10px;"></div>
                    </div>

                </div>

                <!-- Expiry + CVC error -->
                <small class="text-danger" id="card-cvv-date"></small>

                <!-- TOKEN -->
                <input type="hidden" name="stripeToken" id="stripeToken">

                <button type="submit" class="btn btn-primary w-100 py-3 rounded-3 fw-semibold mt-3">
                    Pay Now
                </button>

            </form>

        </div>

    </div>
</div>

@include('frontend.include.footer')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Stripe -->
<script src="https://js.stripe.com/v3/"></script>

<script>
$(document).ready(function () {

    const stripe = Stripe("{{ config('services.stripe.key') }}");
    const elements = stripe.elements();

    const cardNumber = elements.create("cardNumber");
    const cardExpiry = elements.create("cardExpiry");
    const cardCvc = elements.create("cardCvc");

    cardNumber.mount("#card-number");
    cardExpiry.mount("#card-expiry");
    cardCvc.mount("#card-cvc");

    function clearErrors() {
        $("#card-number-error").text("");
        $("#card-cvv-date").text("");
    }

    function handleError(event) {

        if (!event.error) {
            clearErrors();
            return;
        }

        const message = event.error.message;

        // CARD NUMBER ERROR
        if (event.elementType === "cardNumber") {
            $("#card-number-error").text(message);
        }

        // EXPIRY OR CVC ERROR
        if (event.elementType === "cardExpiry" || event.elementType === "cardCvc") {
            $("#card-cvv-date").text(message);
        }
    }

    cardNumber.on("change", handleError);
    cardExpiry.on("change", handleError);
    cardCvc.on("change", handleError);

    // FORM SUBMIT
    $("#payment-form").on("submit", function (e) {
        e.preventDefault();

        clearErrors();

        stripe.createToken(cardNumber).then(function (result) {

            if (result.error) {
                // fallback error handling
                $("#card-cvv-date").text(result.error.message);

            } else {

                $("#stripeToken").val(result.token.id);
                $("#payment-form")[0].submit();
            }
        });
    });

});
</script>