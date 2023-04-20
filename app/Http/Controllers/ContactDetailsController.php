<?php

namespace App\Http\Controllers;

use App\Models\ContactDetails;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactDetailsController extends Controller
{
    public function index(): View
    {
        return view('contactDetails.index', [
            'contactDetails' => ContactDetails::all(),
        ]);
    }

    public function edit(): View
    {
        return view('contactDetails.edit');
    }
}
