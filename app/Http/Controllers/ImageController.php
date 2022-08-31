<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'image' => ['required'],
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if($request->hasfile('image')){
            $imgName = 'profile_pic' . time() . $request->image->getClientOriginalName();
            $request->image->move(public_path() . '/imgs/', $imgName);

            Image::create([
                'name' => $imgName,
            ]);

            return redirect()->back()->with('success', 'Profile Picture Updated Successfuly');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([
            'image' => ['required'],
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = Image::findOrFail($id);

        if($request->hasfile('image')){
            $imgName = 'profile_pic' . time() . $request->image->getClientOriginalName();
            $request->image->move(public_path() . '/imgs/', $imgName);

            File::delete('imgs/' . $image->name);
            //DB
            $image->name = $imgName;
            $image->save();

            return redirect()->back()->with('success', 'Profile Picture Updated Successfuly');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        
        File::delete('imgs/' . $image->name);
        $image->delete();
        
        return redirect()->back()->with('danger', 'Profile Picture Removed!');
    }
}
