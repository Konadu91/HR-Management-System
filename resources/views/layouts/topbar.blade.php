<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="{{ route('dashboard') }}">HR Management</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaves.index') }}">Leave Management</a>
                </li>
                
                
                <li class="nav-item">
                    @auth
                    <form action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
                      @csrf
                      <button class="btn btn-success" type="submit">Logout</button>
                      @csrf
                  </form>
                  @endauth
                              </li>
            </ul>
            @csrf
        </div>
    </div>
</nav>
