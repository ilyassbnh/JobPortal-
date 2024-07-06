<?php
namespace App\Http\Controllers\Employeur;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(JobOffer $jobOffer)
    {
        $applications = Application::where('job_offer_id', $jobOffer->id)->with('candidate')->get();
        return view('employeur.applications.index', compact('applications', 'jobOffer'));
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->back()->with('success', 'Application deleted successfully.');
    }
}
