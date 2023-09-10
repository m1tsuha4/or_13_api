@extends("layouts.dashboard")

@section("content")

@php
    $title = "Sistem Komputer dan Jaringan";
    $data = array(
        array(
            "no" => 1,
            'soal' => 'Topologi LAN yang paling sedikit menggunakan kabel penghubung adalah:',
            'a' => 'Ring',
            'b' => 'Mesh',
            'c' => 'Bus',
            'd' => 'Star',
        ),
        array(
            "no" => 2,
            'soal' => 'Peer to peer merupakan jenis jaringan...',
            'a' => 'Jaringan PAN',
            'b' => 'Jaringan LAN',
            'c' => 'Jaringan WAN',
            'd' => 'Jaringan MAN',
        ),
        array(
            "no" => 3,
            'soal' => 'Apa kepanjangan dari salah satu divisi operasional Neo Telemetri yaitu SKj..',
            'a' => 'Sistem Komunikasi Jaringan',
            'b' => 'Sistem Komputasi Jaringan',
            'c' => 'Sistem Komputer Jaringan',
            'd' => 'Sistem Keamanan Jaringan',
        ),
        array(
            "no" => 4,
            'soal' => 'Protocol apa sajakah yang terdapat pada application layer pada OSI?',
            'a' => 'HTTP, FTP, SMTP, NTS',
            'b' => 'IP, ARP',
            'c' => 'ICMP, IGMP, Ethernet',
            'd' => 'ICMP, IGMP',
        ),
        array(
            "no" => 5,
            'soal' => 'Berapa nilai desimal dari biner 11001100...',
            'a' => '51',
            'b' => '204',
            'c' => '102',
            'd' => '408',
        ),
        array(
            "no" => 6,
            'soal' => 'Apa yang dimaksud dengan jaringan komputer?',
            'a' => 'Dua komputer atau lebih yang saling berhubungan satu sama lain, saling berkomunikasi secara elektronik',
            'b' => 'Kumpulan komputer dalam suatu ruangan',
            'c' => 'Kumpulan kabel dan komputer yang saling terhubung',
            'd' => 'Kumpulan hardisk',
        ),
        array(
            "no" => 7,
            'soal' => 'Apa singkatan dari WAN dalam konteks jaringan komputer?',
            'a' => 'Wide Area Network',
            'b' => 'Wireless Area Network',
            'c' => 'Local Area Network',
            'd' => 'Internet Area Network',
        ),
        array(
            "no" => 8,
            'soal' => 'Apa yang dimaksud dengan IP Address?',
            'a' => 'IP Address adalah gambaran / rangkain jaringan',
            'b' => 'IP Address adalah jaringan LAN nirkabel',
            'c' => 'IP Address adalah alamat / address global yang menggunakan protokol TCP/IP',
            'd' => 'IP Address adalah tujuan / pemberian data kepada client dari server',
        ),
        array(
            "no" => 9,
            'soal' => 'Apa kepanjangan dari WWW?',
            'a' => 'World Wide War',
            'b' => 'Wide World Web',
            'c' => 'World Wide Web',
            'd' => 'Word Wide War',
        ),
        array(
            "no" => 10,
            'soal' => 'Dibawah ini yang tidak termasuk dari sistem aplikasi adalah…',
            'a' => 'MS Office',
            'b' => 'Winamp',
            'c' => 'MS Excel',
            'd' => 'Windows XP',
        ),
        array(
            "no" => 11,
            'soal' => 'Dibawah ini yang tidak termasuk dalam sistem operasi adalah...',
            'a' => 'Adobe Premier',
            'b' => 'Red Hat',
            'c' => 'Windows 10',
            'd' => 'Mac OS',
        ),
        array(
            "no" => 12,
            'soal' => 'Peralatan di sistem komputer yang secara fisik terlihat dan dapat dijamah, seperti monitor, keyboard, mouse, dan lain-lain, disebut...',
            'a' => 'Software',
            'b' => 'Brainware',
            'c' => 'Hardware',
            'd' => 'Sistem',
        ),
        array(
            "no" => 13,
            'soal' => 'Program yang berisi perintah-perintah untuk melakukan pengolahan data adalah…',
            'a' => 'Hardware',
            'b' => 'Software',
            'c' => 'Input',
            'd' => 'Output',
        ),
        array(
            "no" => 14,
            'soal' => 'Didefinisikan dan dikategorikan sebagai ilmu dan sekaligus seni mengenai cara menghubungkan komponen-komponen perangkat keras untuk dapat menciptakan sebuah komputer yang memenuhi kebutuhan fungsional, kinerja, dan target biayanya. Salah satu dari….',
            'a' => 'Sistem Komputer',
            'b' => 'Komponen komputer',
            'c' => 'Arsitektur Komputer',
            'd' => 'Jaringan komputer',
        ),
        array(
            "no" => 15,
            'soal' => 'Jenis memori yang digunakan pada sistem yang menggunakan Pentium, disebut……',
            'a' => 'SRAM (Static RAM)',
            'b' => 'RDRAM (Rambus Dynamic RAM)',
            'c' => 'EDORAM (Extended Data Out RAM)',
            'd' => 'HDD (Hardisk)'
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
                            <input type="radio" name="jawaban{{ $da['no'] }}" id="{{ $da["no"] }}b" value="b" class="ms-3">
                            <label for="{{ $da["no"] }}b">{{ $da["b"] }}</label>
                        </div>
                        <div class="jawab">
                            <input type="radio" name="jawaban{{ $da['no'] }}" id="{{ $da["no"] }}c" value="c" class="ms-3">
                            <label for="{{ $da["no"] }}c">{{ $da["c"] }}</label>
                        </div>
                        <div class="jawab">
                            <input type="radio" name="jawaban{{ $da['no'] }}" id="{{ $da["no"] }}d" value="d" class="ms-3">
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
