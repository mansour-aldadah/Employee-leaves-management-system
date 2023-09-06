<x-employee-header title="My Leaves Offers" page="Home" />

<div class="container mt-5">
    <h1 class="mb-5">My Leaves Offers</h1>
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
                                        <li class="m-2"><a href="{{ route('leaves.show', $leave->id) }}"
                                                style="width:150px" class="btn btn-sm btn-primary">View</a></li>
                                        @if ($leave->status == 'Waiting')
                                            <li class="m-2"><a href="{{ route('leaves.edit', $leave->id) }}"
                                                    style="width:150px" class="btn btn-sm btn-secondary">Edit</a></li>
                                            <li class="m-2">
                                                <form action=" {{ route('leaves.destroy', $leave->id) }} "
                                                    method="post" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"style="width:150px"
                                                        class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </li>
                                        @endif
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



<x-footer />
