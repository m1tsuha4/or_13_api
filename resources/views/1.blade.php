@extends("layouts.dashboard")

@section("content")

@php
    $title = "Multimedia dan Desain";
    $data = array(
        array(
            "no" => 1,
            "soal" => "Dalam pengolahan suatu gambar, agar warna yang dipilih sesuai dengan warna yang akan dicetak maka digunakan format warna",
            "a" => "RGB",
            "b" => "CMYK",
            "c" => "FPS",
            "d" => "Pantone"
        ),
        array(
            "no" => 2,
            "soal" => "Font yang ciri khasnya mempunyai garis kecil yang berdiri horizontal pada setiap hurufnya atau umum disebut counter stroke disebut jenis font",
            "a" => "Serif",
            "b" => "Sans serif",
            "c" => "Slab serif",
            "d" => "Script"
        ),
        array(
            "no" => 3,
            "soal" => "#000000 merupakan hex code untuk warna",
            "a" => "Putih",
            "b" => "Abu-abu",
            "c" => "Hitam",
            "d" => "Merah"
        ),
        array(
            "no" => 4,
            "soal" => "Berikut yang termasuk warna primer, Kecuali",
            "a" => "Cyan",
            "b" => "Red",
            "c" => "Yellow",
            "d" => "Blue"
        ),
        array(
            "no" => 5,
            "soal" => "Apa sebutan untuk sebuah tampilan grafis yang berhubungan langsung dengan pengguna (user)?",
            "a" => "UI (User Interface)",
            "b" => "UI (User Information)",
            "c" => "UX (User Experience)",
            "d" => "UI/UX"
        ),
        array(
            "no" => 6,
            "soal" => "Apa itu frame?",
            "a" => "Bingkai foto",
            "b" => "Penampilan sebuah gambar",
            "c" => "Durasi penyajian video",
            "d" => "Batas pinggir suatu gambar"
        ),
        array(
            "no" => 7,
            "soal" => "Tampilan yang terdiri dari objek 3D dan objek lainnya adalah",
            "a" => "Toolbar",
            "b" => "Viewport",
            "c" => "Header",
            "d" => "Footer"
        ),
        array(
            "no" => 8,
            "soal" => "Aplikasi yang bisa digunakan untuk membuat sebuah desain antarmuka pengguna (UI)?",
            "a" => "Adobe XD, Figma",
            "b" => "Autodesk Maya, Blender",
            "c" => "Adobe After Effect, Adobe Premier Pro",
            "d" => "Adobe Photoshop, Adobe Illustrator"
        ),
        array(
            "no" => 9,
            "soal" => "Apa kepanjangan fps",
            "a" => "Flame per second",
            "b" => "First per sequel",
            "c" => "Frame percent second",
            "d" => "Frame per second"
        ),
        array(
            "no" => 10,
            "soal" => "3D dapat diaplikasikan ke media apa saja, kecuali",
            "a" => "Computer-Generated Imagery",
            "b" => "Prototype",
            "c" => "Visual Effect",
            "d" => "Vektor"
        ),
        array(
            "no" => 11,
            "soal" => "Langkah awal sebelum merancang desain UI, kita perlu menentukan",
            "a" => "Prototype",
            "b" => "High Fidelity Mockup",
            "c" => "Wireframe",
            "d" => "Userflow"
        ),
        array(
            "no" => 12,
            "soal" => "Yang merupakan aplikasi mengedit video adalah sebagai berikut, kecuali",
            "a" => "Adobe Premiere Pro",
            "b" => "Vegas Pro",
            "c" => "Blender",
            "d" => "Final Cut Pro"
        ),
        array(
            "no" => 13,
            "soal" => "Aplikasi yang bisa digunakan untuk membuat sebuah desain 3D?",
            "a" => "Adobe XD, Figma",
            "b" => "Autodesk Maya, Blender",
            "c" => "Adobe After Effect, Adobe Premier Pro",
            "d" => "Adobe Photoshop, Adobe Illustrator"
        ),
        array(
            "no" => 14,
            "soal" => "Adobe Photoshop merupakan aplikasi desain berbasis",
            "a" => "Bitmap",
            "b" => "Vector",
            "c" => "Hex Code",
            "d" => "Wireframe"
        ),
        array(
            "no" => 15,
            'soal' => 'Proses perubahan adegan klip dari cepat ke lambat sehingga menjadi halus untuk dilihat dinamakan',
            'a' => 'Fast motion',
            'b' => 'Hyperlapse',
            'c' => 'Slow motion',
            'd' => 'Timelapse'
        )
    );
@endphp

