<?php

namespace App\Http\Controllers;

use App\Models\Street;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStreetRequest;
use App\Http\Requests\UpdateStreetRequest;

class StreetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $street = []
        $streets = Street::paginate(4);
        return view('streets.index')->with('streets', $streets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('streets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreStreetRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStreetRequest $request)
    {
        $street = new Street();
        $street->fill($request->validated());
        $street->save();
        return view('streets.show')->with('street', $street);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Street $street
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Street $street)
    {
        return view('streets.show')->with('street', $street);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Street $street
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Street $street)
    {
        return view('streets.edit')->with('street', $street);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateStreetRequest $request
     * @param \App\Models\Street                     $street
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStreetRequest $request, Street $street)
    {
        $street->fill($request->validated());
        $street->save();
        return view('streets.show')->with('street', $street);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Street $street
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Street $street)
    {
        $street->delete();
        return redirect()->action([StreetController::class, 'index']);
    }
}
