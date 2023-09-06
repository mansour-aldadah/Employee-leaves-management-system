<x-header :title="'Leave #' . $leave->id" page="Show" />

<div class="container">
    <h1 class="mt-5 mb-5">Leave #{{ $leave->id }}</h1>
    <ul>
        <li>Type: {{ $leave->type }}</li>
        <li>Start Date: {{ $leave->start_date }}</li>
        <li>Duration: {{ $leave->duration }}</li>
        <li>Status: {{ $leave->status }}</li>
        @if ($leave->status == 'Rejected')
            <li>Reason: {{ $leave->reason ?? 'No Reason' }}</li>
        @endif
    </ul>
</div>

<x-footer />
