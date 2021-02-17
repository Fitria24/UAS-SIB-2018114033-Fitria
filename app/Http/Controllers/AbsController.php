<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absensi;

class AbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensis = absensi::latest()->paginate(5);
        return view ('absensis.index',compact('absensis'))
        ->with('i',(request()->input('page',1)-1)*5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absensis.create');
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
            'mahasiswa_id' => 'required|numeric',
            'matakuliah_id' => 'required|numeric',
            'keterangan'=>'required',
        ]);

        absensi::create($request->all());
        return redirect()->route('matakuliahs.index')
            ->with ('success','Matakuliah created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absensi = absensi::findOrFail($id);
        return view('absensis.show',['absensi'=>$absensi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absensi = absensi::findOrFail($id);
        return view('absensis.edit',['absensi'=>$absensi]);
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
            'mahasiswa_id' => 'required|numeric',
            'matakuliah_id' => 'required|numeric',
            'keterangan'=>'required',
        ]);

        absensi::update($request->all());
        return redirect()->route('absensis.index')
            ->with ('success','Absensi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absensi = absensi :: where ('id',$id)->first();
        if($absensi){
            return $absensi -> delete();
    }
}
}