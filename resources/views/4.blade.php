@extends("layouts.dashboard")

@section("content")

@php
    $title = "Organisasi";
    $data = array(
        array(
            "no" => 1,
            'soal' => 'Sebagai ketua pelaksana kegiatan, apa yang harus dilakukan terkait pembuatan laporan pertanggungjawaban?',
            'a' => 'Saya menugaskan pembuatan laporan kepada anggota',
            'b' => 'Saya bersama anggota menyusun laporan',
            'c' => 'Saya sendiri yang menyusun laporan sebab tak ingin ada kesalahan yang dibuat oleh anggota',
            'd' => 'Membentuk tim khusus harus untuk membuat laporan tersebut',
        ),
        array(
            "no" => 2,
            'soal' => 'Organisasi saya saat ini mengalami masalah internal, apa sikap yang harus diambil?',
            'a' => 'Bagaimanapun juga publik berhak tahu, oleh karenanya saya beberkan masalah internal tersebut kepada publik',
            'b' => 'Saya berusaha memberikan gagasan pemecahan masalah kepada pimpinan, sambil menjaga kerahasiaan masalah internal ini',
            'c' => 'Saya mempercayakan pimpinan yang mengambil keputusan',
            'd' => 'Saya berusaha menjaga keamanan posisi saya agar tidak terusik dan tidak terkena imbasnya',
        ),
        array(
            "no" => 3,
            'soal' => 'Apa sikap saya terhadap perubahan, ide baru, dan cara baru dalam melaksanakan suatu pekerjaan?',
            'a' => 'Stabilitas dalam bekerja lebih penting',
            'b' => 'Perubahan bukan jaminan keberhasilan pekerjaan',
            'c' => 'Dengan adanya perubahan, kondisi kerja pasti lebih baik',
            'd' => 'Keberhasilan pekerjaan tergantung jenis perubahan, ide, dan cara-cara baru tersebut'
        ),
        array(
            "no" => 4,
            'soal' => 'Setiap hari saya hadir paling cepat dibandingkan rekan lainnya. Hal yang saya lakukan sebaiknya adalah?',
            'a' => 'Masuk ke ruangan dan membaca koran',
            'b' => 'Santai di luar gedung kantor untuk menikmati udara pagi',
            'c' => 'Masuk ke ruangan dan membuat rencana kerja',
            'd' => 'Masuk ke ruangan dan memulai pekerjaan yang tertunda kemarin',
        ),
        array(
            "no" => 5,
            'soal' => 'Ketika mendapat kepercayaan mengerjakan tugas tertentu, tanggapan saya adalah...',
            'a' => 'Mengumpulkan ide rekan kerja sebagai bahan pertimbangan dalam pengambilan keputusan',
            'b' => 'Tidak mau mengambil keputusan sendiri',
            'c' => 'Mengambil keputusan karena itu adalah wewenang saya',
            'd' => 'Menunggu keputusan dari atasan sebagai pertimbangan',
        ),
        array(
            "no" => 6,
            'soal' => 'Ketua organisasi menetapkan target tugas selesai pada akhir bulan ini, saya akan..',
            'a' => 'Saya akan selesaikan tepat waktu',
            'b' => 'Jika ada tugas lain, saya akan meminta tambahan waktu',
            'c' => 'Saya menyelesaikan tugas sebelum akhir bulan',
            'd' => 'Saya akan meminta teman saya membantu menyelesaikan',
        ),
        array(
            "no" => 7,
            'soal' => 'Tim kami akhirnya memenangi kompetisi tahun ini, agar dapat mempertahankan prestasi ini kami akan..',
            'a' => 'Mempelajari teknik-teknik baru untuk persiapan kompetisi tahun depan',
            'b' => 'Berlatih secara rutin dan terprogram',
            'c' => 'Menambah latihan untuk meningkatkan skill',
            'd' => 'Mempelajari kelemahan tim lawan untuk dapat mengalahkan mereka',
        ),
        array(
            "no" => 8,
            'soal' => 'Pada saat menghadapi tugas yang berat dan menuntut kemampuan tinggi, saya akan…',
            'a' => 'Berusaha mencari penyelesaian yang tidak membutuhkan waktu panjang',
            'b' => 'Berusaha sedikit demi sedikit menyelesaikan tugas walau memakan waktu panjang',
            'c' => 'Meminta bantuan teman untuk menyelesaikan tugas tersebut agar dapat selesai tepat waktu',
            'd' => 'Meminta rekan saya yang lebih pandai untuk menggantikan saya',
        ),
        array(
            "no" => 9,
            'soal' => 'Bagaimana Anda membagi tugas kepada rekan dan bawahan Anda?',
            'a' => 'Saya membaginya sesuai dengan kepribadian dan sifat',
            'b' => 'Saya membaginya sesuai dengan minat dan keinginan',
            'c' => 'Saya membaginya sesuai dengan keahlian dan keterampilan',
            'd' => 'Saya membaginya sesuai dengan minat dan kemampuan',
        ),
        array(
            "no" => 10,
            'soal' => 'Seberapa seringkah Anda berusaha dengan aktif untuk mencegah gangguan (tamu, rapat, telepon) yang biasanya selalu mengacaukan hari kerja Anda?',
            'a' => 'Saya tidak merasa terganggu dengan itu',
            'b' => 'Saya selalu menyortir seberapa penting hal tersebut terlebih dahulu',
            'c' => 'Saya selalu menolak dan menjauhi hal tersebut agar pekerjaan selesai dengan baik',
            'd' => 'Tergantung situasi apakah dipenuhi atau tidak'
        ),
        array(
            "no" => 11,
            'soal' => 'Bagaimana Anda merespon target pencapaian rekan tim Anda?',
            'a' => 'Saya mudah melakukan apresiasi positif terhadap rekan tim',
            'b' => 'Saya akan memberikan apresiasi positif kepada rekan kerja yang memang progressnya luar biasa',
            'c' => 'Saya akan memberikan apresiasi sekedarnya, jika baik saya katakan baik dan jika tidak saya katakan tidak',
            'd' => 'Saya jarang memberikan apresiasi kepada rekan tim kecuali memang luar biasa',
        ),
        array(
            "no" => 12,
            'soal' => 'Bagaimana pendapat Anda tentang pencapaian target tim Anda dan individu?',
            'a' => 'Target individu tercapai, maka target tim akan tercapai',
            'b' => 'Target tim utama, meskipun target individu tidak tercapai',
            'c' => 'Sebisa mungkin kedua target tercapai meskipun tidak bisa mencapai 100%',
            'd' => 'Mencapai target tim dulu lalu menyelesaikan target individu',
        ),
        array(
            "no" => 13,
            'soal' => 'Apa yang Anda lakukan dalam sebuah diskusi dengan sekelompok kecil teman-teman Anda?',
            'a' => 'Saya selalu aktif berpendapat dan mengarahkan teman-teman untuk aktif juga',
            'b' => 'Jika perlu bicara maka saya ungkapkan, jika tidak maka saya cukup mendengar',
            'c' => 'Saya menjadi pengamat sejenak kemudian aktif berpendapat',
            'd' => 'Saya lebih banyak diam dan berbicara sekedarnya',
        ),
        array(
            "no" => 14,
            'soal' => 'Jika dalam suatu rapat, rekan Anda memiliki pendapat yang berbeda, padahal Anda yang menjadi pemimpin rapat, maka:',
            'a' => 'Saya teguh mempertahankan pendapat saya',
            'b' => 'Beda pendapat bukanlah masalah serius',
            'c' => 'Saya pertimbangkan pendapat tersebut',
            'd' => 'Melihat dulu siapa dia'
        ),
        array(
            "no" => 15,
            'soal' => 'Di lingkungan organisasi yang baru...',
            'a' => 'Saya perlu waktu untuk mengenal rekan-rekan baru',
            'b' => 'Saya menunggu rekan yang ingin berkenalan',
            'c' => 'Saya langsung mampu akrab dengan rekan',
            'd' => 'Jika saya membutuhkan bantuan baru saya akan berkenalan'
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
