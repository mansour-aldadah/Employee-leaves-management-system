<x-header :title="'Employee #' . $employee->id" page="Show" />

<div class="container">
    <h1 class="mt-5 mb-5">{{ $employee->name }} Detailes</h1>
    <ul>
        <li>Name: {{ $employee->name }}</li>
        <li>Password: {{ $employee->password }}</li>
        <li>Email: {{ $employee->email }}</li>
    </ul>
    <p class="mb-3">{{ $employee->name }} Leaves:</p>
    @if (App\Models\Leave::orderBy('status', 'DESC')->where('employee_id', $employee->id)->first())
        <div class="row">
            <table class="table border m-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                @foreach ($leaves as $leave)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $leave->id }}</th>
                            <td>{{ App\Models\Employee::findOrFail($leave->employee_id)->name }}</td>
                            <td>{{ $leave->type }}</td>
                            <td>{{ $leave->start_date }}</td>
                            <td>{{ $leave->duration }}</td>
                            <td>{{ $leave->status }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @else
        <div class="mt-5 mb-5 mr-5 fs-3">
            He doesn't have any leaves offers
        </div>
    @endif
</div>

<x-footer />
