<?php

namespace App\Http\Controllers;

use App\Models\JobInfo;

class JobInfoController extends Controller {
    public function index() {
        return view('pages.jobinfo');
    }
    public function show(JobInfo $jobinfo) {
        return view('pages.jobinfo', compact('jobinfo'));
    }
}
