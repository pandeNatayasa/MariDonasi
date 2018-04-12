<?php

namespace App\Http\Controllers;

use App\galang_dana;
use Illuminate\Http\Request;

class GalangDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('tutorial_galang_dana');
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
     * @param  \App\galang_dana  $galang_dana
     * @return \Illuminate\Http\Response
     */
    public function show(galang_dana $galang_dana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galang_dana  $galang_dana
     * @return \Illuminate\Http\Response
     */
    public function edit(galang_dana $galang_dana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galang_dana  $galang_dana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galang_dana $galang_dana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galang_dana  $galang_dana
     * @return \Illuminate\Http\Response
     */
    public function destroy(galang_dana $galang_dana)
    {
        //
    }
}
