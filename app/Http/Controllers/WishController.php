<?php

namespace App\Http\Controllers;

use App\Address;
use App\Notification_Wish;
use App\Payment;
use App\Payment_Item;
use App\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wish;
use App\Category;
use App\Cart;
use App\Cart_Item;
use App\Origin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class WishController extends Controller
{
    public function wishDetail($id){
        $auth = Auth::check();
        // $auth = true;

        //wish info
        $wish = Wish::where('id', $id)->first();
        $wish_name = $wish->name;
        $wish_price = $wish->price;
        $wish_category = $wish->getCategoryRelation->name;
        $wish_created_by = $wish->getCreatedByRelation->username;
        $wish_created_at = $wish->created_at;
        $wish_detail = $wish->detail;
        $wish_image = $wish->image;
        $wish_origin = $wish->getOriginRelation->name;
        $wish_web_link = $wish->web_link;
        $wish_status_wish_name = $wish->getStatusWishRelation->name;
        // $wish_status_transaksi_name = $wish->getStatusTransaksiRelation->name;
        if ($wish->approved_by == NULL){
            $wish_approved_by = NULL;
        }
        else{
            $wish_approved_by = $wish->getApprovedByRelation->username;
        }
        // $wish_reason = $wish->getReasonRelation->name;
        $wish_deadline = $wish->deadline;
        $wish_curr_qty = $wish->curr_qty;
        $wish_target_qty = $wish->target_qty;
        $wish_stock = $wish_target_qty - $wish_curr_qty;
        $wish_min_order = $wish->min_order;
        $wish_updated_at = $wish->updated_at;
        $for_you = Wish::where('deadline', '>', Carbon::now())->inRandomOrder()->get();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if($auth) {
            //header user info
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            // return view('wishDetail', compact('wish'));
            return view('wish.wishDetail', ['auth' => $auth, 'user' => $user, 'wish' => $wish, 'wish_name' => $wish_name, 'wish_price' => $wish_price,
                                        'wish_category' => $wish_category, 'wish_created_by' => $wish_created_by, 'wish_created_at' => $wish_created_at,
                                        'wish_detail' => $wish_detail, 'wish_image' => $wish_image, 'wish_status_wish_name' => $wish_status_wish_name, 'wish_approved_by' => $wish_approved_by,
                                        'wish_deadline' => $wish_deadline, 'wish_curr_qty' => $wish_curr_qty, 'wish_target_qty' => $wish_target_qty, 'wish_stock' => $wish_stock,
                                        'wish_updated_at' => $wish_updated_at, 'wish_origin' => $wish_origin, 'wish_web_link' => $wish_web_link, 'for_you' => $for_you,
                                        'wish_min_order' => $wish_min_order, 'cart' => $cart, 'cart_items' => $cart_items, 'notifs' => $notifs, 'addressNavbar'=>$addressNavbar]);
        }

        return view('wish.wishDetail', ['auth' => $auth, 'wish' => $wish, 'wish_name' => $wish_name, 'wish_price' => $wish_price,
                                    'wish_category' => $wish_category, 'wish_created_by' => $wish_created_by, 'wish_created_at' => $wish_created_at,
                                    'wish_detail' => $wish_detail, 'wish_image' => $wish_image, 'wish_status_wish_name' => $wish_status_wish_name, 'wish_approved_by' => $wish_approved_by,
                                    'wish_deadline' => $wish_deadline, 'wish_curr_qty' => $wish_curr_qty, 'wish_target_qty' => $wish_target_qty,  'wish_stock' => $wish_stock,
                                    'wish_updated_at' => $wish_updated_at, 'wish_origin' => $wish_origin, 'wish_web_link' => $wish_web_link, 'for_you' => $for_you,
                                    'wish_min_order' => $wish_min_order, 'cart' => $cart, 'cart_items' => $cart_items, 'notifs' => $notifs]);

    }

    public function getCreateWish(){
        $auth = Auth::check();

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $categories = Category::all();
            $origins = Origin::all();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            return view('wish.createWish', ['auth' => $auth, 'user' => $user, 'categories' => $categories, 'origins' => $origins, 'cart_items' => $cart_items,
                                            'notifs' => $notifs,'addressNavbar'=>$addressNavbar]);
        }
        return redirect('login');
    }

    public function postCreateWish(Request $request){
        $auth = Auth::check();

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();

            // Buat Object Wish
            $wish = new Wish();
            $wish->id = floor(time()-999999999);
            $wish_id = $wish->id;
            $wish->name = $request->wishName; //string
            $wish->price = $request->price; //int
            $wish->category_id = $request->categoryId; //int
            $wish->created_by = $user->id;
            $wish->detail = $request->description; //string
            //picture
            $file = $request->file('wishPicture');
            if($file){
                foreach ($file as $files){
                    $path = Storage::disk('s3')->put('uploads/', $files);
                    $data[] = basename($path);
                }
            }

            // Otomatis Verifikasi Wish (utk testing aja)
            $wish->approved_by = 1;
            $wish->approved_at = Carbon::now();

            $wish->image = json_encode($data);//string
            $wish->origin_id = $request->origin;
            $wish->web_link = $request->webLink;
            $wish->curr_qty = $request->purchaseQty; //int, total qty yg dibeli wish creator
            $wish->status_wish_id = '2'; // jadikan status wish-nya 'Menunggu Pembayaran' -> harusnya 'Menunggu Verifikasi' dulu, tpi karna belum ada verif yaudah
            $wish->deadline = Carbon::now()->addDays(7);; //datetime
            $wish->min_order = 1;
            $wish->target_qty = $request->targetQty; //int
            $wish->contributor = 1;
            $wish->created_at = Carbon::now();
            $wish->updated_at = Carbon::now();
            $wish->save();

            // Buat Notification_Wish 1 (Transaksi menunggu pembayaran nihh)
            $notification_wish = new Notification_Wish;
            $notification_wish->user_id = $user->id;
            $notification_wish->wish_id = $wish_id;
            $notification_wish->notification_id = 1;
            $notification_wish->save();

            return redirect()->route('home');
        }
        return redirect('')->route('getLogin');
    }

    public function getEditWish($id){
        $auth = Auth::check();

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $wish = Wish::where('id', $id)->first();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            return view('edit-wish',['auth' => $auth, 'user' => $user, 'wish' => $wish , 'addressNavbar'=>$addressNavbar]);
        }
        return redirect('login');
    }

