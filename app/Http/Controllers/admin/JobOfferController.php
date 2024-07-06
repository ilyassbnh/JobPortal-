<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        $job_offers = JobOffer::all();
        return view('admin.job_offers.index', compact('job_offers'));
    }

    public function create()
    {
        return view('admin.job_offers.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'contract_type' => 'required',
            'status' => 'required|in:waiting,active',
        ]);
        $data['employer_id']=auth()->user()->id;
        JobOffer::create($data);

        return redirect()->route('admin.job_offers.index')->with('success', 'Job Offer created successfully.');
    }

    public function edit(JobOffer $job_offer)
    {
        return view('admin.job_offers.edit', compact('job_offer'));
    }

    public function update(Request $request, JobOffer $job_offer)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'contract_type' => 'required',
            'status' => 'required|in:waiting,active',
        ]);

        $job_offer->update($request->all());

        return redirect()->route('admin.job_offers.index')->with('success', 'Job Offer updated successfully.');
    }

    public function destroy(JobOffer $job_offer)
    {
        $job_offer->delete();

        return redirect()->route('admin.job_offers.index')->with('success', 'Job Offer deleted successfully.');
    }
}