<div class="col px-md-5 py-3 min-vh-100 content">
    <div class="row my-md-3 align-items-center">
        <div class="col-6">
            <p class="fs-4 fw-bold mb-md-0 color-or">Divisi {{ $title }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6 d-flex" style="gap: 1rem">
            <div class="tanggal bgDashboard d-flex align-items-center justify-content-center">
                <p class="fs-6 text-white mb-0">{{ date("d M Y") }}</p>
            </div>
            <div class="tanggal bgDashboard d-flex align-items-center justify-content-center">
                <p class="fs-6 text-white mb-0">15 Soal</p>
            </div>
        </div>
        <div class="col-6 d-flex flex-row-reverse">
            <div class="tanggal bgDashboard d-flex align-items-center justify-content-center">
                <p class="fs-6 text-white mb-0" id="time">20:00</p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <form action="{{ route('endExam',[$ujianId,$user_id]) }}" method="post">
            @csrf
            <div class="row" style="gap: 2rem">
                @foreach ($data as $da)
                <div class="col-md-5 border-ujian p-4">
                    <div class="soal">
                        <p class="fs-6 fw-bold">Pertanyaan {{ $da["no"] }}:</p>
                        <p>{{ $da["soal"] }}</p>
                    </div>
                    <div class="jawaban">
                        <div class="jawab">
                            <input type="radio" name="jawaban{{ $da['no'] }}" id="{{ $da["no"] }}a" value="a" class="ms-3">
                            <label for="{{ $da["no"] }}a">{{ $da["a"] }}</label>
                        </div>
                        <div class="jawab">
                            <input type="radio" name="jawaban{{ $da['no'] }}"  id="{{ $da["no"] }}b" value="b" class="ms-3">
                            <label for="{{ $da["no"] }}b">{{ $da["b"] }}</label>
                        </div>
                        <div class="jawab">
                            <input type="radio" name="jawaban{{ $da['no'] }}"  id="{{ $da["no"] }}c" value="c" class="ms-3">
                            <label for="{{ $da["no"] }}c">{{ $da["c"] }}</label>
                        </div>
                        <div class="jawab">
                            <input type="radio" name="jawaban{{ $da['no'] }}"  id="{{ $da["no"] }}d" value="d" class="ms-3">
                            <label for="{{ $da["no"] }}d">{{ $da["d"] }}</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    <button class="text-white btn tanggal bgDashboard" type="submit">Selesai</button>
                </div>
            </div>
        </form>
    </div>
{{--    <div class="position-fixed start-50 top-50 translate-middle w-50 popUp" id="message">--}}
{{--        <div style="align-items: center" class="passNsame messageNsame border d-none w-75">--}}
{{--            <p class="h4 text-center fw-bold pPass @if(session('status') === 'Success') text-success @else text-danger @endif">{{ session('title') }}</p>--}}
{{--            <p class="fs-6 text-center @if(session('status') === 'Success') text-success @else text-danger @endif">{{ session('message') }}</p>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

{{--<script>--}}
{{--    function hasClass(element, className) {--}}
{{--        return (' ' + element.className + ' ').indexOf(' ' + className+ ' ') > -1;--}}
{{--    }--}}
{{--    let time = document.getElementById("time"),--}}
{{--        // Waktu awal (20 menit dalam detik)--}}
{{--        reload = new Date().getTime() + 20 * 60 * 1000,--}}
{{--        durasi = 20 * 60; // Durasi dalam detik (20 menit)--}}

{{--    setInterval(() => {--}}
{{--        const sekarang = new Date().getTime();--}}
{{--        const totalSeconds = Math.max(0, Math.floor((reload - sekarang) / 1000));--}}
{{--        const mins = Math.floor(totalSeconds / 60) % 60;--}}
{{--        const seconds = totalSeconds % 60;--}}

{{--        // Format waktu dalam format 'mm:ss'--}}
{{--        const waktuFormatted = mins.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');--}}

{{--        time.innerHTML = waktuFormatted;--}}

{{--        if (totalSeconds <= 0) {--}}
{{--            // Waktu habis--}}
{{--            time.innerHTML = 'Waktu Habis';--}}
{{--        }--}}
{{--    }, 1000);--}}

{{--    let jawab = document.querySelectorAll(".jawab")--}}
{{--    jawab.forEach(a =>{--}}
{{--        let input = a.querySelector("input")--}}
{{--        input.onclick = () =>{--}}
{{--            if(!hasClass(a, "jawab-active") && input.checked){--}}
{{--                a.classList.add("jawab-active")--}}
{{--            }else{--}}
{{--                a.classList.remove("jawab-active")--}}
{{--            }--}}
{{--            jawab.forEach(a =>{--}}
{{--                let input = a.querySelector("input")--}}
{{--                if(!input.checked){--}}
{{--                    a.classList.remove("jawab-active")--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--    })--}}

{{--</script>--}}
<script>
    function hasClass(element, className) {
        return (' ' + element.className + ' ').indexOf(' ' + className+ ' ') > -1;
    }

    let time = document.getElementById("time");
    let sisaWaktu = {{ $waktu }}; // Sisa waktu dalam detik

    function updateWaktu() {
        const totalSeconds = Math.max(0, sisaWaktu);
        const mins = Math.floor(totalSeconds / 60) % 60;
        const seconds = totalSeconds % 60;

        // Format waktu dalam format 'mm:ss'
        const waktuFormatted = mins.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

        time.innerHTML = waktuFormatted;

        if (totalSeconds <= 0) {
            // Waktu habis
            time.innerHTML = 'Waktu Habis';
        }

        sisaWaktu--; // Kurangi sisa waktu setiap detik
    }

    // Fungsi untuk melakukan submit otomatis
    function submitForm() {
        document.querySelector("form").submit();
    }

    // Memanggil fungsi pertama kali saat halaman dimuat
    updateWaktu();

    // Memperbarui waktu setiap detik
    const intervalId = setInterval(updateWaktu, 1000);

    // Memeriksa apakah waktu telah habis dan jika iya, lakukan submit otomatis
    function checkTimeAndSubmit() {
        if (sisaWaktu <= 0) {
            clearInterval(intervalId); // Hentikan interval
            submitForm(); // Lakukan submit otomatis
        }
    }

    // Memanggil fungsi `checkTimeAndSubmit` setiap detik
    setInterval(checkTimeAndSubmit, 1000);

    let jawab = document.querySelectorAll(".jawab")
    jawab.forEach(a =>{
        let input = a.querySelector("input")
        input.onclick = () =>{
            if(!hasClass(a, "jawab-active") && input.checked){
                a.classList.add("jawab-active")
            }else{
                a.classList.remove("jawab-active")
            }
            jawab.forEach(a =>{
                let input = a.querySelector("input")
                if(!input.checked){
                    a.classList.remove("jawab-active")
                }
            })
        }
    })

</script>
@endsection
