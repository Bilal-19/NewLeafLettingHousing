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

    public function About(){
        return view('Tenant.About');
    }

    public function CSR(){
        return view('Tenant.CSR');
    }

    public function Landlords(){
        return view('Tenant.Landlords');
    }

    public function FAQs(){
        return view('Tenant.FAQs');
    }

    public function Contact(){
        return view('Tenant.Contact');
    }

    public function submitInquiry(Request $request){
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

        if ($isInquiryCreated){
            toastr()->success("We've received your information. Our team will contact you soon");
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }
    public function Properties(){
        return view('Tenant.Properties');
    }
}
