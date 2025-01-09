<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function index(){
        return view("Landlord.Dashboard");
    }

    public function uploadProperties(){
        return view("Landlord.UploadProperties");
    }

    public function manageProperties(){
        return view("Landlord.ManageProperties");
    }

    public function listTenants(){
        return view("Landlord.ViewTenants");
    }

    public function bookedProperties(){
        return view("Landlord.BookedProperties");
    }
}
