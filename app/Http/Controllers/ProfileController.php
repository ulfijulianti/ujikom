<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk menyimpan gambar
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        // Set email_verified_at ke null jika email berubah
        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Proses upload gambar jika ada
       // Proses upload gambar jika ada
if ($request->hasFile('profile_image')) {
    // Hapus gambar lama jika ada
    if ($user->profile_image) {
        Storage::delete('public/' . $user->profile_image); // Pastikan ini sesuai dengan path yang Anda simpan
    }

    // Simpan gambar baru ke dalam storage
    $path = $request->file('profile_image')->store('profile_images', 'public');
    $user->profile_image = $path; // Simpan path gambar
}


        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
