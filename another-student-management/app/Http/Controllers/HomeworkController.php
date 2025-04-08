<?php

namespace App\Http\Controllers;
use App\Models\Homework;
use App\Models\HomeworkSubmission;
use Illuminate\Http\Request;
use Auth;

class HomeworkController extends Controller
{
    public function index() {
        $homeworks = Homework::with('teacher')->get();
        return view('homework.index', [
            'homeworks' => $homeworks,
            'user' => Auth::user()
        ]);
    }
    
    public function upload(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fileToUpload' => 'required|file|mimes:pdf,docx,zip,txt,jpg,png|max:5120'
        ]);
    
        $path = $request->file('fileToUpload')->storeAs(
            'homeworks',
            time() . '_' . $request->file('fileToUpload')->getClientOriginalName(),
            'public'
        );        Homework::create([
            'title' => $request->title,
            'description' => $request->description,
            'homework_file' => $path,
            'teacher_uuid' => Auth::user()->uuid,
        ]);
    
        return back()->with('success', 'Homework uploaded.');
    }
    
    public function submit(Request $request) {
        
        $request->validate([
            'homework_id' => 'required|exists:homework,id',
            'fileToUpload' => 'required|file|max:20480',
        ]);
    
        $path = $request->file('fileToUpload')->storeAs('submissions',time() . '_' . $request->file('fileToUpload')->getClientOriginalName(),'public');
    
        HomeworkSubmission::create([
            'homework_id' => $request->homework_id,
            'student_uuid' => Auth::user()->uuid,
            'submission_file' => $path,
        ]);
    
        return back()->with('success', 'Submission uploaded.');
    }
    
}
