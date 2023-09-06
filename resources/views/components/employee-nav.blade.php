@props(['page'])
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => $page == 'Home']) aria-current="page" href="{{ route('leaves.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => $page == 'Create']) href="{{ route('leaves.create') }}">Sent Leave</a>
                </li>
        </div>
        <div class="auth">{{ Auth::guard('employee')->user()->name }}</div>
    </div>
</nav>
