<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\School;
use App\Models\Carousel;
use App\Models\Achivement;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Welcomesetion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allpages=About::where('status','1')->where('trash','1')->get();
        $carousel=Carousel::where('status','1')->get();
        $school=School::where('id',1)->first();
        $welcome=Welcomesetion::where('id',1)->first();
        $achive=Achivement::where('status','1')->where('trash','1')->get();
        $noti=Notification::where('status','1')->where('trash','0')->get();
        return view('welcome',compact('allpages','carousel','school','welcome','achive','noti'));
    }
}
