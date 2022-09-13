<?php

namespace App\Http\Controllers\Admin;

use App\Models\TestApply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TestApplyController extends Controller
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
        $test_id = $request->test_id;
        $request->validate([
            'cnic' => 'required|unique:test_applies,cnic,'.$test_id,
        ]);
        $testApply = new TestApply();
        $testApply->test_id = $request->test_id;
        $testApply->user_id = 1;
        $testApply->date = date('Y-m-d');
        $testApply->test_code = rand(100000, 999999);
        $testApply->name = $request->name;
        $testApply->email = $request->email;
        $testApply->phone = $request->phone;
        $testApply->address = $request->address;
        $testApply->cnic = $request->cnic;
        $testApply->message = $request->message;
        $testApply->province = $request->province;
        $testApply->district = $request->district;
        $testApply->tehsil = $request->tehsil;
        $testApply->test_password = Hash::make(rand(100000, 999999));
        
        if($testApply->save()){
            return redirect()->back()->with('success', 'Test Apply Successfully');
        }else{
            return redirect()->back()->with('error', 'Test Apply Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestApply  $testApply
     * @return \Illuminate\Http\Response
     */
    public function show(TestApply $testApply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestApply  $testApply
     * @return \Illuminate\Http\Response
     */
    public function edit(TestApply $testApply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestApply  $testApply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestApply $testApply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestApply  $testApply
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestApply $testApply)
    {
        //
    }

    
    // apply 
    public function apply(Request $request, $test){
        
    }
}
