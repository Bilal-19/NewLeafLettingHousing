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

    public function createProperties(Request $request)
    {
        // Form Validation
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'property_type' => 'required',
            'property_status' => 'required',
            'rent' => 'required',
            'description' => 'required',
            'features' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'receptions' => 'required',
            'thumbnail' => 'required|file|image',
            'images.*' => 'required|file'
        ]);

        // Create timestamp of thumbnail image
        $timestampThumbnail = time() . '.' . $request->thumbnail->getClientOriginalExtension();

        // Move thumbnail image to public folder
        $request->thumbnail->move("Properties/Thumbnail", $timestampThumbnail);

        // Multiple Images - Create timestamp and store it into public folder
        $image = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'Properties/Images/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }

        $isRecordCreated = DB::table('properties')->insert([
            'property_name' => $request->name,
            'property_address' => $request->address,
            'property_type' => $request->property_type,
            'property_status' => $request->property_status,
            'monthly_rent' => $request->rent,
            'property_description' => $request->description,
            'property_features' => $request->features,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'reception' => $request->receptions,
            'property_thumbnail' => $timestampThumbnail,
            'property_images' => implode('|', $image),
            'user_id' => Auth::user()->id
        ]);

        if ($isRecordCreated) {
            toastr()->success('Property added successfully');
            return redirect()->back();
        } else {
            toastr()->error('Something went wrong.');
            return redirect()->back();
        }

    }

    public function manageProperties()
    {
        $fetchAllProperties = DB::table('properties')->get();
        return view("Landlord.ManageProperties", with(compact('fetchAllProperties')));
    }

    public function viewDetailProperty($id)
    {
        $findProperty = DB::table('properties')->find($id);
        return view('Landlord.ViewPropertyDetails', with(compact('findProperty')));
    }

    public function togglePropertyStatus($id)
    {
        $findProperty = DB::table('properties')->where('id', '=', $id)->first();

        if ($findProperty->property_status == 'Available') {
            DB::table('properties')
                ->where('id', '=', $id)
                ->update([
                    'property_status' => 'Rented'
                ]);
        } else {
            DB::table('properties')
                ->where('id', '=', $id)
                ->update([
                    'property_status' => 'Available'
                ]);
        }

        toastr()->success('Property status updated');
        return redirect()->back();
    }

    public function editProperty($id)
    {
        $findProperty = DB::table('properties')->find($id);
        return view('Landlord.EditProperty', with(compact('findProperty')));
    }

    public function updateProperty(Request $request, $id)
    {
        $findProperty = DB::table('properties')->find($id);

        // Form Validation
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'property_type' => 'required',
            'property_status' => 'required',
            'rent' => 'required',
            'description' => 'required',
            'features' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'receptions' => 'required'
        ]);

        if ($request->file('thumbnail')) {
            // Create timestamp of thumbnail image
            $timestampThumbnail = time() . '.' . $request->thumbnail->getClientOriginalExtension();

            // Move thumbnail image to public folder
            $request->thumbnail->move("Properties/Thumbnail", $timestampThumbnail);
        } else {
            $findPropertyThumbnail = DB::table('properties')->select('property_thumbnail')->first();
            $timestampThumbnail = $findPropertyThumbnail->property_thumbnail;
        }


        // Multiple Images - Create timestamp and store it into public folder
        $image = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'Properties/Images/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        } else {
            $image = explode("|", $findProperty->property_images);
        }

        $isRecordUpdated = DB::table('properties')
            ->where('id', '=', $id)
            ->update([
                'property_name' => $request->name,
                'property_address' => $request->address,
                'property_type' => $request->property_type,
                'property_status' => $request->property_status,
                'monthly_rent' => $request->rent,
                'property_description' => $request->description,
                'property_features' => $request->features,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'reception' => $request->receptions,
                'property_thumbnail' => $timestampThumbnail,
                'property_images' => implode('|', $image),
                'user_id' => Auth::user()->id
            ]);

        if ($isRecordUpdated) {
            toastr()->success('Property updated successfully');
            return redirect()->back();
        } else {
            toastr()->error('No changes detected.');
            return redirect()->back();
        }
    }

    public function deleteProperty($id)
    {
        $isPropertyDeleted = DB::table('properties')
            ->where('id', '=', $id)
            ->delete();

        if ($isPropertyDeleted) {
            toastr()->success('Property deleted successfully!');
            return redirect()->back();
        } else {
            toastr()->success('Something went wrong. Please try again later.');
            return redirect()->back();
        }
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

    public function SingOut()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('Landlords');
        }
    }
}
