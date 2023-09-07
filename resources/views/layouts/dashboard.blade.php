<!doctype html>
<html lang="en">

<head>
    <title>OR13 Neo Telemetri</title>
    <link rel="shortcut icon" href={{ url("img/logoor.png") }} type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href={{ url("css/style.css") }}>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-0 bgDashboard position-relative">
                <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex justify-content-center pb-3 mb-5 mt-md-3 w-100 text-white text-decoration-none">
                        <img src={{ url("img/logoDD.png") }} alt="" class='img-fluid d-inline d-sm-none' style="width: 'calc(1.275rem + .3vw)'"/>
                        <img src={{ url("img/logoD.png") }} alt="" class="img-fluid d-none d-sm-inline" />
                    </a>
                    <ul class="nav nav-pills w-100 flex-column mb-auto align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item w-100 ps-md-4 px-2 px-md-0 sidebarLi">
                            <a href="" class="a text-white nav-link px-0 align-middle styles.navLink">
                                <i class="fs-4 bi bi-person-fill"></i>
                                <span class="ms-md-4 d-none d-sm-inline">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 ps-md-4 px-2 px-md-0 sidebarLi">
                            <a href="" class="a text-white nav-link align-middle px-0 navLink">
                                <i class="fs-4 bi bi-house-fill"></i>
                                <span class="ms-md-4 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 ps-md-4 px-2 px-md-0 sidebarLi">
                            <a href="" class="a text-white nav-link px-0 align-middle navLink">
                                <i class="fs-4 bi bi-shield-fill-check"></i>
                                <span class="ms-md-4 d-none d-sm-inline">Verify</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 ps-md-4 px-2 px-md-0 sidebarLiActive">
                            <a href="" class="a text-white nav-link px-0 align-middle navLink ">
                                <i class="fs-4 bi bi-file-earmark-fill"></i>
                                <span class="ms-md-4 d-none d-sm-inline">Ujian Online</span>
                            </a>
                        </li>
                    </ul>
                    <ul class='nav nav-pills w-100 mb-md-3'>
                        <li class="nav-item w-100 ps-md-4 px-2 px-md-0 sidebarLi">
                            <button class="text-white nav-link align-middle d-flex align-items-center px-0">
                                <i class="fs-4 bi bi-arrow-left-circle-fill"></i>
                                <span class="ms-md-4 d-none d-sm-inline">Keluar</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            @yield("content")
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
