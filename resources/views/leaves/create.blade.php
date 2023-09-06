<x-employee-header title="Sent Leave" page="Create" />

<div class="container mt-5">
    <h1 class="mb-5">Sent Leave</h1>
    <form action="{{ route('leaves.store') }}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <select class="form-control" name="type" id="type">
                <option value="sick">Sick</option>
                <option value="casual">Casual</option>
                <option value="religious">Religious</option>
                <option value="unpaid">Unpaid</option>
            </select>
            <label for="type">Type</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
            <label for="start_date">Start Date</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="duration" id="duration" placeholder="Duration">
            <label for="duration">Duration</label>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

<x-footer />
