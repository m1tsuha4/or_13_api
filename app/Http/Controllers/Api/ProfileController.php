<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class ProfileController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        // $profiles = Profile::latest()->paginate(5);
        // return new ProfileResource(true, 'List Data Profile', $profiles);
    }

    public function store_profile(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required',
            'nim' => 'required',
            'divisi' => 'required',
            'sub_divisi' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'asal' => 'required',
            'no_hp' => 'required',
            'agama' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
            'riwayat_penyakit' => 'required',
            'laptop' => 'required',
            'processor' => 'required',
            'RAM' => 'required',
            'VGA' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $foto = $request->file('foto');
        $foto->storeAS('public/profiles', $foto->hashName());
        $profile = Profile::insert([
            'user_id' => $request->user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'nim' => $request->nim,
            'divisi' => $request->divisi,
            'sub_divisi' => $request->sub_divisi,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'asal' => $request->asal,
            'no_hp' => $request->no_hp,
            'agama' => $request->agama,
            'hobi' => $request->hobi,
            'cita_cita' => $request->cita_cita,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'laptop' => $request->laptop,
            'processor' => $request->processor,
            'RAM' => $request->RAM,
            'VGA' => $request->VGA,
            'foto' => $foto->hashName(),
        ]);
        if ($profile) {
            return response()->json([
                'succes' => true,
                'message' => 'Data Profile Berhasil Di Tambahkan!',
                'data' => $profile
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Profile Gagal Disimpan!',
                'data' => ''
            ], 401);
        }
    }
    public function update_profile(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required',
            'nim' => 'required',
            'divisi' => 'required',
            'sub_divisi' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'asal' => 'required',
            'no_hp' => 'required',
            'agama' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
            'riwayat_penyakit' => 'required',
            'laptop' => 'required',
            'processor' => 'required',
            'RAM' => 'required',
            'VGA' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $foto = $request->file('foto');
        $foto->storeAS('public/profiles', $foto->hashName());
        $profile = Profile::where('user_id', $request->user()->id)->first();
        $profile->update([
            'user_id' => $request->user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'nim' => $request->nim,
            'divisi' => $request->divisi,
            'sub_divisi' => $request->sub_divisi,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'asal' => $request->asal,
            'no_hp' => $request->no_hp,
            'agama' => $request->agama,
            'hobi' => $request->hobi,
            'cita_cita' => $request->cita_cita,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'laptop' => $request->laptop,
            'processor' => $request->processor,
            'RAM' => $request->RAM,
            'VGA' => $request->VGA,
            'foto' => $foto->hashName(),
        ]);
        if ($profile) {
            return response()->json([
                'succes' => true,
                'message' => 'Data Profile Berhasil Di Update!',
                'data' => $profile
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Profile Gagal Disimpan!',
                'data' => ''
            ], 401);
        }
    }

    public function store_file(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'krs' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $krs = $request->file('krs');
        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $krs->storeAS('public/profiles', $krs->hashName());
        $bukti_pembayaran->storeAS('public/profiles', $bukti_pembayaran->hashName());

        //create profile
        $profile = Profile::where('user_id', $request->user()->id)->first();
        $profile->update([
            // 'user_id' => $request->user()->id,
            'krs' => $krs->hashName(),
            'bukti_pembayaran' => $bukti_pembayaran->hashName(),
        ]);
        return new ProfileResource(true, 'Data Profile Berhasil Ditambahkan!', $profile);
    }

    public function show(Request $request)
    {
        // $profile = $request->user()->id;
        $profile = Profile::where('user_id', $request->user()->id)->first();
        if ($profile) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Profile!',
                'data'    => $profile
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Profile Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function show_file($filename)
    {
        $path = storage_path('app/public/profiles/' . $filename);

        if (!file_exists($path)) {
            return response()->json(['message' => 'File not found.'], 404);
        }

        $file = file_get_contents($path);

        return response($file, 200)->header('Content-Type', mime_content_type($path));
        $file = Storage::get($path);
    }
}
