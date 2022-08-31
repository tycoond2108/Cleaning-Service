<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Orders for admin
        $orders = Order::all();
        
        return view('admin.orders.index', compact('orders'));
    }

    public function indexForCleaner()
    {
        //Cleaner's orders
        if(Auth::user()){
            $user = Auth::user();
            $orders = Order::with('user')->with('service')->where('cleaner_id', $user->id)->get();
            return view('orders.myordersForCleaner', compact('orders'));
        }
        return abort(403);
        
    }

    public function indexForCustomer()
    {
        //Customer's orders
        if(Auth::user()){
            $user = Auth::user();
            $orders = Order::with('cleaner')->with('service')->where('user_id', $user->id)->get();
            return view('orders.myordersForCustomer', compact('orders'));
        }
        return abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cleaner = User::findOrFail($id);
        $services = Service::all();

        if($cleaner->role_id !== 3){ //check if user is cleaner
            return abort(403);
        }
        return view('orders.create', compact('cleaner', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $request->validate([
            'service_id' => ['required'],
            'house_access' => ['required'],

            'day' => ['required'],
            'from' => ['required'],
            'to' => ['required'],

            'preferred_language' => ['required'],
        ]);
        
        //add user_id to request
        $request->merge(['user_id' => $request->user()->id, 'cleaner_id' => $id]);

        $reqFrom = Carbon::createMidnightDate($request->from);
        $reqTo = Carbon::createMidnightDate($request->to);
        //$diffForValidate = $to->diffInHours($from);

        //check if booking a past day
        $today = Carbon::now();
        $choosenDay = new Carbon($request->day);
        $isPastDay = $today->gt($choosenDay);
        
        if($isPastDay){
            if($choosenDay->isToday()){
                //
            }else{
                return redirect()->back()->withErrors('You can\'nt book a past day!');
            }
        }
        
        $bookingExists = Order::where('cleaner_id', '=', $id)->where('day', '=', $request->day)->where('from', '=', $request->from)->exists();

        if($bookingExists){
            return redirect()->back()->withErrors('Sorry! the cleaner is not available on this time :(');
        } else{
            $cleanerOrdersForToday = Order::where('cleaner_id', $id)->where('day', '=', $request->day)->get();
            if(empty($cleanerOrdersForToday)){
                Order::create($request->all());
                return redirect('/')->with('success', 'Order Placed Successfuly');
            }else{
                
                foreach($cleanerOrdersForToday as $order){
                    $from = Carbon::createMidnightDate($order->from);
                    $to = Carbon::createMidnightDate($order->to);
                    $currDiff = $to->diffInHours($from);
                    $reqDiff = $reqTo->diffInHours($reqFrom);
                    if($reqDiff >= $currDiff){
                        return redirect()->back()->withErrors('Sorry! the cleaner is not available on this time :(');
                    }
                }
                Order::create($request->all());
                return redirect('/')->with('success', 'Order Placed Successfuly');
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //Specefic order for cleaner
        $order = Order::findOrFail($id);
        if($request->user()->role_id == 1){ //user is admin

        }else if($request->user()->role_id == 2 && $order->user_id == $request->user()->id){ //user is customer and owns the order
            
        }elseif($request->user()->role_id == 3 && $order->cleaner_id == $request->user()->id){ //user is cleaner and owns the order

        } 
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateForCustomer(Request $request, $id)
    {
        //Customer update his order
        $request->validate([
            'status' => ['required'],
        ]);

        $order = Order::FindOrFail($id);
        $order->update($request->all());
        
        return redirect()->back()->with('success', 'Order Updated Successfuly');
    }

    public function updateForCleaner(Request $request, $id)
    {
        //Cleaner Accept or Decline Order
        $request->validate([
            'status' => ['required'],
        ]);

        $order = Order::FindOrFail($id);
        $order->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Order Status Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('danger', 'Order Deleted!');
    }
}
