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
            $fetchRecord = DB::table('services')
                ->where('id', '=', $id)
                ->first();
            $timeStampImg = $fetchRecord->icon;
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

    public function editStory($id)
    {
        $findStory = DB::table('stories')->find($id);
        return view('Admin.EditStory', with(compact('findStory')));
    }

    public function updateStory(Request $request, $id)
    {

        // Check If User Upload an Image
        if ($request->hasFile('thumbnailImg') && $request->file('thumbnailImg')->isValid()) {
            $timeStampImg = time() . '.' . $request->file('thumbnailImg')->getClientOriginalExtension();
            $request->file('thumbnailImg')->move('Story', $timeStampImg);
        } else {
            $fetchRec = DB::table('stories')->find($id);
            $timeStampImg = $fetchRec ? $fetchRec->thumbnail_image : null;
        }
        $isUpdated = DB::table('stories')
            ->where('id', '=', $id)
            ->update([
                'thumbnail_image' => $timeStampImg,
                'headline' => $request->headline,
                'content' => $request->content
            ]);

        if ($isUpdated) {
            toastr()->success('Story record updated successfully');
            return redirect()->back();
        } else {
            toastr()->error('Failed to update record');
            return redirect()->back();
        }
    }

    public function deleteStory($id)
    {
        $isRecordDeleted = DB::table('stories')->where('id', '=', $id)->delete();

        if ($isRecordDeleted) {
            toastr()->success('Story removed successfully');
            return redirect()->back();
        } else {
            toastr()->error('Something went wrong. Please try again later.');
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
        $fetchAllFAQs = DB::table('faq')->get();
        return view('Admin.FAQs', with(compact('fetchAllFAQs')));
    }

    public function AddFAQ()
    {
        return view("Admin.AddFAQ");
    }

    public function createFAQ(Request $request)
    {
        // Form Validation
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        // Add new record
        $isFAQcreated = DB::table('faq')->insert([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        if ($isFAQcreated) {
            toastr()->success('New FAQ Added Successfully!');
            return redirect()->route('Admin.FAQs');
        } else {
            toastr()->error('Failed to add new faq!');
            return redirect()->back();
        }
    }

    public function EditFAQ($id)
    {
        $findFAQ = DB::table('faq')->find($id);
        return view('Admin.EditFAQ', with(compact('findFAQ')));
    }

    public function updateFAQ(Request $request, $id)
    {
        $request->validate(
            [
                'question' => 'required',
                'answer' => 'required'
            ]
        );
        $isRecordUpdated = DB::table('faq')
            ->where('id', '=', $id)
            ->update([
                'question' => $request->question,
                'answer' => $request->answer
            ]);

        if ($isRecordUpdated) {
            toastr()->success('FAQ Updated Successfully');
            return redirect()->route('Admin.FAQs');
        } else {
            toastr()->error("You didn't make any changes.");
            return redirect()->back();
        }
    }

    public function deleteFAQ($id)
    {
        $isRecordDeleted = DB::table('faq')->where('id', '=', $id)->delete();

        if ($isRecordDeleted) {
            toastr()->success('FAQ deleted successfully');
            return redirect()->back();
        }
    }
    public function TeamMembers()
    {
        return view('Admin.TeamMember');
    }

    public function AddTeamMember()
    {
        return view("Admin.AddTeam");
    }

    public function createTeamMember(Request $request)
    {
        // Form Validation
        $request->validate([
            'name' => 'required',
            'profile' => 'required|file',
            'position' => 'required',
            'description' => 'required',
        ]);

        $imgPath = time() . '.' . $request->profile->getClientOriginalExtension();

        $request->profile->move('Team', $imgPath);

        $isRecordCreated = DB::table('team_member')->insert([
            'name' => $request->name,
            'profile_picture' => $imgPath,
            'position' => $request->position,
            'description' => $request->description,
            'linkedin_profile' => $request->linkedinLink,
            'facebook_profile' => $request->fbLink,
            'instagram_profile' => $request->instagramLink
        ]);

        if ($isRecordCreated) {
            toastr()->success('New team member added successfully');
            return redirect()->route('Admin.TeamMembers');
        } else {
            toastr()->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
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
