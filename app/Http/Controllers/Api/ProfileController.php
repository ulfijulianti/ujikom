<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile information.
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): JsonResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        // Set email_verified_at ke null jika email berubah
        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Proses upload gambar jika ada
        if ($request->hasFile('profile_image')) {
            // Hapus gambar lama jika ada
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }

            // Simpan gambar baru ke dalam storage
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path; // Simpan path gambar
        }

        $user->save();

        return response()->json(['message' => 'Profile updated successfully.', 'data' => $user]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): JsonResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Hapus user
        $user->delete();

        return response()->json(['message' => 'User account deleted successfully.']);
    }
}
