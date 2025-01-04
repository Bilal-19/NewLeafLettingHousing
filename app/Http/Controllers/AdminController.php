<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('Admin.Dashboard');
    }

    public function Services(){
        return view('Admin.Services');
    }

    public function Tenants(){
        return view('Admin.Tenants');
    }

    public function Landlords(){
        return view('Admin.Landlords');
    }

    public function Stories(){
        return view('Admin.Stories');
    }

    public function BookProperties(){
        return view('Admin.BookProperties');
    }

    public function Testimonials(){
        return view('Admin.Testimonials');
    }

    public function FAQs(){
        return view('Admin.FAQs');
    }

    public function TeamMembers(){
        return view('Admin.TeamMember');
    }

    public function PartnerCompanies(){
        return view("Admin.Partnership");
    }

    public function CustomerQueries(){
        return view('Admin.CustomerQueries');
    }
}
