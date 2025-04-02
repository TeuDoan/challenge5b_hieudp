<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $teachers = User::where('is_teacher', 1)->get();
        $students = User::where('is_teacher', 0)->get();
        return view("dashboard.index", ["teachers" => $teachers, "students" => $students]);
    }

    public function show($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        return view("profile.show", ["user" => $user]);
    }

    public function store()
    {

    }

}
