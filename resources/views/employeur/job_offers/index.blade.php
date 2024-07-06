@extends('layouts.apps')

@section('title', 'Job Offers')

@section('content')
    <h1>Job Offers</h1>
    <a href="{{ route('employeur.job-offers.create') }}" class="btn btn-primary mb-3">Create Job Offer</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Contract Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobOffers as $jobOffer)
                <tr>
                    <td>{{ $jobOffer->id }}</td>
                    <td>{{ $jobOffer->title }}</td>
                    <td>{{ $jobOffer->description }}</td>
                    <td>{{ $jobOffer->location }}</td>
                    <td>{{ $jobOffer->contract_type }}</td>
                    <td>
                        <a href="{{ route('employeur.job-offers.edit', $jobOffer) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('employeur.job-offers.destroy', $jobOffer) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('employeur.job-offers.applications.index', $jobOffer) }}" class="btn btn-info">View Applications</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
