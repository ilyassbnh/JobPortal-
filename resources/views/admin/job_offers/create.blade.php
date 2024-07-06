@extends('layouts.admin')

@section('title', 'Create Job Offer')

@section('content_header')
    <h1>Create Job Offer</h1>
@endsection

@section('content')
    <form action="{{ route('admin.job_offers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contract_type">Contract Type</label>
            <input type="text" name="contract_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="waiting">Waiting</option>
                <option value="active">Active</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
