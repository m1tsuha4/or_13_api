
@extends("layouts.dashboard")

@section("content")
    <div class="row rowHasilUjian">
        <p class="jUjianOnline">Hasil Ujian</p>
        <div class="d-flex flex-wrap">
            <div class="hasilUjian">
                <i class='bx bx-check benar'></i>
                <p class="pHasil">Jawaban Benar</p>
                <p class="aHasil mb-0">{{ $benar }}</p>
            </div>
            <div class="hasilUjian">
                <i class='bx bx-x salah mt-0'></i>
                <p class="pHasil">Jawaban Salah</p>
                <p class="aHasil mb-0">{{ $salah }}</p>
            </div>
            <div class="hasilUjian">
                <p class="pHasil">Nilai :</p>
                <p class="aHasil mb-0">{{ $score }}</p>
            </div>
        </div>
    </div>
@endsection
