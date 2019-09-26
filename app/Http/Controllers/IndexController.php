<?php

namespace App\Http\Controllers;

use App\Home;
use App\News;
use App\Testmony;
use Illuminate\Http\Request;
use Mapper;

class IndexController extends Controller
{
    public function index()
    {
        Mapper::map(-4.053380, 39.666426);
        $home = Home::all();
        $home1 = Home::all();
        $home2 = Home::all();
        $home3 = Home::all();
        $home4 = Home::all();
        $home5 = Home::all();
        $testimony = Testmony::orderBy('created_at', 'DESC')->get();
        $news = News::where('type', 'News')->orderBy('created_at','desc')->get();
        $updates = News::where('type', 'Updates')->orderBy('created_at','desc')->get();
        return view('index')->with(['home'=>$home,'home1'=>$home1,'home2'=>$home2,'home3'=>$home3,
            'home4'=>$home4,'home5'=>$home5, 'testimony' => $testimony, 'news' => $news, 'updates' => $updates]);
    }
}
