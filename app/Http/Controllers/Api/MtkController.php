<?php

namespace App\Http\Controllers\Api;
use App\Models\matakuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MtkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliahs = matakuliah::orderBy ('id','desc')->paginate (3);
        
        return response () ->json([
            'success'=> true,
            'message'=> 'Daftar Matakuliah',
            'data'=> $matakuliahs
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_matakuliah'=>'required',
            'sks'=>'required|numeric',
        ]);
        
        $matakuliahs = matakuliah::create([
            'nama_matakuliah'=>$request->nama_matakuliah,
            'sks'=>$request->sks
        ]);
        if($matakuliahs)
        {
            return response()->json([
                'success' => true,
                'message' =>'Matakuliah berhasil di tambah',
                'data' => $matakuliahs
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'Matakuliah gagal di tambah',
                'data' => $matakuliahs
            ],409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matakuliah = matakuliah::where('id',$id)->first();
            return response()->json([
                'success'=> true,
                'message'=> 'Detail Data Matakuliah',
                'data' => $matakuliah
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matakuliah'=>'required',
            'sks'=>'required|numeric',
        ]);
        $mk = matakuliah::find($id)->update([
            'nama_matakuliah'=>$request->nama_matakuliah,
            'sks'=>$request->sks
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $mk
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = matakuliah::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $cek
        ],200);
    }
}
