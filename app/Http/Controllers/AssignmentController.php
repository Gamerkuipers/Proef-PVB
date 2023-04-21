<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssignmentController extends Controller
{
    public function index(): View
    {
        return view('assignment.index', [
            'assignments' => Assignment::orderByDesc('created_at')->paginate()
        ]);
    }

    public function show(Assignment $assignment): View
    {
        return view('assignment.show',[
            'assignment' => $assignment
        ]);
    }
}
