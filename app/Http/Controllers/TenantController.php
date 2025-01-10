<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    public function index()
    {
        return view('Tenant.LandingPage');
    }

    public function About()
    {
        return view('Tenant.About');
    }

    public function CSR()
    {
        return view('Tenant.CSR');
    }

    public function Landlords()
    {
        return view('Tenant.Landlords');
    }

    public function FAQs()
    {
        return view('Tenant.FAQs');
    }

    public function Contact()
    {
        return view('Tenant.Contact');
    }

    public function submitInquiry(Request $request)
    {
        // Form Validation
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required',
            'message' => 'required'
        ]);

        $isInquiryCreated = DB::table('inquiry')->insert([
            'full_name' => $request->fullName,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'message' => $request->message
        ]);

        if ($isInquiryCreated) {
            toastr()->success("We've received your information. Our team will contact you soon");
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }
    public function Properties(Request $request)
    {
        $searchVal = $request->search ?? "";

        if ($searchVal != "") {
            $fetchAvailableProperties = DB::table('properties')
                ->where('property_status', '=', "Available")
                ->where('property_name', 'LIKE', "%$searchVal%")
                ->orWhere('monthly_rent', '>=', $searchVal)
                ->orWhere('monthly_rent', '>=', $searchVal)
                ->orWhere('property_features', 'LIKE', "%$searchVal%")
                ->get();
            return view('Tenant.Properties', with(compact('fetchAvailableProperties')));

        } else {
            $fetchAvailableProperties = DB::table('properties')
                ->where('property_status', '=', 'Available')
                ->get();
            return view('Tenant.Properties', with(compact('fetchAvailableProperties')));

        }
    }

    public function viewDetailProperty($id){
        $findProperty = DB::table('properties')->find($id);
        $fetchPropertyImages = explode("|", $findProperty->property_images);

        return view('Tenant.ViewProperty', with(compact('findProperty', 'fetchPropertyImages')));
    }
}
