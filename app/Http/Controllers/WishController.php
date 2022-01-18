<?php

namespace App\Http\Controllers;

use App\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wish;
use App\Category;
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
        $for_you = Wish::where('deadline', '>', Carbon::now())->inRandomOrder()->get();

        if($auth) {
            //header user info
            // $user = User::where('id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();

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

            return view('wish.createWish', ['auth' => $auth, 'user' => $user, 'categories' => $categories]);
        }
        redirect('login');
    }

    public function postCreateWish(Request $request){
        $auth = Auth::check();

        if($auth){
            $user = User::where('id', Auth::user()->id)->first();

            $wish = new Wish();
            $wish->id = floor(time()-999999999);
            $wish->name = $request->wishName; //string
            $wish->price = $request->price; //int
            $wish->category_id = $request->categoryId; //int
            $wish->created_by = $user->id;
            $wish->detail = $request->description; //string
            //picture
            $file = $request->file('wishPicture');
            $folder = uniqid() . '-' . now()->timestamp;
            foreach ($file as $files){
                $filename = uniqid(). '.' .$files->getClientOriginalExtension();
                $files->storeAs('uploads/' . $folder, $filename);
                $data[] = $folder .'/'. $filename;
            }

            $wish->image = json_encode($data);//string
            $wish->web_link = $request->webLink;
            $wish->status_wish_id = '1'; //int
            $wish->origin = $request->origin;
            $wish->deadline = Carbon::now()->addDays(8);; //datetime
            $wish->min_order = $request->minOrder;
            $wish->curr_qty = '0'; //int, total qty yg dibeli wish creator
            $wish->target_qty = $request->targetQty; //int
            $wish->created_at = Carbon::now();
            $wish->updated_at = Carbon::now();
//            $wish->name = $request->wish_name; //string
//            $wish->price = $request->wish_price; //int
//            $wish->category_id = $request->wish_category_id; //int
//            $wish->created_by = $user->id;
//            $wish->detail = $request->detail; //string
//            //picture
//            if($request->hasFile('wishPicture')) {
//                $file = $request->file('wishPicture');
//                $folder = uniqid() . '-' . now()->timestamp;
//                foreach ($file as $files){
//                    $filename = $files->getClientOriginalName();
//                    $files->storeAs('uploads/' . $folder, $filename);
//                }
//                $wish->image = 'uploads' .$folder;//string
//            }
//            else{
//                $wish->image = '';
//            }
//            $wish->status_id = $request->status_id; //int
//            $wish->approved_by = $request->approved_by; //int
//            $wish->deadline = $request->deadline; //datetime
//            $wish->curr_qty = $request->curr_qty; //int, total qty yg dibeli wish creator
//            $wish->target_qty = $request->target_qty; //int
//            $wish->created_at = Carbon::now();
//            $wish->updated_at = Carbon::now();
            $wish->save();

            return redirect()->route('home');
        }
        return redirect('')->route('getLogin');
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
