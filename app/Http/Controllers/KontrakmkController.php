<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kontrakmk;
class KontrakmkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontrakmks = kontrakmk::latest()->paginate(5);
        return view ('kontrakmks.index',compact('kontrakmks'))
        ->with('i',(request()->input('page',1)-1)*5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontrakmks.create');
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
            'mahasiswa_id' => 'required|numeric',
            'semester_id'=> 'required|numeric',
        ]);

        kontrakmk::create($request->all());
        return redirect()->route('kontrakmks.index')
            ->with ('success','Kontrak Matakuliah created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontrakmk = kontrakmk::findOrFail($id);
        return view('kontrakmks.show',['kontrakmk'=>$kontrakmk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontrakmk = kontrakmk::findOrFail($id);
        return view('kontrakmks.edit',['kontrakmk'=>$kontrakmk]);
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
            'mahasiswa_id' => 'required|numeric',
            'semester_id'=> 'required|numeric',
        ]);
        $kontrakmk = kontrakmk::find($id);
        $dataRequest = $request->all();
        $dataResult = array_filter($dataRequest);
        $kontrakmk->update($dataRequest);

        return redirect ('kontrakmks')
        ->with ('success'.'Kontrak Matakuliah updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontrakmk = kontrakmk :: where ('id',$id)->first();
        $kontrakmk -> delete(); return redirect()->route('kontrakmks.index')
        ->with ('success','Kontrak Matakuliah deleted successfully.');
       }
    }
