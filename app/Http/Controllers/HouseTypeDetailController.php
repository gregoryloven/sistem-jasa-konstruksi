<?php

namespace App\Http\Controllers;

use App\Models\HouseTypeDetail;
use App\Models\HouseType;
use Illuminate\Http\Request;
use Auth;

class HouseTypeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_status = Auth()->user()->contractor->status;
        $user = Auth()->user()->id;

        $data = HouseTypeDetail::with('house_type')
            ->where('contractor_id', $user)
            ->get();
        $house_type = HouseType::all();

        return view('house_type_detail.index', compact('data', 'house_type', 'user_status'));
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
        $data = new HouseTypeDetail();
        $data->house_type_id = $request->house_type_id;
        $data->contractor_id = Auth()->user()->id;
        $data->harga = str_replace('.', '', $request->harga);

        $data->save();

        return redirect()->route('house_type_detail.index')->withToastSuccess('Data tipe rumah berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseTypeDetail  $houseTypeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(HouseTypeDetail $houseTypeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseTypeDetail  $houseTypeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseTypeDetail $houseTypeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseTypeDetail  $houseTypeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseTypeDetail $houseTypeDetail)
    {
        $houseTypeDetail->house_type_id = $request->house_type_id;
        $houseTypeDetail->harga = str_replace('.', '', $request->harga);

        $houseTypeDetail->save();

        return redirect()->route('house_type_detail.index')->withToastSuccess('Data tipe rumah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseTypeDetail  $houseTypeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseTypeDetail $houseTypeDetail)
    {
        try {
            $houseTypeDetail->delete();
            
            return redirect()->route('house_type_detail.index')->withToastSuccess('Data tipe rumah berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('house_type_detail.index')->withToastError('Data tipe rumah gagal dihapus karena digunakan pada data lain');
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = HouseTypeDetail::find($id);
        $house_type = HouseType::all();

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('house_type_detail.EditForm',compact('data', 'house_type'))->render()),200);
    }
}
