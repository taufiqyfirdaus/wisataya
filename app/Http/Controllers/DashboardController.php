<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\Content;
use App\Models\Penginapan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function dashboard(){
        $users = User::all();
        $content = Content::count();
        $publish = Content::where('status_publish',1)->count() + Budaya::where('status_publish',1)->count() + Penginapan::where('status_publish',1)->count();
        $notPublish = Content::where('status_publish',0)->count() + Budaya::where('status_publish',0)->count() + Penginapan::where('status_publish',0)->count();

        $contentBudaya = Budaya::count();
        $penginapan = Penginapan::count();

        $getCountContent = new Content;
        $getCountContentPublish = new Content;
        $getCountContentNotPublish = new Content;

        $getCountBudaya = new Budaya;
        $getCountBudayaPublish = new Budaya;
        $getCountBudayaNotPublish = new Budaya;

        $getCountPenginapan = new Penginapan;
        $getCountPenginapanPublish = new Penginapan;
        $getCountPenginapanNotPublish = new Penginapan;

        $userContent = Content::where('user_id', auth()->user()->id)->count();
        $userContentPublish = Content::where('user_id', auth()->user()->id)
        ->where('status_publish', 1)->count();
        $userContentNotPublish = Content::where('user_id', auth()->user()->id)
        ->where('status_publish', 0)->count();

        $userBudaya = Budaya::where('user_id', auth()->user()->id)->count();
        $userBudayaPublish = Budaya::where('user_id', auth()->user()->id)
        ->where('status_publish', 1)->count();
        $userBudayaNotPublish = Budaya::where('user_id', auth()->user()->id)
        ->where('status_publish', 0)->count();

        $userPenginapan = Penginapan::where('user_id', auth()->user()->id)->count();
        $userPenginapanPublish = Penginapan::where('user_id', auth()->user()->id)
        ->where('status_publish', 1)->count();
        $userPenginapanNotPublish = Penginapan::where('user_id', auth()->user()->id)
        ->where('status_publish', 0)->count();
        
        return view('admin.dashboard', compact('users', 'content', 'publish', 'notPublish', 'getCountContent', 
        'getCountContentPublish', 'getCountContentNotPublish', 'userContent', 'userContentPublish', 
        'userContentNotPublish', 'getCountBudaya', 'getCountBudayaPublish', 'getCountBudayaNotPublish', 
        'userBudaya', 'userBudayaPublish', 'contentBudaya', 'getCountPenginapan', 'getCountPenginapanPublish', 'getCountPenginapanNotPublish', 
        'userPenginapan', 'userPenginapanPublish', 'penginapan'));
    }
}
