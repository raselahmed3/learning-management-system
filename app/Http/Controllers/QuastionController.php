<?php

namespace App\Http\Controllers;

use App\Models\Quastion;
use Illuminate\Http\Request;

class QuastionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('question.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('question.create');
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
     * @param  \App\Models\Quastion  $quastion
     * @return \Illuminate\Http\Response
     */
    public function show(Quastion $quastion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quastion  $quastion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('question.edit', ['id'=> $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quastion  $quastion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quastion $quastion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quastion  $quastion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quastion $quastion)
    {
        //
    }
}
