<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandlordController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view("Landlord.Dashboard");
        } else {
            return view('auth.login');
        }

    }

    public function uploadProperties()
    {
        return view("Landlord.UploadProperties");
    }

    public function manageProperties()
    {
        return view("Landlord.ManageProperties");
    }

    public function listTenants()
    {
        return view("Landlord.ViewTenants");
    }

    public function bookedProperties()
    {
        return view("Landlord.BookedProperties");
    }

    public function myProfile()
    {
        return view("Landlord.MyProfile");
    }

    public function updateProfile(Request $request)
    {
        $isProfileUpdated = DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'property_address' => $request->property_address,
                'property_type' => $request->property_type
            ]);

        if ($isProfileUpdated) {
            toastr()->success('Updated!');
            return redirect()->back();
        } else {
            toastr()->info('No changes detected');
            return redirect()->back();
        }
    }
}
