<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TenantController extends Controller
{
    public function index()
    {
        //Fetch Landlord feedback
        $fetchLandlordFeedback = DB::table('landlord_feedback')->where('visible', '=', 'Yes')->get();
        $fetchServices = DB::table('services')->get();
        return view('Tenant.LandingPage', with(compact('fetchLandlordFeedback', 'fetchServices')));
    }

    public function About()
    {
        $fetchTeamMembersRec = DB::table('team_member')->limit(3)->get();
        return view('Tenant.About', with(compact('fetchTeamMembersRec')));
    }

    public function CSR()
    {
        $fetchPartnerCompanies = DB::table('partnership_organizations')->get();
        $fetchImpactStories = DB::table('stories')->limit(2)->get();
        $fetchLandlordFeedback = DB::table('landlord_feedback')->where('visible', '=', 'Yes')->get();
        return view(
            'Tenant.CSR',
            with(compact(
                'fetchPartnerCompanies',
                'fetchImpactStories',
                'fetchLandlordFeedback'
            ))
        );
    }

    public function Landlords()
    {
        return view('Tenant.Landlords');
    }

    public function FAQs()
    {
        $fetchFAQs = DB::table('faq')->get();
        return view('Tenant.FAQs', with(compact('fetchFAQs')));
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
            'message' => $request->message,
            'created_at' => Carbon::now()
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

    public function viewDetailProperty($id)
    {
        $findProperty = DB::table('properties')->find($id);
        $fetchComments = DB::table('tenant_feedback')->where('property_id', '=', $findProperty->id)->get();
        $fetchPropertyImages = explode("|", $findProperty->property_images);

        return view('Tenant.ViewProperty', with(compact('findProperty', 'fetchPropertyImages', 'fetchComments')));
    }

    public function submitFeedback(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'message' => 'required'
        ]);

        $isFeedbackSubmitted = DB::table('tenant_feedback')->insert(
            [
                'tenant_name' => $request->name,
                'tenant_email' => $request->email,
                'tenant_country' => $request->country,
                'tenant_message' => $request->message,
                'property_id' => $id,
                'created_at' => Carbon::now()
            ]
        );

        if ($isFeedbackSubmitted) {
            toastr()->success('Thankyou for sharing your valuable feedback');
            return redirect()->back();
        }
    }

    public function BookedProperty(Request $request, $id)
    {
        // Form Validation
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'adults' => 'required|min:1|max:8',
            'childrens' => 'required',
            'monthsToStay' => 'required',
            'accountTitle' => 'required',
            'cardNumber' => 'required',
            'cvc' => 'required',
            'expMonth' => 'required',
            'expYear' => 'required'
        ]);

        $isPropertyBooked = DB::table('booking')->insert(
            [
                'full_name' => $request->fullName,
                'email' => $request->email,
                'phone_number' => $request->phoneNumber,
                'address' => $request->address,
                'adults' => $request->adults,
                'childrens' => $request->childrens,
                'totalMonthsToStay' => $request->monthsToStay,
                'account_title' => $request->accountTitle,
                'card_number' => $request->cardNumber,
                'cvc' => $request->cvc,
                'expiration_month' => $request->expMonth,
                'expiration_year' => $request->expYear,
                'property_id' => $id,
                'created_at' => Carbon::now()
            ]
        );

        // Update property booking status
        DB::table('properties')
            ->where('id', '=', $id)
            ->update([
                'property_status' => 'Booked'
            ]);

        if ($isPropertyBooked) {
            toastr()->success('Your booking is confirmed.');
            return redirect()->back();
        } else {
            toastr()->success('Something went wrong.');
            return redirect()->back();
        }
    }
}
