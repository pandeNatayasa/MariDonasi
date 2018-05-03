<?php

namespace App\Http\Controllers;

use App\rek_user;
use Illuminate\Http\Request;

class RekUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viewProfileUser.dompetKebaikan');
    }

    public function showFormPencairan()
    {
        return view('viewProfileUser.dompetKebaikanPencairan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rek_user  $rek_user
     * @return \Illuminate\Http\Response
     */
    public function show(rek_user $rek_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rek_user  $rek_user
     * @return \Illuminate\Http\Response
     */
    public function edit(rek_user $rek_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rek_user  $rek_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rek_user $rek_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rek_user  $rek_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(rek_user $rek_user)
    {
        //
    }
}
