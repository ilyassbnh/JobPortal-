@extends('layouts.admin')

@section('title', 'Job Offers')

@section('content_header')
    <h1>Job Offers</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.job_offers.create') }}" class="btn btn-primary mb-3">Create Job Offer</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Contract Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($job_offers as $job_offer)
                        <tr>
                            <td>{{ $job_offer->id }}</td>
                            <td>{{ $job_offer->title }}</td>
                            <td>{{ $job_offer->description }}</td>
                            <td>{{ $job_offer->location }}</td>
                            <td>{{ $job_offer->contract_type }}</td>
                            <td>{{ $job_offer->status }}</td>
                            <td>
                                <a href="{{ route('admin.job_offers.edit', $job_offer->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.job_offers.destroy', $job_offer->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
