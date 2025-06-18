<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\RegisterUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRegister()
    {
        $countries = Country::all();

        return view('client/register', compact('countries'));
    }

    

    public function postRegister(RegisterUserRequest $request)
    {
        $data = $request->all();
        $file = $request->avatar;

        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }

        if(User::create($data)){
            if(!empty($file)){
                    $file->move('upload/avatar', $file->getClientOriginalName());
                }
            return redirect('register-user');
        }else{
            return redirect('register-user');
        }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
