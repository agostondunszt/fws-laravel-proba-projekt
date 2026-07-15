<?php

namespace App\Http\Controllers;

use App\Models\HeroContent;
use App\Models\Reference;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HeroContent::first();

        $references = Reference::orderBy('project_date', 'desc')->limit(4)->get();

        return view('welcome', compact('hero', 'references'));
    }
}
