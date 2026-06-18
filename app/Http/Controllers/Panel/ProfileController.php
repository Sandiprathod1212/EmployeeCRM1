<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Cloudinary\Cloudinary;

class ProfileController extends Controller
{
    public function index()
    {
        return view('panel.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {

            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => config('services.cloudinary.cloud_name'),
                    'api_key'    => config('services.cloudinary.api_key'),
                    'api_secret' => config('services.cloudinary.api_secret'),
                ],
            ]);

            $uploaded = $cloudinary->uploadApi()->upload(
                $request->file('photo')->getRealPath(),
                [
                    'folder' => 'employee-crm/profile',
                    'public_id' => 'user_' . $user->id . '_' . time(),
                    'overwrite' => true,
                ]
            );

            $photoUrl = $uploaded['secure_url'];

            if ($user->hasRole('employee')) {
                Employee::where('user_id', $user->id)->update([
                    'photo' => $photoUrl,
                ]);
            } else {
                $user->update([
                    'photo' => $photoUrl,
                ]);
            }
        }

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'password');
        }

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()
                ->withErrors([
                    'current_password' => 'Current password is incorrect'
                ])
                ->withInput()
                ->with('active_tab', 'password');
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()
            ->route('profile.index')
            ->with('success', 'Password updated successfully')
            ->with('active_tab', 'profile');
    }
}
