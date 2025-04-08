<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeworkSubmission extends Model
{
    //
    protected $fillable = ['student_uuid', 'homework_id', 'submission_file'];

    // Submission.php
    public function student()
    {
        return $this->belongsTo(User::class, 'student_uuid', 'uuid');
    }

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

}
