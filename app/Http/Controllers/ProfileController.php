<?php

namespace App\Http\Controllers;

use App\Imports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Maatwebsite\Excel\Facades\Excel;

class ProfileController extends Controller
{
    public function view()
    {
        $users = Profile::all();
        return view('User_View', compact('users'));
    }

    public function create()
    {
        return view('Form');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:25',
            'phone' => ['required'],
            'email' => 'required|email|unique:users,email',
            'street_address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|in:CA,NY,AT',
            'country' => 'required|in:IN,US,EU'
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profiles', 'public');
            $validated['profile_image'] = url('/storage/' . $imagePath);
        }

        Profile::create($validated);

        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }


    public function exportCSV()
    {

        return Excel::download(new UsersExport, 'users.csv');
    }

    public function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);
        Excel::import(new UsersImport, $request->file('csv_file'));
        return back()->with('success', 'CSV Imported Successfully.');
    }

    public function delete($id)
    {
        $user = Profile::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    public function edit($id)
    {
        $user = Profile::find($id);
        return view('update_user', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = Profile::find($id);


        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profiles', 'public');
            $user->profile_image = url('/storage/' . $imagePath);
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->street_address = $request->street_address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    //
}
