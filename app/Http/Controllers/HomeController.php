<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Wish;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(){
        $auth = Auth::check();
        if($auth) {
            //header user info
            $user = User::where('id', Auth::user()->id)->first();

            $wishes = Wish::all();

            //last minute
            $curr_date = Carbon::now();
            // $lastminute = Wish::whereRaw('DATEDIFF(deadline, curr_date) < 7')->get();

            //category
            $categories = Category::all();

            //for you
            $for_you = Wish::where('deadline', '>', Carbon::now())->where('status_wish_id', 3)->inRandomOrder()->get();

            return view('home.home', ['auth' => $auth, 'wishes' => $wishes, 'user' => $user,
                             'categories' => $categories, 'for_you' => $for_you]);
        }

        $wishes = Wish::all();

        //last minute
        $curr_date = Carbon::now();
        // $lastminute = Wish::whereRaw('DATEDIFF(deadline, curr_date) < 7')->get();

        //category
        $categories = Category::all();

        //for you
        $for_you = Wish::where('deadline', '>', Carbon::now())->inRandomOrder()->get();

        return view('home.home', ['auth' => $auth, 'wishes' => $wishes,
                             'categories' => $categories, 'for_you' => $for_you]);
    }
}
