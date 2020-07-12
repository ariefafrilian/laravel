<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DataTables;
use App\Gift;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gift.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (string) view('layouts.partials._form-gift')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'serial' => 'required|string|max:191|unique:gifts,serial',
            'description' => 'required|string|max:191',
            'points' => 'required|integer',
            'photo' => 'sometimes|file|image|max:1000'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->photo->store('public/gift');
            $data['photo'] = Str::of($photo)->substr(12);
        }

        Gift::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gift = Gift::findOrFail($id);
        return (string) view('layouts.partials._show-gift', compact('gift'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gift = Gift::findOrFail($id);
        return (string) view('layouts.partials._form-gift', compact('gift'))->render();
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
        $gift = Gift::findOrfail($id);

        $data = $request->validate([
            'name' => 'required|string|max:191',
            'serial' => 'required|string|max:191|unique:inventories,serial,' . $gift->id,
            'description' => 'required|string|max:191',
            'points' => 'required|integer',
            'photo' => 'sometimes|file|image|max:1000'
        ]);

        if ($request->hasFile('photo')) {
            if ($gift->photo != '0') {
                Storage::delete('public/gift/'.$gift->photo);
            }

            $photo = $request->photo->store('public/gift');
            $data['photo'] = Str::of($photo)->substr(12);
        } else {
            $data['photo'] = $gift->photo;
        }

        $gift->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift = Gift::findOrfail($id);
        Storage::delete('public/gift/'.$gift->photo);
        $gift->delete();
    }

    public function deletePhotoGift($id) {
        $gift = Gift::findOrFail($id);

        Storage::delete('public/gift/'.$gift->photo);
        
        $gift->update([
            'photo' => '0'
        ]);
    }

    public function giftsDataTables()
    {
        $gifts = Gift::query();

        return DataTables::of($gifts)
                ->addColumn('action', function ($gifts) {
                    return (string) view('layouts.partials._action-customer-gift', compact('gifts'))->render();
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
    }
}
