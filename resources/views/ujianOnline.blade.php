<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/screen.css') }}">
    <link rel="stylesheet" href="{{ url('css/animates.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">

    <!-- Logo -->
    <link rel="icon" href="{{ url('img/Logo Kubik.png') }}">

    <title>Ujian Online</title>
  </head>
  <body>

    <!-- Sidebar -->
    <div class="sidebar position-fixed top-0 h-100 border">
      <div class="d-flex justify-content-between bLogo">
        <div class="logo">
          <img src="{{ url('img/Neo.svg') }}" alt="" class="logoSidebar">
          <img src="{{ url('img/Logo Png.png') }}" alt="" class="logoSidebar">
        </div>
        <span class="menu">
          <label for="menu">
            <i class='bx bx-menu'></i>
          </label>
          <input type="checkbox" name="menu" id="menu">
        </span>
      </div>
      <div class="sideLink">
        <p class="linkJudul fw-bold">Umum</p>
        <ul class="sideUl">
          <li class="sideLi">
            <a href="{{ route('dashboardView') }}" class="d-flex align-items-center fw-bold sideA">
              <i class='fs-5 bx bx-grid-alt' ></i>
              <span class="linkName">Beranda</span>
            </a>
            <span class="nameLink fw-bold">Beranda</span>
          </li>
          <li class="sideLi">
            <a href="{{ route('index') }}" class="d-flex align-items-center fw-bold sideA">
              <i class='fs-5 bx bx-link-external bx-rotate-270' ></i>
              <span class="linkName">Kembali ke OR</span>
            </a>
            <span class="nameLink fw-bold">Kembali ke OR</span>
          </li>
        </ul>
          <a style="text-decoration: none" href="{{ route('editProfile') }}">
              <p class="linkJudul fw-bold">{{ $user->profile->divisi ?? "Your Divisi ??" }}</p>
          </a>
        <ul class="sideUl">
          <li class="sideLi" id="ujianOnline">
            <a href="{{ route('ujianView') }}" class="d-flex align-items-center fw-bold sideA">
              <i class='fs-5 bx bx-book-open' ></i>
              <span class="linkName">Ujian Online</span>
            </a>
            <ul class="sideDown">
              <li>
                <a href="">
                  <span class="nameSideDown">Multimedia dan Desain</span>
                </a>
              </li>
              <li>
                <a href="">
                  <span class="nameSideDown">Programming</span>
                </a>
              </li>
              <li>
                <a href="">
                  <span class="nameSideDown">Sistem Komputer dan Jaringan</span>
                </a>
              </li>
              <li>
                <a href="">
                  <span class="nameSideDown">Organisasi</span>
                </a>
              </li>
            </ul>
            <span class="nameLink fw-bold">Ujian Online</span>
          </li>
          <li class="sideLi invisible" id="logBook">
            <a href="{{ route('logbookView') }}" class="d-flex align-items-center fw-bold sideA">
              <i class='fs-5 bx bx-book'></i>
              <span class="linkName">Log Book</span>
            </a>
            <ul class="sideDownLogBook">
              <li>
                <a href="">
                  <span class="nameSideDown">Kakak/Abang Neoters</span>
                </a>
              </li>
              <li>
                <a href="">
                  <span class="nameSideDown">Teman OR</span>
                </a>
              </li>
              <li>
                <a href="">
                  <span class="nameSideDown">Kesan dan Pesan OR</span>
                </a>
              </li>
            </ul>
            <span class="nameLink fw-bold">Log Book</span>
          </li>
          <li class="sideLi invisible" id="nilai">
            <a href="{{ route('penilaianView') }}" class="d-flex align-items-center fw-bold sideA">
              <i class='fs-5 bx bx-check-square'></i>
              <span class="linkName">Penilaian</span>
            </a>
            <ul class="sideDownNilai">
              <li>
                <a href="">
                  <span class="nameSideDown">Visit School</span>
                </a>
              </li>
              <li>
                <a href="">
                  <span class="nameSideDown">Keakraban</span>
                </a>
              </li>
            </ul>
            <span class="nameLink fw-bold">Penilaian</span>
          </li>
          <li class="sideLi invisible">
            <a href="{{ route('eulaView') }}" class="d-flex align-items-center fw-bold sideA">
              <i class='fs-5 bx bx-calendar-minus' ></i>
              <span class="linkName">EULA</span>
            </a>
            <span class="nameLink fw-bold">EULA</span>
          </li>
          <li class="position-absolute bottom-0 mb-5 outA sideLi">
            <a href="{{ route('logout') }}" class="d-flex align-items-center fw-bold sideA">
              <i class='fs-5 bx bx-link-external bx-rotate-270' ></i>
              <span class="linkName">Keluar</span>
            </a>
            <span class="nameLink fw-bold">Keluar</span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Ujian Online -->
    <div class="container-fluid position-relative profile">
      <div class="nav-akun position-absolute end-0">
        <div class="d-flex infoAkun align-items-center">
          <img src="{{ url('img/user-solid.svg') }}" alt="" class="gAkun border">
          <p class="pAkun mb-0 fw-bold">{{ $user->name }}</p>
          <i class='fs-6 bx bx-chevron-down' ></i>
        </div>
        <ul class="dropDown border" id="dropDown">
          <li>
            <a href="{{ route('dashboardView') }}">
              <i class="bx bx-grid-alt"></i>
              <span>Beranda</span>
            </a>
          </li>
          <li>
            <a href="{{ route('profileView') }}">
                  <i class='bx bxs-user'></i>
                  <span>Profil</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="row rowUjianOnline">
        <p class="jUjianOnline">Ujian Online</p>
        <div class="d-flex flex-wrap transisi">
            <a href="{{ route('ruleView',[1]) }}">
                <div class="boxDiv d-flex align-items-center justify-content-center">
                    <div class="borderExDiv">
                        <div class="borderInDiv">
                            <img src="{{ url('img/mmd.PNG') }}" alt="">
                        </div>
                    </div>
                    <p style="color: black" class="subJUjianOnline fw-bold text-center">Divisi Multimedia dan Desain</p>
                </div>
            </a>
            <a href="{{ route('ruleView',[2]  ) }}">
                <div class="boxDiv d-flex align-items-center justify-content-center">
                    <div class="borderExDiv">
                        <div class="borderInDiv">
                            <img src="{{ url('img/programming.PNG') }}" alt="">
                        </div>
                    </div>
                    <p style="color: black" class="subJUjianOnline fw-bold text-center">Divisi Programming</p>
                </div>
            </a>
            <a href="{{ route('ruleView',[3]) }}">
                <div class="boxDiv d-flex align-items-center justify-content-center">
                    <div class="borderExDiv">
                        <div class="borderInDiv">
                            <img src="{{ url('img/skj.PNG') }}" alt="">
                        </div>
                    </div>
                    <p style="color: black" class="subJUjianOnline fw-bold text-center">Divisi Sistem Komputer dan Jaringan</p>
                </div>
            </a>
            <a href="{{ route('ruleView',[4]) }}">
                <div class="boxDiv d-flex align-items-center justify-content-center">
                    <div class="borderExDiv">
                        <div class="borderInDiv">
                            <img src="{{ url('img/organisasi.png') }}" alt="" id="organisasi">
                        </div>
                    </div>
                    <p style="color: black" class="subJUjianOnline fw-bold text-center">Organisasi</p>
                </div>
            </a>
        </div>
      </div>
    </div>

    <!-- POP UP Message -->
    <div class="position-fixed start-50 top-50 translate-middle w-50 popUp" id="message">
        <div style="align-items: center" class="passNsame messageNsame border d-none w-75">
            <p class="h4 text-center fw-bold pPass @if(session('status') === 'Success') text-success @else text-danger @endif">{{ session('title') }}</p>
            <p class="fs-6 text-center @if(session('status') === 'Success') text-success @else text-danger @endif">{{ session('message') }}</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="{{ url('js/sidebar.js') }}"></script>
    <script>

      let tombol = document.querySelector(".menu label"),
          profile = document.querySelector(".profile")

      tombol.onclick = () =>{
        profile.classList.toggle("showProfile")
      }

      let message = document.querySelector('#message');
      let mp = document.querySelector(".messageNsame");
      message.onclick = () => {
          message.style.zIndex = -1;
          mp.classList.replace("zoomIn", "d-none")
      }
      @if(session('message'))
          message.style.zIndex = 2;
      mp.classList.replace("d-none", "zoomIn")
      setTimeout(() => {
          message.style.zIndex = -1;
          mp.classList.replace("zoomIn", "d-none")
      }, 4000);
        @endif

    </script>

    <!-- Icon -->
    <script src="{{ url('js/all.js') }}"></script>
  </body>
</html>
