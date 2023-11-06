<?php

namespace App\Http\Controllers;

use App\Models\ComprehensiveReport;
use Illuminate\Http\Request;
use Validator;

class ComprehensiveReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprehensive_reports = ComprehensiveReport::all(); 
        if ($comprehensive_reports->count() > 0) {
            return response()
            ->json([
                'status' => 200,
                'comprehensive_reports' => $comprehensive_reports
            ], 200);
        }
        else {
            return response()
            ->json([
                'status' => 404,
                'comprehensive_reports' =>'No Reports Found!'
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
            'remark' => 'required|string:100',
            'deposits' => 'required|decimal:3',
            'dispensing' => 'required|decimal:2',
            'numffpeople' => 'required',
            'numapeople' => 'required',
            'profitloss' => 'required|decimal:2',

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
            

            $comprehensive_reports = ComprehensiveReport::create([
                'remark' => $request->remark,
                'deposits' => $request->deposits,
                'dispensing' => $request->dispensing,
                'numffpeople' => $request->numffpeople,
                'numapeople' => $request->numapeople,
                'profitloss' => $request->profitloss,
            ]);

            if ($comprehensive_reports) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Report Generated Successfully!!'
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
     * @param  \App\Models\ComprehensiveReport  $comprehensiveReport
     * @return \Illuminate\Http\Response
     */
    public function show(ComprehensiveReport $comprehensiveReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComprehensiveReport  $comprehensiveReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComprehensiveReport $comprehensiveReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComprehensiveReport  $comprehensiveReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComprehensiveReport $comprehensiveReport)
    {
        //
    }
}
