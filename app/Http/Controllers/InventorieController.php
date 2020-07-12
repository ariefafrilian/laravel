<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DataTables;
use App\Inventorie;

class InventorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventorie.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (string) view('layouts.partials._form-item')->render();
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
            'serial' => 'required|string|max:191|unique:inventories,serial',
            'description' => 'required|string|max:191',
            'price' => 'required|integer',
            'photo' => 'sometimes|file|image|max:1000'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->photo->store('public/product');
            $data['photo'] = Str::of($photo)->substr(15);
        }

        Inventorie::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Inventorie::findOrFail($id);
        return (string) view('layouts.partials._show-inventorie', compact('item'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Inventorie::findOrFail($id);
        return (string) view('layouts.partials._form-item', compact('item'))->render();
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
        $item = Inventorie::findOrfail($id);

        $data = $request->validate([
            'name' => 'required|string|max:191',
            'serial' => 'required|string|max:191|unique:inventories,serial,' . $item->id,
            'description' => 'required|string|max:191',
            'price' => 'required|integer',
            'photo' => 'sometimes|file|image|max:1000'
        ]);

        if ($request->hasFile('photo')) {
            if ($item->photo != '0') {
                Storage::delete('public/product/'.$item->photo);
            }

            $photo = $request->photo->store('public/product');
            $data['photo'] = Str::of($photo)->substr(15);
        } else {
            $data['photo'] = $item->photo;
        }

        $item->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Inventorie::findOrfail($id);
        Storage::delete('public/product/'.$item->photo);
        $item->delete();
    }

    public function deletePhotoProduct($id) {
        $item = Inventorie::findOrFail($id);

        Storage::delete('public/product/'.$item->photo);
        
        $item->update([
            'photo' => '0'
        ]);
    }

    public function inventoriesDataTables()
    {
        $inventories = Inventorie::query();

        return DataTables::of($inventories)
                ->editColumn('price', function ($inventories) {
                    return 'Rp. ' . number_format($inventories->price, 0, ',', '.');
                })
                ->addColumn('action', function ($inventories) {
                    return (string) view('layouts.partials._action-inventorie-user', compact('inventories'))->render();
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
    }
}
