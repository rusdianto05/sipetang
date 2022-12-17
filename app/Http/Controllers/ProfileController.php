<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required'],
            'gender' => ['required'],
            'person_id' => ['required'],
            'family_id' => ['required'],
            'address' => ['required'],
            'citizenship' => ['required'],
            'religion' => ['required'],
            'blood_group' => ['required'],
            'married_status' => ['required'],
            'job' => ['required'],
            'last_education' => ['required'],
            'place_of_birth' => ['required'],
            'date_of_birth' => ['required'],
        ]);

        $user = User::findorfail(Auth::user()->id);
        $user->update($request->all());
        return redirect()->route('home')->with('success', 'Profile updated successfully');
    }
}
