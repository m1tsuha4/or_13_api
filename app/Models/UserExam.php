<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'userexam_nim',
        'divisi_id',
        'jawaban',
        'score',
        'benar',
        'salah',
        'score',
        'start',
        'status',
        'selesai',
    ];

    public function examDetail(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this
            ->hasOne(
                Exam::class,
                'divisi_id',
                'divisi_id'
            );
    }

    public function exams(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this
            ->belongsTo(
                Profile::class,
                'nim',
                'userexam_nim'
            );
    }

    public function userExams(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this
            ->belongsTo(
                Exam::class,
                'divisi_id',
                'divisi_id'
            );
    }
}
