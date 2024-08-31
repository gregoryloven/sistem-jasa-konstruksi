<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\HouseType;
use App\Models\HouseTypeDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $house_type = HouseType::all();
        return view('order.index', compact('house_type'));
    }

    public function getContractors($house_type_id)
    {
        // Ambil data HouseTypeDetail berdasarkan house_type_id
        $houseTypeDetails = HouseTypeDetail::where('house_type_id', $house_type_id)
            ->with('contractor')
            ->orderby('harga', 'ASC')
            ->get();
    
        // Format data untuk respons JSON
        $contractors = $houseTypeDetails->map(function ($detail) {
            return [
                'id' => $detail->id,
                'house_type_id' => $detail->house_type_id,
                'contractor_id' => $detail->contractor_id,
                'nama' => $detail->contractor ? $detail->contractor->nama : 'Unknown',
                'harga' => $detail->harga,
                'created_at' => $detail->created_at,
                'updated_at' => $detail->updated_at
            ];
        });
    
        return response()->json([
            'contractors' => $contractors
        ]);
    }

    public function getOrders()
    {
        $order = Order::orderBy('id', 'desc')->get();
        return view('order.admin', compact('order'));
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
        $data = new Order();
        $data->nama = $request->nama;
        $data->pekerjaan = $request->pekerjaan;
        $data->telepon = $request->telepon;
        $data->house_type_id = $request->house_type_id;
        $data->contractor_id = $request->contractor_id;

        // return redirect()->route('order.index')->withToastSuccess('Pemesanan berhasil');
        // return redirect()->route('order.index')->with('success', 'Pemesanan berhasil');
        return redirect()->route('order.index')->with('success', 'Pemesanan berhasil! Kontraktor akan menghubungi Anda.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
