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

        $wishes = Wish::all();

        //last minute
        $curr_date = Carbon::now();
        // $lastminute = Wish::whereRaw('DATEDIFF(deadline, curr_date) < 7')->get();

        //category
        $categories = Category::all();

        //for you
        $for_you = Wish::where('deadline', '>', Carbon::now())->where('status_wish_id', 3)->inRandomOrder()->get();

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

            $addressNavbar = Address::where('is_temp','1')->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            return view('home.home', ['auth' => $auth, 'wishes' => $wishes, 'user' => $user, 'cart' => $cart,
                             'categories' => $categories, 'for_you' => $for_you, 'cart_items' => $cart_items,
                             'notifs' => $notifs, 'addressNavbar'=>$addressNavbar]);
        }
        return view('home.home', ['auth' => $auth, 'wishes' => $wishes, 'cart' => $cart, 'notifs' => $notifs,
                             'categories' => $categories, 'for_you' => $for_you, 'cart_items' => $cart_items]);
    }
}
