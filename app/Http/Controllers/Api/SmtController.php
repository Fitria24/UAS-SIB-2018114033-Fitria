<?php

namespace App\Http\Controllers\Api;
use App\Models\semester;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = semester::orderBy ('id','desc')->paginate (3);
        
        return response () ->json([
            'success'=> true,
            'message'=> 'Daftar Barang',
            'data'=> $semesters
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
            
            'semester'=>'required|numeric',
           
        ]);
        
        $semesters = semester::create([
            'semester'=>$request->semester
            
        ]);
        if($semesters)
        {
            return response()->json([
                'success' => true,
                'message' =>'Semester berhasil di tambah',
                'data' => $semesters
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'Semester gagal di tambah',
                'data' => $semesters
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
        $semester = semesters::where('id',$id)->first();
        return response()->json([
            'success'=> true,
            'message'=> 'Detail Data Semester',
            'data' => $semester
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
            
            'semester'=>'required|numeric',
            
        ]);
        $sm = semester::find($id)->update([
            'nama_barang'=>$request->semester
           
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $sm
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
        $cek = semester::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $cek
        ],200);
    }
}
