<?php

namespace App\Http\Controllers\Api;
use App\Models\absensi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensis = absensi::orderBy ('id','desc')->paginate (3);
        
        return response () ->json([
            'success'=> true,
            'message'=> 'Daftar Absensi',
            'data'=> $absensis
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
            'waktu_absen'=>'required',
            'mahasiswa_id'=>'required|numeric',
            'matakuliah_id'=>'required|numeric',
            'keterangan'=>'required'
        ]);
        
        $absensis = absensi::create([
            'waktu_absen'=>$request->waktu_absen,
            'mahasiswa_id'=>$request->mahasiswa_id,
            'matakuliah_id'=>$request->matakuliah_id,
            'keterangan'=>$request->keterangan
        ]);
        if($absensis)
        {
            return response()->json([
                'success' => true,
                'message' =>'Absensi berhasil di tambah',
                'data' => $absensis
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'Absensi gagal di tambah',
                'data' => $absensis
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
         $absensi = absensi::where('id',$id)->first();
            return response()->json([
                'success'=> true,
                'message'=> 'Detail Data Absensi',
                'data' => $absensi
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
            'waktu_absen'=>'required',
            'mahasiswa_id'=>'required|numeric',
            'matakuliah_id'=>'required|numeric',
            'keterangan'=>'required'
        ]);
        $ab = absensi::find($id)->update([
            'waktu_absen'=>$request->waktu_absen,
            'mahasiswa_id'=>$request->mahasiswa_id,
            'matakuliah_id'=>$request->matakuliah_id,
            'keterangan'=>$request->keterangan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $ab
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
        $cek = absensi::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $cek
        ],200);
    }
}
