<!-- resources/views/admin/job_offers/create.blade.php -->



@section('title', 'Create Job Offer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Create Job Offer</h1>
                <form action="{{ route('admins.job_offers.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="employer_id">Employer ID</label>
                        <input type="number" name="employer_id" class="form-control" required>
                    </div>
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
                        <select name="status" class="form-control" required>
                            <option value="waiting">Waiting</option>
                            <option value="active">Active</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
