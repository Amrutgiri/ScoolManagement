<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\School;
use App\Models\Carousel;
use App\Models\Achivement;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Welcomesetion;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $allpages=About::where('status','1')->where('trash','1')->get();
        $carousel=Carousel::where('status','1')->get();
        $school=School::where('id',1)->first();
        $welcome=Welcomesetion::where('id',1)->first();
        $achive=Achivement::where('status','1')->where('trash','1')->get();
        $noti=Notification::where('status','1')->where('trash','1')->get();
        return view('welcome',compact('allpages','carousel','school','welcome','achive','noti'));
    }
    public function oneview($id)
    {
        $school=School::where('id',1)->first();
        $allpages=About::where('status','1')->where('trash','1')->get();
        $noti=Notification::where('status','1')->where('trash','1')->get();
        $oneview=About::findOrFail($id);
        return view('frontend.pages.oneview',compact('allpages','oneview','school','noti'));
    }
    public function achive($id)
    {
        $school=School::where('id',1)->first();
        $allpages=About::where('status','1')->where('trash','1')->get();
        $noti=Notification::where('status','1')->where('trash','0')->get();
        $achive=Achivement::findOrFail($id);
        return view('frontend.pages.achive',compact('achive','allpages','school','noti'));
    }

}
