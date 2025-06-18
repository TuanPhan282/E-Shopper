<?php

namespace App\Http\Controllers;

use App\Models\CauThu;
use App\Http\Requests\InsertRequest;
use Illuminate\Http\Request;

class CauThuController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth'); 
    }

    public function list()
    {
        $data = CauThu::all();
        return view('cau-thu/list-cau-thu', compact('data'));
    }

    public function getInsert() // thêm user
    {
        return view('cau-thu/insert-cau-thu');
    }
    public function postInsert( InsertRequest $request)
    {
        $data = $request->all();
        if(CauThu::create($data)){
            return redirect('list-cau-thu');
        }else{
            return redirect('list-cau-thu');
        }
    }


    public function getEdit(string $id) //sửa người dùng
    {
        $data = CauThu::where('id',$id)->get();
        return view('cau-thu/edit-cau-thu', compact('data'));
    }
    public function postEdit( InsertRequest $request)
    {
        $cauThu = CauThu::findOrFail($request->id);
        $data = $request->all();

        if($cauThu->update($data)){
            return redirect('list-cau-thu');
        }else{
            return redirect('list-cau-thu');
        }
    }


    public function getDelete(string $id) //xóa người dùng
    {
        CauThu::where('id',$id)->delete();
        return redirect('/list-cau-thu');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CauThu $cauThu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CauThu $cauThu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CauThu $cauThu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CauThu $cauThu)
    {
        //
    }
}
