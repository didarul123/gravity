<?php

namespace App\Http\Controllers\Modules\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function contactUs()
    {
    	return view('modules.content.contact_us');
    }

    public function termsConditions()
    {
    	return view('modules.content.terms_conditions');
    }

    public function privacyPolicy()
    {
    	return view('modules.content.privacy_policy');
    }
}
