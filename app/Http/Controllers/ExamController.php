<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Profile;
use App\Models\UserExam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;
use Tymon\JWTAuth\Facades\JWTAuth;
use Cookie;

class ExamController extends Controller
{
    public function updateExam(Request $request){

//        return view('ujianOnline')
//            ->with([
//                'user' => $user,
//            ]);
    }

    public function view(Request $request){
        $user = $request->user();
        return view('ujianOnline')
            ->with([
                'user' => $user,
            ]);
    }

    public function ruleView(Request $request, $ujianId,$user_id){
        $profile = Profile::where('user_id', $user_id)->first();
        $exam = UserExam::firstOrCreate([
            'userexam_nim' => $profile->nim,
            'divisi_id' => $ujianId
        ]);
        if ($exam->selesai){
            return redirect()
                ->route('resultExam',[$ujianId,$user_id]);
        }
        return view('aturan')
            ->with([
//                'user' => $pr,
                'ujianId' => $ujianId,
                'user_id' => $user_id
            ]);
    }

    function sisaDateTime($start, $end = null){
        if (!$end){
            $end = now();
        }
        $sisa = 0;
        $sisa += (
            (int)Carbon::parse($start)->format('Y') -
            (int)Carbon::parse($end)->format('Y')
            ) * (60 * 60 * 60 * 60 * 60);
        $sisa += (
            (int)Carbon::parse($start)->format('n') -
            (int)Carbon::parse($end)->format('n')
            ) * (60 * 60 * 60 * 60);
        $sisa += (
            (int)Carbon::parse($start)->format('d') -
            (int)Carbon::parse($end)->format('d')
            ) * (60 * 60 * 60);
        $sisa += (
            (int)Carbon::parse($start)->format('h') -
            (int)Carbon::parse($end)->format('h')
            ) * (60 * 60);
        $sisa += (
            (int)Carbon::parse($start)->format('i') -
            (int)Carbon::parse($end)->format('i')
            ) * 60 ;
        $sisa += (int)Carbon::parse($start)->format('s') - (int)Carbon::parse($end)->format('s');
        return $sisa;
    }

    public function startExam(Request $request, $ujianId,$user_id): \Illuminate\Http\RedirectResponse
    {

        $profile = Profile::where('user_id', $user_id)->first();
        $nim = $profile->nim;
//        dd($profile);
//        if($profile->nim != 2010912041 ){
//            return redirect()
//                ->route('ruleView',['ujianId' => $ujianId, 'user_id' => $user_id])
//                ->with([
//                    'status' => 'Failed',
//                    'title' => 'Ujian Online Sudah Ditutup',
//                    'message' => '',
//                     'ujianId' => $ujianId,
//                    'user_id' => $user_id
//                ]);
//        }
        $userExam = UserExam::where('divisi_id', $ujianId)
                    ->where('userexam_nim', $nim)
                    ->first();

        $exam = Exam::where('divisi_id',$ujianId)->first();

        $sisa = $this->sisaDateTime($exam->end, now());
        if ($sisa<1){
            return redirect()
                ->route('ruleView',['ujianId' => $ujianId, 'user_id' => $user_id])
                ->with([
                    'status' => 'Failed',
                    'title' => 'Ujian Online Sudah Ditutup',
                    'message' => '',
                    'ujianId' => $ujianId,
                    'user_id' => $user_id
                ]);
        }

        if ($userExam->selesai){
            abort(403);
        }

        if (!$profile->xt5){
            $profile->xt5 = $ujianId;
            $profile->save();

            $userExam->selesai = 0;
            for ($i=0;$i<15;$i++){
                $jawaban[$i] = 0;
            }
            $userExam->jawaban = json_encode($jawaban);
            $userExam->start = now();
            $userExam->save();

        }else{
            return redirect()
                ->route('onExam',['ujianId' => $ujianId, 'user_id' => $user_id]);
        }
        return redirect()
            ->route('onExam',['ujianId' => $ujianId, 'user_id' => $user_id])
            ->with([
                'status' => 'Success',
                'title' => 'Ujian Dimulai',
                'message' => 'Selamat Mengerjakan Ujian'
            ]);
    }



    public function onExam(Request $request, $ujianId,$user_id){
        $profile = Profile::where('user_id', $user_id)->first();
        $nim = $profile->nim;
        $userExam = UserExam::where('divisi_id', $ujianId)
            ->where('userexam_nim', $nim)
            ->firstOrFail();
        $exam = Exam::where('divisi_id',$ujianId)->first();
        if ($userExam->selesai){
            return redirect()
                ->route('resultExam',['ujianId' => $ujianId, 'user_id' => $user_id])
                ->with([
                    'status' => 'Success',
                    'title' => 'Ujian Selesai',
                    'message' => ''
                ]);
        }
        if ($profile->xt5) {
            if ($profile->xt5 != $ujianId){
                return redirect()
                    ->route(
                        'onExam',
                        [$profile->xt5,$user_id]
                    );
            }
        } else {
            return redirect()
                ->route(
                    'ruleView',
                    [$profile->xt5,$user_id]
                )
                ->with([
                    'status' => 'Failed',
                    'title' => 'Ujian Belum Dimulai',
                    'message' => ''
                ]);
        }
        $waktu = (20*60) - $this->sisaDateTime(now(), $userExam->start);

        if ($waktu<1){
            return redirect()
                ->route('endExam',['ujianId' => $ujianId, 'user_id' => $user_id]);
        }
        return view($ujianId)
            ->with([
//                'user' => $user,
                'ujianId' => $ujianId,
                'waktu' => $waktu,
                'user_id' => $user_id
            ]);
    }

