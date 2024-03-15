<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Admin</div>
            @guest
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    User Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('users') }}">Users</a>
                    </nav>
                </div>


                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJobs"
                    aria-expanded="false" aria-controls="collapseJobs">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Job
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseJobs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('job-titles') }}">Job Titles</a>
                        <a class="nav-link" href="{{ route('pay-grades') }}">Pay Grades</a>
                        <a class="nav-link" href="{{ route('employment-status') }}">Employment Status</a>
                        <a class="nav-link" href= "{{ route('job-category') }}">Job Categories</a>
                        <a class="nav-link" href="{{ route('work-shifts') }}">Work Shifts</a>
                    </nav>
                </div>


                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseOrganisation" aria-expanded="false" aria-controls="collapseOrganisation">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Organisation
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseOrganisation" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('general-information') }}">General Information</a>
                        <a class="nav-link" href="{{ route('location') }}">Location</a>
                        <a class="nav-link" href="{{ route('structure') }}">Structure</a>
                    </nav>
                </div>


                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseQualification" aria-expanded="false" aria-controls="collapseQualification">
                    <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                    Qualifications
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseQualification" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('skill') }}">Skills</a>
                        <a class="nav-link" href="{{ route('education') }}">Education</a>
                        <a class="nav-link" href="{{ route('education') }}">Licenses</a>
                        <a class="nav-link" href="{{ route('languages') }}">Languages</a>
                    </nav>
                </div>

                <a class="nav-link" href="{{ route('nationalities') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-briefcas"></i></div>
                    Nationalities
                </a>

                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                    Corporate Branding
                </a>

                <div class="sb-sidenav-menu-heading">PIM</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseConfiguration" aria-expanded="false" aria-controls="collapseConfiguration">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Configuration
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseConfiguration" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('optional-fields') }}">Optional Fields</a>
                        <a class="nav-link" href="{{ route('custom-fields') }}">Custom Fields</a>
                        <a class="nav-link" href="{{ route('data-imports') }}">Data Imports</a>
                        <a class="nav-link" href="{{ route('reporting-methods') }}">Reporting Methods</a>
                        <a class="nav-link" href="{{ route('termination-reason') }}">Termination Reason</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseEmployee" aria-expanded="false" aria-controls="collapseEmployee">
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
                    Employee
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEmployee" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('employee-list') }}">Employee List</a>
                        <a class="nav-link" href="{{ route('get-employee') }}">Add Employee</a>
                        <a class="nav-link" href="{{ route('reports') }}">Reports</a>
                    </nav>
                </div>

            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as: {{ Auth::user()->name }}</div>
            </div>
        @endauth
    </div>
</nav>
