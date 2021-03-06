<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Wish;
use App\Category;
use App\Cart;
use App\Cart_Item;
use App\Notification_Wish;

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

        //last minute
        $today = Carbon::now('Asia/Jakarta');
        $deadline = Carbon::now('Asia/Jakarta')->addDays(1);

        $lastminute = Wish::where('status_wish_id', 3)
                          ->where('deadline', '<', $deadline)
                          ->where('deadline', '>', $today)
                          ->inRandomOrder()->get();

        //category
        $categories = Category::all();

        //for you
        $for_you = Wish::where('deadline', '>=', $deadline)->where('status_wish_id', 3)->inRandomOrder()->get();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if($auth) {
            //header user info
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            return view('home.home', ['auth' => $auth, 'user' => $user, 'cart' => $cart,
                             'categories' => $categories, 'for_you' => $for_you, 'cart_items' => $cart_items,
                             'notifs' => $notifs, 'addressNavbar'=>$addressNavbar, 'lastminute' => $lastminute]);
        }
        return view('home.home', ['auth' => $auth, 'cart' => $cart, 'notifs' => $notifs,
                             'categories' => $categories, 'for_you' => $for_you, 'cart_items' => $cart_items,
                             'lastminute' => $lastminute]);
    }
}
