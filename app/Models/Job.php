<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'salarymin',
        'salarymax',
        'image',
        'id_user'
    ];

    public function GetUser() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ApplyJob() {
        return $this->hasMany(ApplyJob::class, 'id_job', 'id');
    }
}
