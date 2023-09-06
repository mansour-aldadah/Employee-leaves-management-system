<x-header :title="'Edit employee' . $employee->name" page="Edit" />

<div class="container mt-5">
    <h1 class="mb-5">Edit Employee</h1>
    <form action="{{ route('employees.update', $employee) }}" method="post">
        @csrf
        @method('put')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{ $employee->name }}" name="name" id="name"
                placeholder="Name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" value="{{ $employee->email }}" name="email" id="email"
                placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" value="{{ $employee->password }}" name="password" id="password"
                placeholder="Password">
            <label for="password">Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


<x-footer />
