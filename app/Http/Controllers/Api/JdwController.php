<?php

namespace App\Http\Controllers\Api;
use App\Models\jadwal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JdwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = jadwal::orderBy ('id','desc')->paginate (3);
        
        return response () ->json([
            'success'=> true,
            'message'=> 'Daftar Jadwal',
            'data'=> $jadwals
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
            'jadwal'=>'required',
            'matakuliah_id'=>'required|numeric',
    
        ]);
        
        $jadwals = jadwal::create([
            'jadwal'=>$request->jadwal,
            'matakuliah_id'=>$request->matakuliah_id
           
        ]);
        if($jadwals)
        {
            return response()->json([
                'success' => true,
                'message' =>'Jadwal berhasil di tambah',
                'data' => $jadwals
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'Jadwal gagal di tambah',
                'data' => $jadwals
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
        $jadwal = jadwal::where('id',$id)->first();
            return response()->json([
                'success'=> true,
                'message'=> 'Detail Data Jadwal',
                'data' => $jadwal
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
            'jadwal'=>'required',
            'matakuliah_id'=>'required|numeric',
        ]);
        $jd = jadwal::find($id)->update([
            'jadwal'=>$request->jadwal,
            'matakuliah_id'=>$request->matakuliah_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $jd
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
        $cek = jadwal::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $cek
        ],200);
    }
}
