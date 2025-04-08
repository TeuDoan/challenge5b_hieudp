<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    //
    protected $table = 'homework';
    protected $fillable = ['title', 'description', 'homework_file', 'teacher_uuid'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_uuid', 'uuid');
    }

    public function submissions()
    {
        return $this->hasMany(HomeworkSubmission::class);
    }
}
