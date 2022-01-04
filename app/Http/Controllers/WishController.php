<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wish;
use App\Category;
use Carbon\Carbon;

class WishController extends Controller
{
    public function wishDetail($id){
        // $auth = Auth::check();
        $auth = true;
        
        //wish info
        $wish = Wish::where('id', $id)->first();
        $wish_name = $wish->name;
        $wish_price = $wish->price;
        $wish_category = $wish->getCategoryRelation->name;
        $wish_created_by = $wish->getCreatedByRelation->username;
        $wish_created_at = $wish->created_at;
        $wish_detail = $wish->detail;
        $wish_image = $wish->image;
        $wish_origin = $wish->origin;
        $wish_web_link = $wish->web_link;
        $wish_status_wish_name = $wish->getStatusWishRelation->name;
        $wish_status_transaksi_name = $wish->getStatusTransaksiRelation->name;
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
        $for_you = Wish::inRandomOrder()->get();
    
    
        if($auth) {
            //header user info
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', 1)->first();

            // return view('wishDetail', compact('wish'));
            return view('wish.wishDetail', ['auth' => $auth, 'user' => $user, 'wish' => $wish, 'wish_name' => $wish_name, 'wish_price' => $wish_price,
                                        'wish_category' => $wish_category, 'wish_created_by' => $wish_created_by, 'wish_created_at' => $wish_created_at,
                                        'wish_detail' => $wish_detail, 'wish_image' => $wish_image, 'wish_status_wish_name' => $wish_status_wish_name, 'wish_approved_by' => $wish_approved_by,
                                        'wish_deadline' => $wish_deadline, 'wish_curr_qty' => $wish_curr_qty, 'wish_target_qty' => $wish_target_qty, 'wish_stock' => $wish_stock,
                                        'wish_updated_at' => $wish_updated_at, 'wish_origin' => $wish_origin, 'wish_web_link' => $wish_web_link, 'for_you' => $for_you, 
                                        'wish_status_transaksi_name' => $wish_status_transaksi_name, 'wish_min_order' => $wish_min_order]);
        }

        return view('wish.wishDetail', ['auth' => $auth, 'wish' => $wish, 'wish_name' => $wish_name, 'wish_price' => $wish_price,
                                    'wish_category' => $wish_category, 'wish_created_by' => $wish_created_by, 'wish_created_at' => $wish_created_at,
                                    'wish_detail' => $wish_detail, 'wish_image' => $wish_image, 'wish_status_wish_name' => $wish_status_wish_name, 'wish_approved_by' => $wish_approved_by,
                                    'wish_deadline' => $wish_deadline, 'wish_curr_qty' => $wish_curr_qty, 'wish_target_qty' => $wish_target_qty,  'wish_stock' => $wish_stock,
                                    'wish_updated_at' => $wish_updated_at, 'wish_origin' => $wish_origin, 'wish_web_link' => $wish_web_link, 'for_you' => $for_you,
                                    'wish_status_transaksi_name' => $wish_status_transaksi_name, 'wish_min_order' => $wish_min_order]);
    
    }

    public function getCreateWish(){
        $auth = Auth::check();

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $categories = Category::all();

            return view('create-wish', ['auth' => $auth, 'user' => $user, 'categories' => $categories]);
        }
        redirect('login');
    }

    public function postCreateWish(Request $request){
        $auth = Auth::check();

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
                    
            $wish = new Wish();
            $wish->name = $request->wish_name; //string
            $wish->price = $request->wish_price; //int
            $wish->category_id = $request->wish_category_id; //int
            $wish->created_by = $user->id;
            $wish->detail = $request->detail; //string
            $wish->image = $request->image; //string
            $wish->status_id = $request->status_id; //int
            $wish->approved_by = $request->approved_by; //int
            $wish->deadline = $request->deadline; //datetime
            $wish->curr_qty = $request->curr_qty; //int, total qty yg dibeli wish creator
            $wish->target_qty = $request->target_qty; //int
            $wish->created_at = Carbon::now();
            $wish->updated_at = Carbon::now();
    
            $wish->save();
    
            return redirect('create-wish');
        }
        return redirect('login');
    }

    public function getEditWish($id){
        $auth = Auth::check();

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();
            $wish = Wish::where('id', $id)->first();


            return view('edit-wish',['$auth' => $auth, 'user' => $user, 'wish' => $wish]);
        }
        return redirect('login');
    }

    public function postEditWish(Request $request){
        $auth = Auth::check();

        if($auth){

        }
    }

    public function checkOut(){
        // $auth = Auth::check();
        $auth = true;

        if($auth){
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', 1)->first();

            return view('checkout.checkout', ['auth' => $auth, 'user' => $user]);
        }

        return redirect('login');
    }
}
