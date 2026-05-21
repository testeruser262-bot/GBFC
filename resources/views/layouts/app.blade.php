<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"
      sizes="64x80"
      href="{{ asset('assets/site/favicon.png') }}">

    <title>@yield('title') | GBFC Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <style>
        /* SIDEBAR */
        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:#002F86;
            color:white;
            overflow-y:auto;
        }
        .sidebar-logo{
            padding:25px 20px;
            text-align:center;
        }
        .sidebar-logo-image{
            height: 50px;
            width: auto;
            text-align: center;
        }
        .sidebar-menu{
            padding:20px 15px;
        }
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 10px;
        }
       .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: 0.3s;
            font-size: 15px;
            font-weight: 600;
        }
        .sidebar-menu a:hover{
            background:white;
            color:#002F86;
        }

        .sidebar-menu a.active{
            background:white;
            color:#002F86;
        }

        /* MAIN */

        .main-content{
            margin-left:260px;
        }

        /* HEADER */

       .top-header {
            height: 75px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-bottom: 1px solid #e9e9e9;
        }
        .header-left h4{
            margin:0;
            font-weight:700;
            color:#0d6efd;
        }

        .header-right{
            display:flex;
            align-items:center;
            gap:15px;
        }

        .icon-box{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#eef4ff;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#002F86;
            cursor:pointer;
            font-size:18px;
        }

        .profile-box{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .profile-box img{
            width:45px;
            height:45px;
            border-radius:50%;
        }

        /* PAGE CONTENT */

        .page-content{
            padding:30px;
        }

        .dashboard-card{
            background:white;
            border-radius:18px;
            padding:25px;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
            margin-bottom:25px;
        }

        .form-control{
            height:52px;
            border-radius:12px;
        }

        .btn-primary{
            border-radius:10px;
            padding:10px 25px;
        }

        .step-box{
            background:white;
            border-radius:15px;
            padding:20px;
            margin-bottom:25px;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .step-item{
            display:flex;
            align-items:center;
            gap:10px;
            color:#6c757d;
            font-weight:600;
        }

        .step-item.active{
            color:#0d6efd;
        }

        .step-circle{
            width:42px;
            height:42px;
            border-radius:50%;
            background:#eef4ff;
            display:flex;
            align-items:center;
            justify-content:center;
        }

    </style>

</head>
<body>

    <!-- SIDEBAR -->

    @include('includes.sidebar')

    <!-- MAIN CONTENT -->

    <div class="main-content">

        <!-- HEADER -->

        @include('includes.header')

        <!-- PAGE -->

        <div class="page-content">

            @yield('content')

        </div>

    </div>

    <!-- FOOTER -->

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if(alert){
            alert.style.display = 'none';
        }
    }, 6000);
    </script>

</body>
</html>