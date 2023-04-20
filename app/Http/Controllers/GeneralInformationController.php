<?php

namespace App\Http\Controllers;

use App\Models\WebContent;
use Illuminate\View\View;

class GeneralInformationController extends Controller
{
    public function index(): View
    {
        return view('generalInformation.index', [
            'generalInformation' => WebContent::firstOrCreate(['key' => 'general_information'])
        ]);
    }

    public function edit(): View
    {
        return view('generalInformation.edit');
    }
}
