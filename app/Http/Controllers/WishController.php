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
        $auth = Auth::check();
    
        if($auth) {
            //header user info
            $user = User::where('id', Auth::user()->id)->first();
        }
    
        //wish info
        $wish = Wish::where('id', $id)->first;
        $wish_name = $wish->name;
        $wish_price = $wish->price;
        $wish_category = $wish->getCategoryRelation->name;
        $wish_created_by = $wish->getCreatedByRelation->username;
        $wish_created_at = $wish->created_at;
        $wish_detail = $wish->detail;
        $wish_image = $wish->image;
        $wish_status = $wish->getStatusRelation->name;
        $wish_approved_by = $wish->getApprovedByRelation->username;
        // $wish_reason = $wish->getReasonRelation->name;
        $wish_deadline = $wish->deadline;
        $wish_curr_qty = $wish->curr_qty;
        $wish_target_qty = $wish->target_qty;
        $wish_updated_at = $wish->updated_at;

        return view('wish-detail', ['auth' => $auth, 'user' => $user, 'wish' => $wish, 'wish_name' => $wish_name, 'wish_price' => $wish_price,
                                    'wish_category' => $wish_category, 'wish_created_by' => $wish_created_by, 'wish_created_at' => $wish_created_at,
                                    'wish_detail' => $wish_detail, 'wish_image' => $wish_image, 'wish_status' => $wish_status, 'wish_approved_by' => $wish_approved_by,
                                    'wish_deadline' => $wish_deadline, 'wish_curr_qty' => $wish_curr_qty, 'wish_target_qty' => $wish_target_qty,
                                    'wish_updated_at' => $wish_updated_at]);
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
}
