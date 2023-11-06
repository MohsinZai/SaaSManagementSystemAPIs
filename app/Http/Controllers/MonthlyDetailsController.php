<?php

namespace App\Http\Controllers;

use App\Models\MonthlyDetails;
use Illuminate\Http\Request;
use Validator;

class MonthlyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $monthly_details = MonthlyDetails::all(); 
        if ($monthly_details->count() > 0) {
            return response()
            ->json([
                'status' => 200,
                'monthly_details' => $monthly_details
            ], 200);
        }
        else {
            return response()
            ->json([
                'status' => 404,
                'monthly_details' =>'No Details Found!'
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
            'date' => 'required',
            'newUsers' => 'required',
            'deposits' => 'required|decimal:2',
            'dispensing' => 'required|decimal:2',
            'numffpeople' => 'required|digits:2',
            'numapeople' => 'required|digits:2',
            'orderquant' => 'required|digits:2',
            'custprofitloss' => 'required|decimal:2',
            'runningwater' => 'required|decimal:2',

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
            

            $monthly_details = MonthlyDetails::create([
                'date' => $request->date,
                'newUsers' => $request->newUsers,
                'deposits' => $request->deposits,
                'dispensing' => $request->dispensing,
                'numffpeople' => $request->numffpeople,
                'numapeople' => $request->numapeople,
                'orderquant' => $request->orderquant,
                'custprofitloss' => $request->custprofitloss,
                'runningwater' => $request->runningwater,

            ]);

            if ($monthly_details) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Details Added Successfully!!'
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
     * @param  \App\Models\MonthlyDetails  $monthlyDetails
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyDetails $monthlyDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthlyDetails  $monthlyDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyDetails $monthlyDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyDetails  $monthlyDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyDetails $monthlyDetails)
    {
        //
    }
}
