<x-employee-header :title="'Edit leave #' . $leave->id" page="Edit" />


<div class="container mt-5">
    <h1 class="mb-5">Sent Leave</h1>
    <form action="{{ route('leaves.update', $leave) }}" method="post">
        @csrf
        @method('put')
        <div class="form-floating mb-3">
            <select class="form-control" name="type" id="type">
                <option value="sick" {{ $leave->type == 'sick' ? 'selected' : '' }}>Sick</option>
                <option value="casual" {{ $leave->type == 'casual' ? 'selected' : '' }}>Casual</option>
                <option value="religious" {{ $leave->type == 'religious' ? 'selected' : '' }}>Religious</option>
                <option value="unpaid" {{ $leave->type == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
            </select>
            <label for="type">Type</label>
        </div>
        <div class="form-floating mb-3">
            {{-- {{ dd($leave->start_date) }} --}}
            <input type="date" value="{{ $leave->start_date }}" class="form-control" name="start_date"
                id="start_date" placeholder="Start Date">
            <label for="start_date">Start Date</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" value="{{ $leave->duration }}" name="duration" id="duration"
                placeholder="Duration">
            <label for="duration">Duration</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<x-footer />
