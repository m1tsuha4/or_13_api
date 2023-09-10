<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'divisi',
        'divisi_id',
        'jumlah_soal',
        'time',
        'key',
        'start',
        'end',
    ];


    public function divisiExam(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this
            ->hasOne(
                UserExam::class,
                'divisi_id',
                'divisi_id'
            );
    }

    public function examDetail(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this
            ->belongsTo(
                UserExam::class,
                'divisi_id',
                'divisi_id'
            );
    }
}
