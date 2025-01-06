<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('Admin.Dashboard');
    }

    public function Services()
    {
        $fetchAllServices = DB::table('services')->get();
        return view('Admin.Services', with(compact('fetchAllServices')));
    }

    public function AddService()
    {
        return view('Admin.AddService');
    }

    public function createService(Request $request)
    {
        // Form Validation
        $request->validate([
            'serviceIcon' => 'required|file',
            'serviceName' => 'required',
            'serviceDescription' => 'required'
        ]);

        // Create Image Timestamp
        $timeStampImg = time() . '.' . $request->serviceIcon->getClientOriginalExtension();

        $isCreated = DB::table('services')->insert([
            'icon' => $timeStampImg,
            'service_name' => $request->serviceName,
            'service_description' => $request->serviceDescription
        ]);

        // Store Image to Public folder
        $request->serviceIcon->move('Services', $timeStampImg);

        if ($isCreated) {
            toastr()->success("New Service Added Successfully");
            return redirect()->back();
        }
    }

    public function editService($id)
    {
        $findService = DB::table('services')->find($id);
        return view('Admin.EditService', with(compact('findService')));
    }

    public function updateService(Request $request, $id)
    {

        $request->validate([
            'serviceName' => 'required',
            'serviceDescription' => 'required'
        ]);

        // Check If User Upload an Image
        if ($request->file('serviceIcon')) {
            $timeStampImg = time() . '.' . $request->serviceIcon->getClientOriginalExtension();
            $request->serviceIcon->move('Services', $timeStampImg);
        } else {
            $isIconExist = DB::table('services')
                ->select('icon')
                ->where('id', '=', $id)
                ->first();
            $timeStampImg = $isIconExist->icon ?? null;
        }
        $isUpdated = DB::table('services')
            ->where('id', $id)
            ->update([
                'icon' => $timeStampImg,
                'service_name' => $request->serviceName,
                'service_description' => $request->serviceDescription
            ]);

        if ($isUpdated) {
            toastr()->success('Service record updated successfully');
            return redirect()->back();
        } else {
            toastr()->error('Failed to update record');
            return redirect()->back();
        }
    }

    public function deleteService($id)
    {
        $isDeleted = DB::table('services')->where('id', $id)->delete();

        if ($isDeleted) {
            toastr()->success("Record deleted successfully");
            return redirect()->back();
        }
    }

    public function Tenants()
    {
        return view('Admin.Tenants');
    }

    public function Landlords()
    {
        return view('Admin.Landlords');
    }

    public function Stories()
    {
        $fetchAllStories = DB::table('stories')->get();
        return view('Admin.Stories', with(compact('fetchAllStories')));
    }

    public function AddStory()
    {
        return view('Admin.AddStory');
    }

    public function createStory(Request $request)
    {
        // Form Validation
        $request->validate([
            'thumbnailImg' => 'required|file',
            'headline' => 'required',
            'content' => 'required'
        ]);

        // Created image timestamp
        $timeThumbnailImg = time() . '.' . $request->thumbnailImg->getClientOriginalExtension();

        // Move Image to Public folder
        $request->thumbnailImg->move('Story', $timeThumbnailImg);

        $isStoryCreated = DB::table('stories')->insert([
            'thumbnail_image' => $timeThumbnailImg,
            'headline' => $request->headline,
            'content' => $request->content
        ]);

        if ($isStoryCreated) {
            toastr()->success('New Story Publish Successfully');
            return redirect()->back();
        } else {
            toastr()->error('Something Went Wrong!');
            return redirect()->back();
        }
    }

    public function BookProperties()
    {
        return view('Admin.BookProperties');
    }

    public function Testimonials()
    {
        return view('Admin.Testimonials');
    }

    public function FAQs()
    {
        return view('Admin.FAQs');
    }

    public function TeamMembers()
    {
        return view('Admin.TeamMember');
    }

    public function PartnerCompanies()
    {
        return view("Admin.Partnership");
    }

    public function CustomerQueries()
    {
        return view('Admin.CustomerQueries');
    }
}
