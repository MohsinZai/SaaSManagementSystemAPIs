<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
// use App\Http\Requests\StoreUserProfileRequest;
// use App\Http\Requests\UpdateUserProfileRequest;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'posts' => UserProfile::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new UserProfile;
        $post->user_name = $request->user_name;
        $post->user_phone = $request->user_phone;
        $post->user_role = $request->user_role;
        $post->user_address = $request->user_address;
        

        $post->save();

        return response()->json([
            'message' => 'Post Created',
            'status' => 'success',
            'data'   => $post
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserProfileRequest  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        $device = UserProfile::find($request->id);
        $device->user_name = $request->user_name;
        $device->user_phone = $request->user_phone;
        $device->user_role = $request->user_role;
        $device->user_address = $request->user_address;

        $result = $device->save();
        if($result)
        {
            return ["result" => "Updated Successfully"];
        }
        else
        {
            return ["result" => "Update operation has been failed"];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserProfile $userProfile)

    {
        //
    }
}
