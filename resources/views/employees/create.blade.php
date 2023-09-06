<x-header title="Create Employee" page="Create" />

<div class="container mt-5">
    <h1 class="mb-5">Add Employee</h1>
    <form action="{{ route('employees.store') }}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
</div>

<x-footer />
