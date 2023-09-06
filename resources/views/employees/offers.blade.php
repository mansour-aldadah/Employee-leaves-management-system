<x-header title="Leaves Offers" page="Leave" />

<div class="container mt-5">
    <h1 class="mb-5">Leaves Offers</h1>
    @if ($success)
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    @if (App\Models\Leave::orderBy('status', 'DESC')->first())
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
                        <th scope="col">More</th>
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
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        More
                                    </button>
                                    <ul class="dropdown-menu">
                                        @if ($leave->status == 'Waiting')
                                            <li class="m-2"><a href="{{ route('offers.accept', $leave->id) }}"
                                                    style="width:150px" class="btn btn-sm btn-success">Accept</a></li>
                                            <li class="m-2">
                                            <li class="m-2"><a href="#" style="width:150px" id="tt"
                                                    data-topic-id="{{ $leave->id }}"
                                                    class="btn btn-sm btn-warning reject-button">Reject</a>
                                            </li>
                                        @else
                                            <li class="m-2"><a href="{{ route('offers.wait', $leave->id) }}"
                                                    style="width:150px" class="btn btn-sm btn-secondary">Waiting</a>
                                            </li>
                                            <li class="m-2">
                                                @if ($leave->status == 'Accepted')
                                            <li class="m-2"><a href="#" style="width:150px" id="tt"
                                                    data-topic-id="{{ $leave->id }}"
                                                    class="btn btn-sm btn-warning reject-button">Reject</a>
                                            </li>
                                        @else
                                            <li class="m-2"><a href="{{ route('offers.accept', $leave->id) }}"
                                                    style="width:150px" class="btn btn-sm btn-success">Accept</a></li>
                                            <li class="m-2">
                                        @endif
                @endif
                <li class="m-2"><a href="{{ route('offers.show', $leave->id) }}" style="width:150px"
                        class="btn btn-sm btn-primary">View</a></li>
                <li class="m-2">
                    <form action=" {{ route('offers.destroy', $leave->id) }} " method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit"style="width:150px" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </li>
                </ul>
        </div>
        </td>
        </tr>
        </tbody>
    @endforeach
    </table>
</div>
@else
<div class="mt-5 mb-5 mr-5 fs-3">
    You don't have any leaves offers
</div>
@endif
</div>

<div id="custom-modal2">
    <div class="modal-content2">
        <h3>Reason for rejecting</h3>
        <form action="#" method="get">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control aaa2" id="user-input2" name="reason" placeholder="Reason">
                <label for="user-input2">Reason</label>
            </div>
            <div class="button-container2">
                <button type="submit" class="modal-button2 save-button2" id="modal-save2">Save</button>
                <button type="button" class="modal-button2 close-button2" id="modal-close2">Close</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ttLink = document.getElementById('tt');
        var customModal2 = document.getElementById('custom-modal2');
        var userInputField2 = document.getElementById('user-input2');
        var modalSave2 = document.getElementById('modal-save2');
        var modalClose2 = document.getElementById('modal-close2');

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('reject-button')) {
                e.preventDefault(); // Prevent the default link behavior
                let topicId = e.target.getAttribute('data-topic-id');
                userInputField2.value = ''; // Clear previous input
                customModal2.style.display = 'flex';
                // Use the topicId variable to update the form action URL
                var form = customModal2.querySelector('form');
                form.action = "/employees/offers/reject/" + topicId;
            }
        });

        modalClose2.addEventListener('click', function() {
            customModal2.style.display = 'none';
        });

        userInputField2.addEventListener('keydown', function(event) {
            event.stopPropagation(); // Prevent closing the modal on Enter key
        });
    });
</script>


<x-footer />
