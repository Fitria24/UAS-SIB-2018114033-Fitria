<?php

namespace App\Http\Controllers\Api;
use App\Models\kontrakmk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontrakmkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontrakmks = kontrakmk::orderBy ('id','desc')->paginate (3);
        
        return response () ->json([
            'success'=> true,
            'message'=> 'Daftar Kontrak Matakuliah',
            'data'=> $kontrakmks
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
            
            'mahasiswa_id'=>'required|numeric',
            'semester_id'=>'required|numeric',
           
        ]);
        
        $kontrakmks = kontrakmk::create([
            'mahasiswa_id'=>$request->mahasiswa_id,
            'semester_id'=>$request->semester_id
           
        ]);
        if($kontrakmks)
        {
            return response()->json([
                'success' => true,
                'message' =>'Kontrak Matakuliah berhasil di tambah',
                'data' => $kontrakmks
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'Barang gagal di tambah',
                'data' => $kontrakmks
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
        $kontrakmk = kontrakmk::where('id',$id)->first();
        return response()->json([
            'success'=> true,
            'message'=> 'Detail Data Kontrak Matakuliah',
            'data' => $kontrakmk
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
            'mahasiswa_id'=>'required|numeric',
            'semester_id'=>'required|numeric',
        ]);
        $km = kontakmk::find($id)->update([
            'mahasiswa_id'=>$request->mahasiswa_id,
            'semester_id'=>$request->semester_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $km
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
        $cek = kontrakmk::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $cek
        ],200);
    }
}
