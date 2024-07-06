<?php

namespace App\Http\Controllers\Employeur;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class emJobOfferController extends Controller
{
    public function index()
    {
        $jobOffers = JobOffer::where('employer_id', Auth::id())->get();
        return view('employeur.job_offers.index', compact('jobOffers'));
    }

    public function create()
    {
        return view('employeur.job_offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'contract_type' => 'required|string|max:255',
        ]);

        JobOffer::create([
            'employer_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'contract_type' => $request->contract_type,
        ]);

        return redirect()->route('employeur.job-offers.index')->with('success', 'Job offer created successfully.');
    }

    public function edit(JobOffer $jobOffer)
    {
        return view('employeur.job_offers.edit', compact('jobOffer'));
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'contract_type' => 'required|string|max:255',
        ]);

        $jobOffer->update($request->only(['title', 'description', 'location', 'contract_type']));

        return redirect()->route('employeur.job-offers.index')->with('success', 'Job offer updated successfully.');
    }

    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer->delete();
        return redirect()->route('employeur.job-offers.index')->with('success', 'Job offer deleted successfully.');
    }
}
