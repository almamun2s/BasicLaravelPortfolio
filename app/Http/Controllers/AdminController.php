<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Show Admin profile 
     */
    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile', compact('adminData'));
    }

    /**
     * Edit Admin profile
     */
    public function profile_edit()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_edit', compact('adminData'));
    }

    /**
     * Store Admin Profile Data
     */
    public function profile_store(Request $request)
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        $adminData->name = $request->name;
        $adminData->email = $request->email;

        if ($request->file('profile_pic')) {
            $file = $request->file('profile_pic');

            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/admin_profile_pic'), $fileName);

            $adminData->profile_pic = $fileName;
        }
        $adminData->save();

        $notification = array(
            'message' => 'Admin Prorile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

}
