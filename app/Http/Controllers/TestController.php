<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('test', ['quote' => "Nothing worth having comes easy. - Theodore Roosevelt "]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('test', ['quote' => "This is from create route..."]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('test', ['quote' => "This is from store route..."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('test', ['quote' => "This is from show route..."]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('test', ['quote' => "This is from edit route..."]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('test', ['quote' => "This is from update route..."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('test', ['quote' => "This is from destroy route..."]);
    }
}
