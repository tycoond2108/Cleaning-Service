<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all cleaners
        $users = User::where('role_id', 3)->get();
        
        return view('users.index', compact('users'));
        
    }

    public function indexForAdmin()
    {
        //return all users for admin
        $users = User::all();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $user = User::findOrFail($id);
 
        //check if the user accessing his profile
        if(Auth::user()){
            if($user->id == $request->user()->id){
                if($user->role_id == 3){ //myprofile for cleaner
                    $orders = Order::where('cleaner_id', $user->id)->where('status', 1)->get();
                    return view('users.myprofile_for_cleaner', compact('user', 'orders'));
                }
                return view('users.myprofile', compact('user'));
            }
        }

        //check if the profile belongs to a cleaner
        if($user->role_id == 3){

            //set an intreval for one week
            $now = Carbon::now();
            $from = $now->startOfWeek()->format('Y-m-d');
            $to = $now->endOfWeek()->format('Y-m-d');

            $orders = Order::where('cleaner_id', $id)->where('status', 1)->whereBetween('day', [$from, $to])->get();

            return view('users.show_cleaner_profile', compact('user','orders'));
        }
        return view('users.show', compact('user'));
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
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        //Validate age
        $obj = new Carbon();
        $before = $obj->subYears(18)->format('Y-m-d');

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:App\Models\User,username,'.$user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\User,email,'.$user->id],
            'phone' => ['required', 'min:5', 'max:11', 'unique:App\Models\User,phone,'.$user->id],
            'address' => ['required', 'string', 'min:10', 'max:500'],
            'country' => ['required', 'string','min:3', 'max:20'],
            'state' => ['required', 'string', 'min:3', 'max:20'],
            'city' => ['required', 'string', 'min:3', 'max:20'],
            'zip' => ['required', 'string', 'min:3', 'max:20'],
            'language' => ['required', 'string', 'min:2', 'max:20'],
            'birthdate' => ['required','before:'.$before ],
        ]);

        $user->update($request->all());
        
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    public function updateProfilePicture($id, Request $request){

        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::findOrFail($id);

        $PP = $request->profile_picture;
        $fileName = 'profile_picture' . time() . $PP->getClientOriginalName();
        $PP->move(public_path('imgs'), $fileName);
        $user->profile_picture = $fileName;
        $user->save();
        return redirect()->back()->with('success', 'Profile picture updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->back()->with('danger', 'User Deleted!');
    }
}
