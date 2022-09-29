<?php

namespace App\Http\Controllers\Admin;

use App\Models\Board;
use App\Models\Branch;
use App\Models\Medium;
use App\Models\School;
use App\Models\Standard;
use App\Models\Branchtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageschoolController extends Controller
{
    public function index()
    {
        $school=School::where('id',1)->first();
        $board=Board::where('status',1)->get();
        $medium=Medium::all();
        $branchtype=Branchtype::where('status',1)->get();
        $branch=Branch::where('status',1)->where('trash','1')->get();
        $standard=Standard::where('status',1)->where('trash',1)->get();
        return view('admin.school.index',compact('school','board','medium','branchtype','branch','standard'));
    }
}
