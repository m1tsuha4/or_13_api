@extends("layouts.dashboard")

@section("content")

@php
    $title = "Programming";
    $data = array(
        array(
            "no" => 1,
            "soal" => "Berikut yang merupakan Bahasa pemograman adalah",
            "a" => "Javascript",
            "b" => "HTML",
            "c" => "CSS",
            "d" => "XML"
        ),
        array(
            "no" => 2,
            "soal" => "Landasan dasar yang perlu dipahami dalam mempelajari programming adalah",
            "a" => "Sintaks",
            "b" => "Jenis Bahasa",
            "c" => "Kemutakhiran Bahasa",
            "d" => "Algoritma"
        ),
        array(
            "no" => 3,
            "soal" => "Pada membuat aplikasi banyak hal-hal yang tidak terduga seperti error, sintaks error dan lainnya. Hal ini disebut dengan",
            "a" => "Bug",
            "b" => "404 not found",
            "c" => "Bluescreen",
            "d" => "Update"
        ),
        array(
            "no" => 4,
            "soal" => "Pada akhir -akhir ini pemograman merupakan hal yang hamper bisa dikatakan hal yang diwajibkan dan sedang trending serta dipelajari oleh anak-anak. Hal ini dikarenakan",
            "a" => "Pemograman mengasah cara berpikir",
            "b" => "Pemograman itu keren",
            "c" => "Mudah dipahami",
            "d" => "Dapat mengendalikan sesuatu"
        ),
        array(
            "no" => 5,
            "soal" => "Berikut yang merupakan hasil dari suatu pemograman adalah",
            "a" => "Poster",
            "b" => "Algoritma",
            "c" => "Flowchart",
            "d" => "Website"
        ),
        array(
            "no" => 6,
            "soal" => "Pada pembuatan program. Sering dilakukan pembaruan untuk mengatasi error dan perubahan kode. Hal ini dapat dilakukan dengan bantuan…",
            "a" => "Version Control",
            "b" => "IDE",
            "c" => "XAMPP",
            "d" => "Google"
        ),
        array(
            "no" => 7,
            "soal" => "Seorang programmer biasanya akan mengalami error dalam pengerjaan aplikasinya. Oleh karena itu programmer akan mencari solusi dari error yang terjadi. Error tersebut dapat dipecahkan dengan membaca website komunitas…",
            "a" => "Google.com",
            "b" => "Stackoverflow",
            "c" => "Reddit",
            "d" => "Tiktok"
        ),
        array(
            "no" => 8,
            "soal" => "Untuk membantu dalam proses pembuatan program. Seorang programmer biasanya menggunakan … untuk menulis koding.",
            "a" => "Google",
            "b" => "IDE",
            "c" => "XAMPP",
            "d" => "Web  Server"
        ),
        array(
            "no" => 9,
            "soal" => "Ketika Belajar Bahasa pemograman atau library baru. Hal yang perlu dipahami dan dibaca terlebih dahulu adalah",
            "a" => "Sejarah Bahasa",
            "b" => "Contoh aplikasi",
            "c" => "Dokumentasi",
            "d" => "Buku"
        ),
        array(
            "no" => 10,
            "soal" => "Dalam membuat aplikasi   sering kali kita akan menulis ratusan hingga ribuan baris kode. Oleh karena itu diperlukan sebuah pengingat atau deskripsi untuk baris baris tertentu pada program. Hal ini dapat kita lakukan dengan menambahkan",
            "a" => "Membuat Sintaks",
            "b" => "Membaca Dokumentasi",
            "c" => "Menggunakan Version Control",
            "d" => "Membuat Komentar"
        ),
        array(
            "no" => 11,
            "soal" => "Apa singkatan dari HTML?",
            'a' => 'Hypertext Markup Language',
            'b' => 'Hyper Text Transfer Protocol',
            'c' => 'High-level Text Language',
            'd' => 'Hypertext Text Language'
        ),
        array(
            "no" => 12,
            'soal' => 'Berikut yang merupakan sistem kontrol versi adalah:',
            'a' => 'Git',
            'b' => 'Github',
            'c' => 'Cli',
            'd' => 'Sudo',
        ),
        array(
            "no" => 13,
            'soal' => 'Aplikasi di bawah ini yang merupakan Integrated Development Environment (IDE) adalah:',
            'a' => 'Ms Word',
            'b' => 'Visual Studio Code',
            'c' => 'WPS',
            'd' => 'Wordpress',
        ),
        array(
            "no" => 14,
            'soal' => 'Apa yang dimaksud dengan sintaks dalam konteks pemrograman?',
            'a' => 'Suatu perintah dalam program',
            'b' => 'Penamaan program',
            'c' => 'Pembaruan program',
            'd' => 'Pengifisienan program',
        ),
        array(
            "no" => 15,
            'soal' => 'Berikut merupakan salah satu sintaks dari bahasa pemrograman adalah:',
            'a' => '<h1>',
            'b' => 'For',
            'c' => '#inisintaks',
            'd' => '$',
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
        <form action="" method="">
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
                            <input type="radio" name={{ $da["no"] }} id="{{ $da["no"] }}a" value="a" class="ms-3">
                            <label for="{{ $da["no"] }}a">{{ $da["a"] }}</label>
                        </div>
                        <div class="jawab">
                            <input type="radio" name={{ $da["no"] }} id="{{ $da["no"] }}b" value="b" class="ms-3">
                            <label for="{{ $da["no"] }}b">{{ $da["b"] }}</label>
                        </div>
                        <div class="jawab">
                            <input type="radio" name={{ $da["no"] }} id="{{ $da["no"] }}c" value="c" class="ms-3">
                            <label for="{{ $da["no"] }}c">{{ $da["c"] }}</label>
                        </div>
                        <div class="jawab">
                            <input type="radio" name={{ $da["no"] }} id="{{ $da["no"] }}d" value="d" class="ms-3">
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
</div>

<script>
    function hasClass(element, className) {
        return (' ' + element.className + ' ').indexOf(' ' + className+ ' ') > -1;
    }
    let time = document.getElementById("time"),
        // Waktu awal (20 menit dalam detik)
        reload = new Date().getTime() + 20 * 60 * 1000,
        durasi = 20 * 60; // Durasi dalam detik (20 menit)

    setInterval(() => {
        const sekarang = new Date().getTime();
        const totalSeconds = Math.max(0, Math.floor((reload - sekarang) / 1000));
        const mins = Math.floor(totalSeconds / 60) % 60;
        const seconds = totalSeconds % 60;

        // Format waktu dalam format 'mm:ss'
        const waktuFormatted = mins.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

        time.innerHTML = waktuFormatted;

        if (totalSeconds <= 0) {
            // Waktu habis
            time.innerHTML = 'Waktu Habis';
        }
    }, 1000);

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
