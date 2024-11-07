<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function destroy(User $user)
{
    // Only an admin can delete users
    if (Auth::user()->role === 'admin') {

        if ($user->photo) {
            // Delete the photo from storage
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }

    return redirect()->route('admin.dashboard')->with('error', 'Unauthorized action.');
}

}
