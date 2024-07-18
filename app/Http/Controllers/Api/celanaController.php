<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\celana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class celanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $data = celana::get();
        return response()->json([
            'status'=>true,
            'message'=>'Data Ditemukan',
            'Data'=>$data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataCelana = new celana;

        $rules = [
            'merk' => 'required',
            'ukuran' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal ditambahkan',
                'Data' => $validator->errors()
            ]);
        }

        $dataCelana->merk = $request->merk;
        $dataCelana->ukuran = $request->ukuran;
        $dataCelana->panjang_cm = $request->panjang_cm;

        $dataCelana->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diTambahkan',
            'Data' => $dataCelana
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $celana_id = celana::find($id);
        if ($celana_id) {
            return response()->json([
                'status'=>true,
                'message'=>'Data akan tampil sebagai berikut :',
                'data'=>$celana_id
            ], 200);
        } else {
            return response()->json([
                'status'=>false,
                'message'=>'Gaada Data bang',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataCelana = celana::find($id);
        if (empty($dataCelana)) {
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'merk'=>'required',
            'ukuran'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Data berhasil diUpdate',
                'Data'=>$validator->errors()
            ]);
        }

        $dataCelana->merk = $request->merk;
        $dataCelana->ukuran = $request->ukuran;
        $dataCelana->panjang_cm = $request->panjang_cm;

        $post = $dataCelana->save();
        return response()->json([
            'status'=>true,
            'message'=>'Data Berhasil DiUpdate',
            'Data'=>$post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataCelana = celana::find($id);
        if (empty($dataCelana)) {
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $dataCelana->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Data Berhasil DiHapus',
            'Data'=>$post
        ]);
    }
}
