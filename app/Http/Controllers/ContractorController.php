<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $query = Contractor::query();

        if ($status !== null && $status !== '') {
            $query->where('status', $status);
        }

        $data = $query->get();
        
        return view('contractor.index', compact('data'));

    }

    public function accept(Request $request)
    {
        $data = Contractor::find($request->id);
        $data->status = 2;
        $data->save();

        return redirect()->route('contractor.index')->withToastSuccess('Data kontraktor telah disetujui');
    }

    public function decline($id)
    {
        $data = Contractor::find($id);
        $data->status = 0;
        $data->save();

        return redirect()->route('contractor.index')->withToastError('Data kontraktor telah ditolak');
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
     * @param  \App\Models\Contractor  $Contractor
     * @return \Illuminate\Http\Response
     */
    public function show(Contractor $Contractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contractor  $Contractor
     * @return \Illuminate\Http\Response
     */
    public function edit(Contractor $Contractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contractor  $Contractor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contractor $Contractor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contractor  $Contractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractor $Contractor)
    {
        //
    }
}