//    public function postEditWish(Request $request){
//        $auth = Auth::check();
//
//        if($auth){
//
//        }
//    }

    public function wishSearch(Request $request){
        $auth = Auth::check();
//        dd($request->category);
        //search
        $search = $request->search;

        //cart dropdown
        $cart = NULL;
        $cart_items = NULL;

        //notif dropdown
        $notifs = NULL;

        //search
        $curr_min = NULL; $curr_maks = NULL; $active_cat = NULL; $is_min = 2;

        // $wishes = Wish::where('name', 'like', "%".$search."%")->get();
        $query = Wish::where('name', 'like', "%".$search."%");
        $query->where('name', 'like', "%".$search."%");

        if($request->filled('category')){
            $query->whereIn('category_id',$request->category)->get();
            $active_cat = $request->category;
        }
        if($request->filled('min')){
            $query->where('price', '>', $request->min);
            $curr_min = $request->min;
        }
        if($request->filled('maks')){
            $query->where('price', '<', $request->maks);
            $curr_maks = $request->maks;
        }
        if($request->filled('deadline')){
            if($request->deadline == 1){
                $deadline = Carbon::now('Asia/Jakarta')->addDays(1);
                $query->where('deadline', '<', $deadline)->get();
            }elseif($request->deadline == 2){
                $deadline = Carbon::now('Asia/Jakarta')->addDays(1);
                $deadline2 = Carbon::now('Asia/Jakarta')->addDays(3);
                $query->where('deadline', '>', $deadline)->where('deadline', '<', $deadline2)->get();
            }elseif($request->deadline == 3){
                $deadline = Carbon::now('Asia/Jakarta')->addDays(4);
                $deadline2 = Carbon::now('Asia/Jakarta')->addDays(7);
                $query->where('deadline', '>', $deadline)->where('deadline', '<', $deadline2)->get();
            }elseif($request->deadline == 4){
                $deadline = Carbon::now('Asia/Jakarta')->addDays(7);
                $query->where('deadline', '>', $deadline)->get();
            }
        }

        if($request->filled('sort')){
            if($request->sort == 1){
                $query->orderBy('price', 'asc');
                $is_min = 1;
            }elseif($request->sort == 2){
                $query->orderBy('price', 'desc');
                $is_min = 0;
            }
        }
//        if($request->filled('deadline')){
//            if ($request->deadline == '1'){
//                $deadline = $query->get();
//                $query->where($request->deadline , '<', Carbon::yesterday('deadline'));
//            }
//            $curr_tenggat = $request->deadline;
//        }
        $wishes = $query->get();

        $wishes_category_id = Wish::where('name', 'like', "%".$search."%")->pluck('category_id');

        //categories
        $categories = Category::all();

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();

            //cart dropdown
            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = Cart_Item::where('cart_id', $cart->id)->get();

            $addressNavbar = Address::where('is_temp','1')->where('user_id',$user->id)->first();

            //notif dropdown
            $notifs = Notification_Wish::where('user_id', $user->id)->where('is_read', 0)->get();

            return view('wish.searchWish', ['auth' => $auth, 'user' => $user, 'wishes' => $wishes, 'cart' => $cart, 'categories' => $categories,
                                            'cart_items' => $cart_items, 'notifs' => $notifs, 'search' => $search, 'addressNavbar'=>$addressNavbar,
                                            'curr_min' => $curr_min, 'curr_maks' => $curr_maks, 'active_cat' => $active_cat, 'is_min' => $is_min]);
        }
        return view('wish.searchWish', ['auth' => $auth, 'wishes'=> $wishes, 'cart' => $cart, 'categories' => $categories,
                                        'cart_items' => $cart_items, 'notifs' => $notifs, 'search' => $search, 'curr_min' => $curr_min, 'curr_maks' => $curr_maks,
                                        'active_cat' => $active_cat, 'is_min' => $is_min]);
    }
}

