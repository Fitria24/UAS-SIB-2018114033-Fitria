<?php

namespace App\Http\Controllers\Api;
use App\Models\mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = mahasiswa::orderBy ('id','desc')->paginate (3);
        
        return response () ->json([
            'success'=> true,
            'message'=> 'Data Mahasiswa',
            'data'=> $mahasiswas
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
            'nama_mahasiswa'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required|numeric',
            'email'=>'required'
        ]);
        
        $mahasiswas = mahasiswa::create([
            'nama_mahasiswa'=>$request->nama_mahasiswa,
            'alamat'=>$request->alamat,
            'no_tlp'=>$request->no_tlp,
            'email'=>$request->email
        ]);
        if($mahasiswas)
        {
            return response()->json([
                'success' => true,
                'message' =>'Mahasiswa berhasil di tambah',
                'data' => $mahasiswas
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'Mahasiswa gagal di tambah',
                'data' => $mahasiswas
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
        $mahasiswa = mahasiswa::where('id',$id)->first();
        return response()->json([
            'success'=> true,
            'message'=> 'Detail Data Mahasiswa',
            'data' => $mahasiswa
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
            'nama_mahasiswa'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required|numeric',
            'email'=>'required'
        ]);
        $mh = mahasiswa::find($id)->update([
            'nama_mahasiswa'=>$request->nama_mahasiswa,
            'alamat'=>$request->alamat,
            'no_tlp'=>$request->no_tlp,
            'email'=>$request->email
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $mh
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
        $cek = mahasiswa::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $cek
        ],200);
    }
}
