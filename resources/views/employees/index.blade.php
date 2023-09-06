<x-header title="Employees" page="Home" />

<div class="container mt-5">
    <h1 class="mb-5">Employees</h1>
    @if ($success)
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    {{-- {{ dd($employees) }} --}}
    @if (App\Models\Employee::orderBy('created_at')->first())
        <div class="row">
            <table class="table border m-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">More</th>
                    </tr>
                </thead>
                @foreach ($employees as $employee)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        More
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="m-2"><a href="{{ route('employees.show', $employee->id) }}"
                                                style="width:150px" class="btn btn-sm btn-primary">View</a></li>
                                        <li class="m-2"><a href="{{ route('employees.edit', $employee->id) }}"
                                                style="width:150px" class="btn btn-sm btn-dark">Edit</a></li>
                                        <li class="m-2">
                                            <form action=" {{ route('employees.destroy', $employee->id) }} "
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"style="width:150px"
                                                    class="btn btn-sm btn-danger">Delete</button>
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
            You don't have any employee
        </div>
    @endif
</div>


<x-footer />
