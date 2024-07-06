@extends('layouts.apps')

@section('title', 'Applications for ' . $jobOffer->title)

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-5">Applications for {{ $jobOffer->title }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>CV</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->candidate->name }}</td>
                        <td>{{ $application->candidate->email }}</td>
                        <td>
                            @if($application->candidate->CVpath)
                                <a href="{{ asset('storage/' . $application->candidate->CVpath) }}" target="_blank">View CV</a>
                            @else
                                No CV
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('employeur.job-offers.applications.destroy', $application) }}" method="POST" style="display:inline-block;">
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
@endsection
