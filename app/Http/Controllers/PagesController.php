<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index($title='Home page')
    {
    
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title',$title);

    }
    public function about()
    {
        $about="About page";
        return view('pages.about',compact('about'));
    }
    public function services()
    {
        $data = array(
            'title' =>'services',
            "services" => ['web design', 'programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
