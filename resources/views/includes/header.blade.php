<header>

    <!-- Loader -->
    <div class="site_loader d-none">
        <div class="page-loader">
            <div class="img-loader">
                <img src="{{ asset('assets/site/loader_blue.png') }}" alt="Loader">
            </div>
        </div>
    </div>

    <!-- Delete Popup -->
    <div class="delete_popup" style="display: none;">
        <div class="del_popup_bk">

            <div class="delete_modal">

                <!-- Icon -->
                <div class="delete_icon">
                    <i class="fa-solid fa-trash"></i>
                </div>

                <!-- Title -->
                <h2>Delete Item</h2>

                <!-- Message -->
                <p>
                    Are you sure you want to delete this item?
                </p>

                <!-- Buttons -->
                <div class="delete_btns">
                    <button type="button" class="cancel_btn btn btn-secondary">
                        Cancel
                    </button>

                    <button type="button" class="delete_btn btn btn-danger">
                        Delete
                    </button>
                </div>

            </div>

        </div>
    </div>

    <!-- Header -->
    <div class="top-header d-flex justify-content-between align-items-center px-3">

        <!-- Left Side -->
        <div class="header-left">
            <span id="todayDate" class="text-secondary fw-bold fs-5"></span>
        </div>

        <!-- Right Side -->
        <div class="header-right d-flex align-items-center">

            <!-- User Icon -->
            <div class="icon-box me-3">
                A
            </div>

            <!-- Logout Button -->
            <a href="{{ route('logout') }}" class="logout-btn">
                <i class="fa fa-sign-out"></i>
                Logout
            </a>

        </div>

    </div>

</header>

<!-- Main Container -->
<div class="container-fluid full-page py-4">

    <!-- Success Message -->
    @if(session('success'))
        <div class='px-4'>
            <div class="alert {{ session('class') }} alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

$(document).ready(function () {

    // Today Date

    let today = new Date();

    let options = {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    };

    let fullDate = today.toLocaleDateString('en-US', options);

    $("#todayDate").text(fullDate);

    // Delete Popup

    let deleteUrl = '';
  
    $(".delete_item").on('click', function () {
        deleteUrl = $(this).data('url');
        $(".delete_popup").css("display", "flex");
    });


    $(".cancel_btn").on('click', function () {
        $(".delete_popup").hide();
    });

    $(".delete_btn").on('click', function () {
        if(deleteUrl != '') {
            window.location.href = deleteUrl;
        } 
    });

    $(".logout-btn").on('click',function(){
        $(".site_loader").removeClass("d-none");
    });

});

</script>