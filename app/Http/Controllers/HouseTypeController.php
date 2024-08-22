<?php

namespace App\Http\Controllers;

use App\Models\HouseType;
use Illuminate\Http\Request;
use Auth;

class HouseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::check() ? Auth::user()->type : null;

        if ($user === 0) {
            $data = HouseType::all();
            return view('house_type.index', compact('data'));
        } else if ($user === 1) {
            return;
        } else {
            if (Auth::guest()) {
                $data = HouseType::all();
                return view('home.house_type', compact('data'));
            }
        }
        
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
        $data = new HouseType();
        $data->nama = $request->nama;
        
        $file=$request->file('foto');
        $imgFolder = 'foto/';
        $extension = $request->file('foto')->extension();
        $imgFile=time()."_".$request->get('nama').".".$extension;
        $file->move($imgFolder,$imgFile);
        $data->foto=$imgFile;

        $data->save();

        return redirect()->route('house_type.index')->withToastSuccess('Data tipe rumah berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function show(HouseType $houseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseType $houseType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseType $houseType)
    {
        $houseType->nama = $request->nama;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imgFolder = 'foto/';
            $extension = $file->extension();
            $imgFile = time() . "_" . $request->get('nama') . "." . $extension;
            $file->move($imgFolder, $imgFile);
    
            $oldFilePath = $imgFolder . $houseType->foto;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
    
            $houseType->foto = $imgFile;
        }

        $houseType->save();

        return redirect()->route('house_type.index')->withToastSuccess('Data tipe rumah berhasil diubah');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseType $houseType)
    {
        try {
            $imgFolder = 'foto/';
            $filePath = $imgFolder . $houseType->foto;

            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $houseType->delete();
            
            return redirect()->route('house_type.index')->withToastSuccess('Data tipe rumah berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('house_type.index')->withToastError('Data tipe rumah gagal dihapus karena digunakan pada data lain');
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = HouseType::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('house_type.EditForm',compact('data'))->render()),200);
    }
}
