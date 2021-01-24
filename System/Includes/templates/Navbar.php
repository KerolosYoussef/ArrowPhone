<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading" style='background-color:#FFF;'><h2 style='color:#777;font-family:Raleway'>HMS</h2></div>
        <div class="list-group list-group-flush">
        <span class="list-group-item list-group-item-action bg-light" style='font-size:14px;color:#888'>Main Navigation</span>
        <a href="Dashboard.php" class="list-group-item list-group-item-action bg-white coloring"><i style='color:#0095FF' class='fa fa-home'></i> Dashboard</a>
        <a href="Book-Appointment.php" class="list-group-item list-group-item-action bg-white coloring"><i style='color:#0095FF' class='fa fa-edit'></i> Book Appointment</a>
        <a href="Appointment-History.php" class="list-group-item list-group-item-action bg-white coloring"><i style='color:#0095FF' class='fa fa-list'></i> Appointment Histroy</a>
        <a href="#" class="list-group-item list-group-item-action bg-white coloring"><i style='color:#0095FF' class='fa fa-list'></i> Medical History</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <i style='cursor:pointer;font-size:25px;color:#007AFF' class='fa fa-bars' id="menu-toggle"></i>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <h1 style='color:#777' class='text-right'>Hospital Mangement System</h1>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                <img src="<?php echo $img; ?>images.jpg" alt="" width="40px" height="40px">
                <?php echo $_SESSION['User']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Edit-Profile.php">My Profile</a>
                <a class="dropdown-item" href="Change-Password.php">Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="userLogout.php">Log Out</a>
                </div>
            </li>
            </ul>
        </div>
        </nav>