    public function save(Request $request, $ujianId,$user_id): \Illuminate\Http\RedirectResponse
    {
//        $user = $request->user();
//        $exam = $user->exams()
//            ->where('divisi_id', $ujianId)
//            ->firstOrFail();
        $profile = Profile::where('user_id', $user_id)->first();
        $nim = $profile->nim;
        $userExam = UserExam::where('divisi_id', $ujianId)
            ->where('userexam_nim', $nim)
            ->firstOrFail();
        $exam = Exam::where('divisi_id',$ujianId)->first();
        if ($userExam->selesai){
            return redirect()
                ->route('resultExam',['ujianId' => $ujianId, 'user_id' => $user_id])
                ->with([
                    'status' => 'Success',
                    'title' => 'Ujian Selesai',
                    'message' => ''
                ]);
        }
        if ($profile->xt5) {
            if ($profile->xt5 != $ujianId){
                return redirect()
                    ->route(
                        'onExam',
                        [$profile->xt5,$user_id]
                    );
            }
        } else {
            return redirect()
                ->route(
                    'ruleView',
                    [$profile->xt5,$user_id]
                )
                ->with([
                    'status' => 'Failed',
                    'title' => 'Ujian Belum Dimulai',
                    'message' => ''
                ]);
        }
        $jawaban = json_decode($userExam->jawaban, true);
        for ($i=0;$i<15;$i++){
            $jawaban[$i] = $request->get('jawaban' . ($i + 1)) ?? '0';
        }
        $userExam->jawaban = json_encode($jawaban);
        dd($userExam->jawaban);
        $userExam->save();
        $waktu = (20*60) - $this->sisaDateTime(now(), $userExam->start);
        if ($waktu<1){
            return redirect()
                ->route('endExam',[$ujianId,$user_id]);
        }
        return redirect()
            ->route('onExam',[$ujianId,$user_id])
            ->with([
                'status' => 'Success',
                'title' => 'Success',
                'message' => 'Ujian Disimpan'
            ]);
    }

    public function end(Request $request, $ujianId,$user_id): \Illuminate\Http\RedirectResponse
    {
//        $user = $request->user();
//        $exam = $user->exams()
//            ->where('divisi_id', $ujianId)
//            ->firstOrFail();
        $profile = Profile::where('user_id', $user_id)->first();
        $nim = $profile->nim;
        $userExam = UserExam::where('divisi_id', $ujianId)
            ->where('userexam_nim', $nim)
            ->firstOrFail();
        $exam = Exam::where('divisi_id',$ujianId)->first();
        if ($userExam->selesai){
            return redirect()
                ->route('resultExam',[$ujianId,$user_id])
                ->with([
                    'status' => 'Success',
                    'title' => 'Ujian Selesai',
                    'message' => ''
                ]);
        }
        if ($profile->xt5) {
            if ($profile->xt5 != $ujianId){
                return redirect()
                    ->route(
                        'onExam',
                        [$profile->xt5,$user_id]
                    );
            }
        } else {
            return redirect()
                ->route(
                    'ruleView',
                    [$profile->xt5,$user_id]
                )
                ->with([
                    'status' => 'Failed',
                    'title' => 'Ujian Belum Dimulai',
                    'message' => ''
                ]);
        }
        $waktu = (20*60) - $this->sisaDateTime(now(), $userExam->start);
        if ($waktu < -60){
            $profile->xt5=0;
            $userExam->selesai = true;
            $userExam->save();
            $profile->save();
            return redirect()
                ->route('resultExam',[$ujianId,$user_id])
                ->with([
                    'status' => 'Success',
                    'title' => 'Ujian Selesai',
                    'message' => 'Sesi Expired'
                ]);
        }
        $jawaban = json_decode($userExam->jawaban. true);
        for ($i=0;$i<15;$i++){
            $jawaban[$i] = $request->get('jawaban' . ($i + 1)) ?? '0';
        }
        $userExam->jawaban = json_encode($jawaban);
        $userExam->save();
        $profile->xt5=0;
        $userExam->selesai = true;
        $userExam->save();
        $profile->save();
        return redirect()
            ->route('resultExam',[$ujianId,$user_id])
            ->with([
                'status' => 'Success',
                'title' => 'Ujian Selesai',
                'message' => 'Ujian selesai dan Jawaban sudah disimpan'
            ]);
    }

    public function result(Request $request, $ujianId,$user_id){
//        $user = $request->user();
//        $exam = $user->exams()
//            ->where('divisi_id', $ujianId)
//            ->firstOrFail();
        $profile = Profile::where('user_id', $user_id)->first();
        $nim = $profile->nim;
        $userExam = UserExam::where('divisi_id', $ujianId)
            ->where('userexam_nim', $nim)
            ->firstOrFail();
        $exam = Exam::where('divisi_id',$ujianId)->first();
        if (!$userExam->selesai){
            return redirect()
                ->route('ruleView',[$ujianId,$user_id])
                ->with([
                    'status' => 'Success',
                    'title' => 'Ujian Belum Dimulai',
                    'message' => ''
                ]);
        }
        if(!$userExam->score){
            $key = json_decode($exam->key, true);
            $jawaban = json_decode($userExam->jawaban, true);
            $score = 0.0;
            $benar = 0;
            $salah = 0;
            for ($i=0;$i<15;$i++){
                if($jawaban[$i] == $key[$i]){
                    $benar +=1;
                    $score += 6.6;
                }else{
                    $salah +=1;
                }
            }
            $userExam->score = $score;
            $userExam->benar = $benar;
            $userExam->salah = $salah;
            $userExam->save();
        }
        $score = $userExam->score;
        $benar = $userExam->benar;
        $salah = $userExam->salah;
        return view('hasilUjian')
            ->with([
//                'user' => $user,
                'benar' => $userExam->benar,
                'salah' => $userExam->salah,
                'score' => $userExam->score
            ]);
    }
}
