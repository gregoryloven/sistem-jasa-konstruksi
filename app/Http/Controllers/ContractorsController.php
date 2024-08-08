<?php

namespace App\Http\Controllers;

use App\Models\Contractors;
use Illuminate\Http\Request;

class ContractorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Contractor::all();
        return view('contractor.index', compact('data'));
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
     * @param  \App\Models\Contractors  $contractors
     * @return \Illuminate\Http\Response
     */
    public function show(Contractors $contractors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contractors  $contractors
     * @return \Illuminate\Http\Response
     */
    public function edit(Contractors $contractors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contractors  $contractors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contractors $contractors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contractors  $contractors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractors $contractors)
    {
        //
    }
}
