<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="{{route('dashboard') }}" class="brand-link">
      <span class="brand-text fw-light">SRMS </span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <div class="text-center my-3">
        <img src="{{ !empty(Auth::user()->picture_url) ? asset('uploads/' . Auth::user()->picture_url) : asset('upload/default.png') }}"
          class="rounded-circle shadow border border-white" alt="User Image" style=" width: 100px; height: 100px; object-fit: cover;">
        <div class="mt-2 text-white">{{ Auth::user()->name ?? 'No Name' }}</div>
      </div>
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="menu"
        data-accordion="false">
        <li class="nav-item menu-open">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false">
              <!-- Dashboard -->
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="nav-icon bi bi-house-door-fill"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <!-- Student Class Dropdown -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-mortarboard"></i>
                  <p>
                    Student Class
                    <i class="right bi bi-chevron-down"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('createclass') }}" class="nav-link">
                      <i class="bi bi-circle nav-icon"></i>
                      <p>Create Class</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('Manageclass') }}" class="nav-link">
                      <i class="bi bi-circle nav-icon"></i>
                      <p>Manage Class</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-tree-fill"></i>
                  <p>
                    Student Subjects
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="box-sizing: border-box; display: none;">
                  <li class="nav-item">
                    <a href="{{route('createsubject')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Create Subjects</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('managesubject')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Manage Subjects</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('subject_Combination')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add Subject Combination</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('Manage_Combination')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Manage Subject Combination</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-mortarboard"></i>
                  <p>
                    Student
                    <i class="right bi bi-chevron-down"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('addstudent') }}" class="nav-link">
                      <i class="bi bi-circle nav-icon"></i>
                      <p>Add Students</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('ManageStudent') }}" class="nav-link">
                      <i class="bi bi-circle nav-icon"></i>
                      <p>Manage Class</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="bi bi-card-list"></i>
                  <p>
                    Results
                    <i class="right bi bi-chevron-down"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('addresults') }}" class="nav-link">
                      <i class="bi bi-circle nav-icon"></i>
                      <p>Add Results</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('Manageresults') }}" class="nav-link">
                      <i class="bi bi-circle nav-icon"></i>
                      <p>Manage Results</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
            </ul>
          </nav>
        </li>
      </ul>
    </nav>
  </div>
</aside>