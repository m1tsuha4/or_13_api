<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Profile extends Model
{
    use HasFactory;
        /**
     * fillable
     *
     * @var array
     */

    public function user(){
        return $this->belongsTO(User::class);
    }
    protected $fillable = [
        'nama_lengkap',
        'user_id',
        'nim',
        'divisi',
        'sub_divisi',
        'fakultas',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'asal',
        'no_hp',
        'agama',
        'foto',
        'krs',
        'bukti_pembayaran',
        'status_aktif',
        'zona',
    ];
    protected function foto(): Attribute
    {
        return Attribute::make(
            get: fn ($foto) => asset('/storage/profiles/' . $foto),
        );
    }
    protected function krs(): Attribute
    {
        return Attribute::make(
            get: fn ($krs) => asset('/storage/krs/' . $krs),
        );
    }
    protected function buktiPembayaran(): Attribute
    {
        return Attribute::make(
            get: fn ($bukti_pembayaran) => asset('/storage/pembayaran/' . $bukti_pembayaran),
        );
    }
}
