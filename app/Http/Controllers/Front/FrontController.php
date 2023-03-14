<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $posts = Post::take(10)->get();
        $donationRequests = DonationRequest::take(5)->with('bloodType','city')->get();
        return view('front.home',compact('posts' , 'donationRequests'));
    }
    public function aboutUs()
    {
        return view('front.who-us');
    }

    public function contactUs()
    {
        return view('front.contact-us');
    }
}
