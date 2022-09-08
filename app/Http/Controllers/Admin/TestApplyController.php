<?php

namespace App\Http\Controllers\Admin;

use App\Models\TestApply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //
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
