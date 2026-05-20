@include('frontend.include.header')

<!-- Font Awesome CDN (add if not already included in your layout) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="text-center p-5  bg-white" style="max-width: 500px; width: 100%;">

        <!-- Success Icon -->
        <div class="mb-3">
            <i class="fa-solid fa-circle-check" style="font-size: 70px; color: #28a745;"></i>
        </div>

        <!-- Title -->
        <h2 class="fw-bold text-success mb-3">Payment Successful</h2>

        <!-- Message -->
        <p class="text-muted mb-3">
            Your payment has been successfully completed.
        </p>

        <p class="text-secondary mb-4">
            Admin will review your request and add you to the team shortly.
        </p>

        <!-- Optional Note -->
        <div class=" text-success py-2 mb-4">
            Thank you for joining with us!
        </div>

        <!-- Button -->
        <a href="{{ url('/') }}" class="btn btn-success px-4">
            Go to Home
        </a>

    </div>

</div>

@include('frontend.include.footer')