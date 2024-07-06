<!-- resources/views/admin/job_offers/edit.blade.php -->


@section('title', 'Edit Job Offer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Edit Job Offer</h1>
                <form action="{{ route('admins.job_offers.update', $job_offer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="employer_id">Employer ID</label>
                        <input type="number" name="employer_id" class="form-control" value="{{ $job_offer->employer_id }}" required>
                    </div>
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
                        <select name="status" class="form-control" required>
                            <option value="waiting" @if($job_offer->status == 'waiting') selected @endif>Waiting</option>
                            <option value="active" @if($job_offer->status == 'active') selected @endif>Active</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
