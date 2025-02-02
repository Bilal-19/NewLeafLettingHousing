<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function Dashboard()
    {
        if (Auth::check() && Auth::user()->role === 'Admin') {
            $totalProperties = DB::table('properties')->count();
            $totalBookings = DB::table('booking')->count();
            $totalPartners = DB::table('partnership_organizations')->count();
            $totalServices = DB::table('services')->count();
            $totalMembers = DB::table('team_member')->count();
            $totalRentedProperties = DB::table('properties')->where('property_status','=','Booked')->count();
            $totalAvailableProperties = DB::table('properties')->where('property_status','=','Available')->count();
            return view('Admin.Dashboard',with(
                compact(
                    'totalProperties',
                    'totalBookings',
                    'totalPartners',
                    'totalServices',
                    'totalMembers',
                    'totalRentedProperties',
                    'totalAvailableProperties'
                    )
            ));
        } else {
            return redirect()->route('login');
        }
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
            'service_description' => $request->serviceDescription,
            'created_at' => Carbon::now()
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
                'service_description' => $request->serviceDescription,
                'updated_at' => Carbon::now()
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
        $fetchBookingRecords = DB::table('properties')
            ->join('booking', 'properties.id', '=', 'booking.property_id')
            ->join('users', 'properties.user_id', '=', 'users.id')
            ->select("booking.*", "users.name")
            ->get();
        return view('Admin.Tenants', with(compact('fetchBookingRecords')));
    }

    public function Landlords()
    {
        // Join Users and Properties table
        // Fetch owner name, email and contact from 'users' table
        // Fetch total properties, total available properties, total rented properties

        $fetchPropertyRecord = DB::table('users')
            ->join('properties', 'users.id', '=', 'properties.user_id')
            ->select(
                'users.name as property_owner_name',
                'users.email as property_owner_email',
                'users.phone_number as property_owner_phone',
                DB::raw('COUNT(properties.id) as total_properties'),
                DB::raw('SUM(CASE WHEN properties.property_status = "available" THEN 1 ELSE 0 END) as total_available_properties'),
                DB::raw('SUM(CASE WHEN properties.property_status = "booked" THEN 1 ELSE 0 END) as total_rented_properties')
            )
            ->groupBy('users.id', 'users.name', 'users.email', 'users.phone_number')
            ->get();

        return view('Admin.Landlords', with(compact('fetchPropertyRecord')));
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
            'content' => $request->content,
            'created_at' => Carbon::now()
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
                'content' => $request->content,
                'updated_at' => Carbon::now()
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
        $fetchPropertyBookings = DB::table('properties')
            ->join('booking', 'properties.id', '=', 'booking.property_id')
            ->select('booking.*', 'properties.*')
            ->get();
        return view('Admin.BookProperties', with(compact('fetchPropertyBookings')));
    }

    public function Testimonials()
    {
        $fetchTenantFeedback = DB::table('tenant_feedback')->get();
        return view('Admin.Testimonials', with(compact('fetchTenantFeedback')));
    }

    public function toggleTestimonialVisibility($id)
    {
        $findFeedbackRecord = DB::table('tenant_feedback')->where('id', '=', $id)->first();

        if ($findFeedbackRecord->visible == 'Yes') {
            DB::table('tenant_feedback')->where('id', '=', $id)->update([
                'visible' => 'No'
            ]);
            toastr()->success('Updated feedback visibility');
            return redirect()->back();
        } else {
            DB::table('tenant_feedback')->where('id', '=', $id)->update([
                'visible' => 'Yes'
            ]);
            toastr()->success('Updated feedback visibility');
            return redirect()->back();
        }
    }

    public function toggleLandlordFeedback($id)
    {
        $findFeedbackRecord = DB::table('landlord_feedback')->where('id', '=', $id)->first();

        if ($findFeedbackRecord->visible == 'Yes') {
            DB::table('landlord_feedback')->where('id', '=', $id)->update([
                'visible' => 'No'
            ]);
            toastr()->success('Updated feedback visibility');
            return redirect()->back();
        } else {
            DB::table('landlord_feedback')->where('id', '=', $id)->update([
                'visible' => 'Yes'
            ]);
            toastr()->success('Updated feedback visibility');
            return redirect()->back();
        }
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
            'answer' => $request->answer,
            'created_at' => Carbon::now()
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
                'answer' => $request->answer,
                'updated_at' => Carbon::now()
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
        $fetchTeamRecords = DB::table('team_member')->get();
        return view('Admin.TeamMember', with(compact('fetchTeamRecords')));
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
            'instagram_profile' => $request->instagramLink,
            'created_at' => Carbon::now()
        ]);

        if ($isRecordCreated) {
            toastr()->success('New team member added successfully');
            return redirect()->route('Admin.TeamMembers');
        } else {
            toastr()->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function editTeamMember($id)
    {
        $findMemberRecord = DB::table('team_member')->find($id);
        return view("Admin.EditTeam", with(compact('findMemberRecord')));
    }

    public function updateTeamMember(Request $request, $id)
    {
        if ($request->file('profile')) {
            $imgPath = time() . '.' . $request->profile->getClientOriginalExtension();
            $request->profile->move('Team', $imgPath);
        } else {
            $findImagePath = DB::table('team_member')
                ->where('id', '=', $id)
                ->first();
            $imgPath = $findImagePath->profile_picture;
            // dd($imgPath);
        }
        $isUpdated = DB::table('team_member')->where('id', '=', $id)->update([
            'name' => $request->name,
            'profile_picture' => $imgPath,
            'position' => $request->position,
            'description' => $request->description,
            'linkedin_profile' => $request->linkedinLink,
            'facebook_profile' => $request->fbLink,
            'instagram_profile' => $request->instagramLink,
            'updated_at' => Carbon::now()
        ]);

        if ($isUpdated) {
            toastr()->success('Record Updated Successfully');
            return redirect()->route('Admin.TeamMembers');
        } else {
            toastr()->error('No changes were detected in the record.');
            return redirect()->back();
        }
    }

    public function deleteMember($id)
    {
        $isRecordDeleted = DB::table('team_member')->where('id', '=', $id)->delete();

        if ($isRecordDeleted) {
            toastr()->success('Record deleted successfully');
            return redirect()->route('Admin.TeamMembers');
        } else {
            toastr()->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function PartnerCompanies()
    {
        $fetchAllRecords = DB::table('partnership_organizations')->get();
        return view("Admin.Partnership", with(compact('fetchAllRecords')));
    }

    public function AddPartner()
    {
        return view('Admin.AddPartner');
    }

    public function createPartnership(Request $request)
    {
        $request->validate(
            [
                'organization_name' => 'required',
                'organization_description' => 'required'
            ]
        );

        $isRecordAdded = DB::table('partnership_organizations')->insert([
            'organization_name' => $request->organization_name,
            'organization_description' => $request->organization_description,
            'created_at' => Carbon::now()
        ]);

        if ($isRecordAdded) {
            toastr()->success('Partnership Record Addded Successfully');
            return redirect()->route('Admin.PartnerCompanies');
        } else {
            toastr()->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function editPartner($id)
    {
        $findPartnerCompany = DB::table('partnership_organizations')->find($id);
        return view('Admin.EditPartner', with(compact('findPartnerCompany')));
    }

    public function updatePartnerCompany(Request $request, $id)
    {
        $isRecordUpdated = DB::table("partnership_organizations")->where('id', '=', $id)->update(
            [
                'organization_name' => $request->organization_name,
                'organization_description' => $request->organization_description,
                'updated_at' => Carbon::now()
            ]
        );

        if ($isRecordUpdated) {
            toastr()->success('Record Updated Successfully');
            return redirect()->route('Admin.PartnerCompanies');
        } else {
            toastr()->error('No changes were detected in the record.');
            return redirect()->back();
        }
    }

    public function deletePartnerCompamy($id)
    {
        $isRecordDeleted = DB::table('partnership_organizations')->where('id', '=', $id)->delete();

        if ($isRecordDeleted) {
            toastr()->success('Record removed successfully');
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function CustomerQueries()
    {
        $fetchQueries = DB::table('inquiry')->get();
        return view('Admin.CustomerQueries', with(compact('fetchQueries')));
    }

    public function LandlordQueries()
    {
        $fetchLandlordQueries = DB::table('landlord_feedback')->get();
        return view("Admin.LandlordFeedback", with(compact('fetchLandlordQueries')));
    }

    public function signOut()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('Home');
        } else {
            toastr()->info('Something went wrong');
            return redirect()->back();
        }
    }
}
