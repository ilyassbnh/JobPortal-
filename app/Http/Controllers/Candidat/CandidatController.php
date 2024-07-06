<?php
namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\Application; // Add this line to include the Application model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatController extends Controller
{
    public function showJobOffers()
    {
        $jobOffers = JobOffer::all();
        return view('candidat.job_offers.index', compact('jobOffers'));
    }

    public function applyJobOffer(Request $request, JobOffer $jobOffer)
    {
        $user = Auth::user();

        // Validate the cover letter input if it's being submitted
        $request->validate([
            'cover_letter' => 'nullable|string',
        ]);

        // Save the application to the database
        Application::create([
            'candidate_id' => $user->id,
            'job_offer_id' => $jobOffer->id,
            'cover_letter' => $request->cover_letter,
        ]);

        return redirect()->route('candidat.job-offers.index')->with('success', 'You have successfully applied for the job.');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('candidat.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'cv' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $user->CVpath = $cvPath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('candidat.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
