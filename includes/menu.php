
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Student Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_student.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="student_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student list</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-user-plus"> </i>
              <p>
                 Setup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="add_department.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Department</p>
              </a>
              </li> 
              <li class="nav-item">
              <a href="dept_list.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Department list</p>
              </a>
              </li>
              <li class="nav-item">
              <a href="add_sub.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Course</p>
              </a>
              </li> 
              <li class="nav-item">
              <a href="sub_list.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Course list</p>
              </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Result Management
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="add_marks.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Marks</p>
            </a>
            </li>
			      <li class="nav-item">
                <a href="student_result_by_id.php" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Students Result</p>
                </a>
             </li>			
          </ul>
      </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>