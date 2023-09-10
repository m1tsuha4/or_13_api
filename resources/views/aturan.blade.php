@extends("layouts.dashboard")

@section("content")
<div class="col px-md-5 py-3 min-vh-100 content">
    <div class="row my-md-3 align-items-center">
        <div class="col-6">
            <p class="fs-4 fw-bold mb-md-0">Peraturan Ujian</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col mt-3">
            <ol start="1">
                <li class="fs-6">Berdoalah sebelum mengerjakan ujian!</li>
                <li class="fs-6">Pastikan kondisi jaringan internet kamu dalam kondisi baik sebelum memulai ujian.</li>
                <li class="fs-6">Peserta hanya diizinkan 1 kali akses untuk masing-masing tipe soal.</li>
                <li class="fs-6">Peserta diberikan waktu pengerjaan 20 menit untuk masing-masing tipe soal.</li>
                <li class="fs-6">Jumlah soal sebanyak 15 butir untuk masing-masing tipe soal.</li>
                <li class="fs-6">Jika menemukan kendala silahkan hubungi CP Open Recruitment 13 UKM Neo Telemetri.</li>
                <li class="fs-6">Selamat mengerjakan ujian, semoga berhasil!</li>
            </ol>
        </div>
        <div class="col-12 mt-5">
            <form method="post" id="startExam" action="{{ route('startExam',['ujianId' => $ujianId, 'user_id' => $user_id]) }}">
                @csrf
                <button class="d-flex align-items-center justify-content-center text-decoration-none btn-ujian text-white" type="submit">Mulai Ujian</button>
{{--                <a href="" class="d-flex align-items-center justify-content-center text-decoration-none btn-ujian text-white">Mulai Ujian</a>--}}
            </form>
        </div>
    </div>
</div>
@endsection
