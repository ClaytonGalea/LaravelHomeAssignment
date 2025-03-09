<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">My Laravel Project (Clayton Galea 6.2B)</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('colleges.index') }}">Colleges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                </li>
            </ul>
        </div>
    </div>
</nav>