<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DataTables;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (string) view('layouts.partials._form-customer')->render();
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
            'code' => 'required|string|max:191|unique:customers,code',
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'gender' => 'required|ends_with:M,F',
            'city' => 'required|string|max:191',
            'birth' => 'required|date',
            'address' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:customers,email',
            'phone' => 'required|digits:12|unique:customers,phone',
            'photo' => 'sometimes|file|image|max:1000'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->photo->store('public/customer');
            $data['photo'] = Str::of($photo)->substr(16);
        }

        Customer::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return (string) view('layouts.partials._show-customer', compact('customer'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return (string) view('layouts.partials._form-customer', compact('customer'))->render();
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
        $customer = Customer::findOrFail($id);

        $data = $request->validate([
            'code' => 'required|string|max:191|unique:customers,code,' . $customer->id,
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'gender' => 'required|ends_with:M,F',
            'city' => 'required|string|max:191',
            'birth' => 'required|date',
            'address' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:customers,email,' . $customer->id,
            'phone' => 'required|digits:12|unique:customers,phone,' . $customer->id,
            'photo' => 'sometimes|file|image|max:1000'
        ]);

        if ($request->hasFile('photo')) {
            if ($customer->photo != '0') {
                Storage::delete('public/customer/'.$customer->photo);
            }

            $photo = $request->photo->store('public/customer');
            $data['photo'] = Str::of($photo)->substr(16);
        } else {
            $data['photo'] = $customer->photo;
        }

        $customer->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrfail($id);
        Storage::delete('public/customer/'.$customer->photo);
        $customer->delete();
    }

    public function deletePhotoCustomer($id) {
        $customer = Customer::findOrFail($id);

        Storage::delete('public/customer/'.$customer->photo);
        
        $customer->update([
            'photo' => '0'
        ]);
    }

    public function customersDataTables()
    {
        $customers = Customer::query();

        return DataTables::of($customers)
                ->editColumn('code', function ($customers) {
                    return '<a href="' . url('customers/' . $customers->id) . '" class="btn-show">' . $customers->code . '</a>';
                })
                ->addColumn('action', function ($customers) {
                    return (string) view('layouts.partials._action-customer-gift', compact('customers'))->render();
                })
                ->addIndexColumn()
                ->rawColumns(['code', 'action'])
                ->make(true);
    }
}
