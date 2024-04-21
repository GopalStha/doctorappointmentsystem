<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public  function index()
    {
        return view('profile.index');
    }

    public  function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
        ]);
        User::where('id', auth()->user()->id)
            ->update($request->except('_token'));

        return redirect()->back()->with('message', 'Profile updated successfully!');
    }

    public function profilePic(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg']
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/profile');
            $image->move($destination, $name);

            User::where('id', auth()->user()->id)->update((['image' => $name]));

            return redirect()->back()->with('message', 'Profile updated successfully!');
        }
    }

    public function myPrescriptions()
    {
        $prescriptions = Prescription::where('user_id', auth()->user()->id)->get();
        return view('my-prescriptions', compact('prescriptions'));
    }
}
