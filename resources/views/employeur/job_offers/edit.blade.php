@extends('layouts.apps')

@section('title', 'Edit Job Offer')

@section('content')
    <h1>Edit Job Offer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employeur.job-offers.update', $jobOffer) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $jobOffer->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $jobOffer->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $jobOffer->location) }}" required>
        </div>

        <div class="form-group">
            <label for="contract_type">Contract Type</label>
            <input type="text" name="contract_type" id="contract_type" class="form-control" value="{{ old('contract_type', $jobOffer->contract_type) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Job Offer</button>
    </form>
@endsection
