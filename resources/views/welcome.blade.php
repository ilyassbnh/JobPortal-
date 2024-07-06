@extends('layouts.appo')

@section('title', 'Job Offers')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-5">Job Offers</h1>
        <div class="row">
            @foreach($jobOffers as $jobOffer)
            @if ($jobOffer->status == 'active')
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-center">{{ $jobOffer->title }}</h2>
                            <p class="card-text"><strong>Description:</strong> {{ Str::limit($jobOffer->description, 100) }}</p>
                            <p class="card-text"><strong>Location:</strong> {{ $jobOffer->location }}</p>
                            <p class="card-text"><strong>Contract Type:</strong> {{ $jobOffer->contract_type }}</p>
                            <form action="{{ route('candidat.job-offers.apply', $jobOffer) }}" method="POST">
                                @csrf
                               
                                <button type="submit" class="btn btn-primary btn-block">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection
