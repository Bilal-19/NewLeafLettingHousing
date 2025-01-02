<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function Properties(){
        return view('Tenant.Properties');
    }
}
