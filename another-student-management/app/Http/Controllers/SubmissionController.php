<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeWorkSubmission;
use Auth;
class SubmissionController extends Controller
{
    //
    public function index()
    {

        // Check if user is a teacher
    if (!Auth::check() || (!Auth::user()->is_teacher && !session('is_teacher'))) {
        return response()->view('error', [
            'message' => 'Only teachers can access the submissions page.'
        ], 403);
    }

        // Get all submissions with homework and student info
        $submissions = HomeworkSubmission::with(['student', 'homework'])->get();
        return view('homework.submission', compact('submissions'));
    }
}
