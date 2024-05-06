<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

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

        $notification = array(
            'message' => 'Successfully Logout',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
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

            // $fileName = date('YmdHi') . $file->getClientOriginalName();
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
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

    /**
     * Show Change Password page
     */
    public function change_pwd(){
        return view('admin.admin_change_pwd');
    }
    /**
     * Show Change Password page
     */
    public function change_pwd_store(Request $request){
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $notification = array(
            'message' => 'Password has been changed Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

}
