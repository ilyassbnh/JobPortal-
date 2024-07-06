@extends('layouts.admin')

@section('title', 'Edit Job Offer')

@section('content_header')
    <h1>Edit Job Offer</h1>
@endsection

@section('content')
    <form action="{{ route('admin.job_offers.update', $job_offer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $job_offer->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $job_offer->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $job_offer->location }}" required>
        </div>
        <div class="form-group">
            <label for="contract_type">Contract Type</label>
            <input type="text" name="contract_type" class="form-control" value="{{ $job_offer->contract_type }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="waiting" {{ $job_offer->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                <option value="active" {{ $job_offer->status == 'active' ? 'selected' : '' }}>Active</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
