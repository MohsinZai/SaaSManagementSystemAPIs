<?php

namespace App\Http\Controllers;

use App\Models\RealTimeOverView;
use Illuminate\Http\Request;
use Validator;

class RealTimeOverViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $real_time_over_views = RealTimeOverView::all(); 
        if ($real_time_over_views->count() > 0) {
            return response()
            ->json([
                'status' => 200,
                'real_time_over_views' => $real_time_over_views
            ], 200);
        }
        else {
            return response()
            ->json([
                'status' => 404,
                'real_time_over_views' =>'Overview Not Found!'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'recharge' => 'required|decimal:2',
            'withdraw' => 'required|decimal:2',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'newToday' => 'required|digits:5',
            'onlineUsers' => 'required|digits:5',
            
        ]);

        if ($validator->fails()) {
            return response()
            ->json([
                'status' => 422, 
                'errors' => $validator->messages()
            ], 422);
        }

        
        else
        {
            $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'imagesRealtime/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }
        

            $real_time_over_views = RealTimeOverView::create([
                'recharge' => $request->recharge,
                'withdraw' => $request->withdraw,
                'image' => $request->image,
                'newToday' => $request->newToday,
                'onlineUsers' => $request->onlineUsers,
            ]);

            if ($real_time_over_views) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Overview Created Successfully!!'
                ], 200);
            }

            else
            {
                return response()
                ->json([
                    'status' => 500,
                    'message' => 'Something Went Wrong.'
                ], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealTimeOverView  $realTimeOverView
     * @return \Illuminate\Http\Response
     */
    public function show(RealTimeOverView $realTimeOverView)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RealTimeOverView  $realTimeOverView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealTimeOverView $realTimeOverView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealTimeOverView  $realTimeOverView
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealTimeOverView $realTimeOverView)
    {
        //
    }
}
