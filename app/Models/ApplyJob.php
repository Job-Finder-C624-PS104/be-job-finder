<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;

    protected $table = 'apply_jobs';
    protected $fillable = [
        'id_user',
        'id_job',
        'status'
    ];

    public function getJob() {
        return $this->belongsTo(Job::class, 'id_job', 'id');
    }

    public function getUser() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
