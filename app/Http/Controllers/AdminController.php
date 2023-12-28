<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    /**
     * Destroy an authenticated session.
     */
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        // update field data
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        // delete previous profile picture and update profile photo
        if ($request->file('photo'))
        {
            if(!empty($data->photo))
            {
                unlink(public_path('upload/admin_images/').$data->photo);
            }

            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AdminPasswordChange()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_password_change', compact('profileData'));
    }

    public function AdminPasswordUpdate(Request $request)
    {
        // Check if the old password matches the current password
        if (!Hash::check($request->old_password, Auth::user()->password)){
            return redirect()->back()->withErrors(['old_password' => 'The old password does not match.']);
        }

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required'
        ]);

        // Update password
        Auth()->user()->update([
            'password' => bcrypt($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
}
