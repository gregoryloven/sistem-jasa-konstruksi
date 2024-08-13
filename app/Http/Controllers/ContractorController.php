<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Http\Request;
use Auth;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth()->user()->type;

        if ($user == 1) {
            $status = $request->input('status');
            $query = Contractor::query();
    
            if ($status !== null && $status !== '' && $status != -1) {
                $query->where('status', $status);
            }
        
            // Selalu mengecualikan status -1
            $query->where('status', '!=', -1);
        
            $data = $query->get();
            
            return view('contractor.index', compact('data'));
        } else {
            return view('contractor.index', compact('data'));
        }
        

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
    public function show(Contractor $contractor)
    {
        return view('contractor.profile', compact('contractor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contractor  $Contractor
     * @return \Illuminate\Http\Response
     */
    public function edit(Contractor $contractor)
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
    public function update(Request $request, Contractor $contractor)
    {
        $contractor->nama = $request->input('nama');
        $contractor->telepon = $request->input('telepon');
        $contractor->perusahaan = $request->input('perusahaan');
        $contractor->alamat = $request->input('alamat');
        $contractor->status = 1;
        
        if ($request->hasFile('tdp')) {
            // Ambil file yang diunggah
            $file = $request->file('tdp');
            $imgFolder = 'foto/';
            $extension = $file->extension();
            $imgFile = time() . "_" . $request->get('nama') . "." . $extension;
            
            // Hapus file lama jika ada
            if ($contractor->tdp && file_exists(public_path($imgFolder . $contractor->tdp))) {
                unlink(public_path($imgFolder . $contractor->tdp));
            }
    
            // Simpan file baru
            $file->move($imgFolder, $imgFile);
    
            // Update nama file di database
            $contractor->tdp = $imgFile;
        }

        $contractor->save();

        return redirect()->route('contractor.show', $contractor->id)->withToastSuccess('Verifikasi data berhasil terkirim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contractor  $Contractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractor $contractor)
    {
        //
    }
}
