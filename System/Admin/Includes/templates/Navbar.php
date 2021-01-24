<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading" style='background-color:#FFF;'><h2 style='color:#777;font-family:Raleway'>HMS</h2></div>
        <div class="list-group list-group-flush">
        <span class="list-group-item list-group-item-action bg-light" style='font-size:14px;color:#888'>Main Navigation</span>
        <a href="Dashboard.php" class="list-group-item list-group-item-action bg-white coloring"><i style='color:#0095FF' class='fa fa-home'></i> Dashboard</a>
        <div class="dropdown">
            <span class="nav-link list-group-item list-group-item-action bg-white coloring" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i style='color:#0095FF' class='fa fa-user-md'></i> Doctors<i class="float-right fas fa-caret-down"></i></span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="Doctor-Specialization.php">Doctor Specialization</a>
                <a class="dropdown-item" href="Add-Doctor.php">Add Doctor</a>
                <a class="dropdown-item" href="Manage-Doctors.php">Manage Doctor</a>
            </div>
        </div>
        <div class="dropdown">
            <span class="nav-link list-group-item list-group-item-action bg-white coloring" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i style='color:#0095FF' class='fa fa-user'></i> Users<i class="float-right fas fa-caret-down"></i></span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="Manage-Users.php">Manage User </a>
            </div>
        </div>
        <div class="dropdown">
            <span class="nav-link list-group-item list-group-item-action bg-white coloring" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i style='color:#0095FF' class='fa fa-plus-square'></i> Patients<i class="float-right fas fa-caret-down"></i></span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="Manage-Patients.php">Manage Patient</a>
            </div>
        </div>
        <a href="Appointment-History.php" class="list-group-item list-group-item-action bg-white coloring"><i style='color:#0095FF' class='far fa-file'></i> Appointment History</a>
        <div class="dropdown">
            <span class="nav-link list-group-item list-group-item-action bg-white coloring" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i style='color:#0095FF' class='fas fa-envelope'></i> Messages<i class="float-right fas fa-caret-down"></i></span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="Unreaded-Messages.php">Unread Messages</a>
            <a class="dropdown-item" href="Readed-Messages.php">Read Messages</a>
            </div>
        </div>
        <a href="Search.php" class="list-group-item list-group-item-action bg-white coloring"><i style='color:#0095FF' class='fa fa-search'></i>Patient Search</a>
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
                <img src="<?php echo $img; ?>download.png" alt="" width="40px" height="40px">
                <?php echo $_SESSION['Admin']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Edit-Profile.php">My Profile</a>
                <a class="dropdown-item" href="Change-Password.php">Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Logout.php">Log Out</a>
                </div>
            </li>
            </ul>
        </div>
        </nav>