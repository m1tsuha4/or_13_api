@extends("layouts.dashboard")
@section("content")

    <div class="col px-md-5 py-3 min-vh-100 content">
        <div class="row my-md-3 align-items-center">
            <div class="col-6">
                <p class="fs-4 fw-bold mb-md-0 color-or">Ujian Online</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <p class="fs-4 fw-bold mb-md-0 color-or mt-5">Hasil Akhir Ujian</p>
            </div>
        </div>
        <div class="row" style="gap: 1rem">
            <div class="col-md-3 border rounded-4 d-flex flex-column justify-content-center align-items-center py-4">
                <i class="fs-1 bi bi-check-circle-fill" style="color: #301D54;"></i>
                <p class="fs-6 fw-bold mb-0">Jawaban Benar</p>
                <p class="fs-4 fw-bold">{{ $benar }}</p>
            </div>
            <div class="col-md-3 border rounded-4 d-flex flex-column justify-content-center align-items-center py-4">
                <i class="fs-1 bi bi-x-circle-fill" style="color: #B966A3"></i>
                <p class="fs-6 fw-bold mb-0">Jawaban Salah</p>
                <p class="fs-4 fw-bold">{{ $salah }}</p>
            </div>
            <div class="col-md-3 border rounded-4 d-flex flex-column justify-content-center align-items-center py-4">
                <p class="fs-6 fw-bold mb-0">Nilai</p>
                <p class="fs-4 fw-bold">{{ $score }}</p>
            </div>
        </div>
    </div>

@endsection
