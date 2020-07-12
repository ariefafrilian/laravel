<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Sentinel;
use DataTables;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (string) view('layouts.partials._form-user')->render();
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
            'nip' => 'required|string|max:191|unique:users,nip',
            'email' => 'required|string|email|max:191|unique:users,email',
            'password' => 'required|string|max:191',
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'gender' => 'required|ends_with:M,F',
            'city' => 'required|string|max:191',
            'birth' => 'required|date',
            'address' => 'required|string|max:191',
            'photo' => 'sometimes|file|image|max:1000'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->photo->store('public/employee');
            $data['photo'] = Str::of($photo)->substr(16);
        }

        $user = Sentinel::registerAndActivate($data);

        $role = Sentinel::findRoleBySlug('employee');
        $role->users()->attach($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return (string) view('layouts.partials._show-user', compact('user'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return (string) view('layouts.partials._form-user', compact('user'))->render();
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
        $user = User::findOrFail($id);

        $data = $request->validate([
            'nip' => 'required|string|max:191|unique:users,nip,' . $user->id,
            'email' => 'required|string|email|max:191|unique:users,email,' .$user->id,
            'password' => 'required|string|max:191',
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'gender' => 'required|ends_with:M,F',
            'city' => 'required|string|max:191',
            'birth' => 'required|date',
            'address' => 'required|string|max:191',
            'photo' => 'sometimes|file|image|max:1000'
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo != '0') {
                Storage::delete('public/employee/'.$user->photo);
            }

            $photo = $request->photo->store('public/employee');
            $data['photo'] = Str::of($photo)->substr(16);
        } else {
            $data['photo'] = $user->photo;
        }

        $user->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        Storage::delete('public/employee/'.$user->photo);
        $user->delete();
    }

    public function deletePhotoUser($id) {
        $user = User::findOrFail($id);

        Storage::delete('public/employee/'.$user->photo);
        
        $user->update([
            'photo' => '0'
        ]);
    }

    public function usersDataTables()
    {
        $users = User::query();

        return DataTables::of($users)
                ->editColumn('gender', function ($users) {
                    return $users->gender == 'M' ? 'Male' : 'Female';
                })
                ->addColumn('action', function ($users) {
                    return (string) view('layouts.partials._action-inventorie-user', compact('users'))->render();
                })
                ->addIndexColumn()
                ->rawColumns(['nip', 'action'])
                ->make(true);
    }
}
