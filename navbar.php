<?php
$clearUrl = "test204.php?page=" . urlencode( $_SESSION['oop']) . "&page1=" . urlencode( $_SESSION['ooq']);

// Get the current page filename
$currentPage = basename($_SERVER['PHP_SELF']);
$isDispatcherPage = ($currentPage === 'dispatcher_assignments.php');
?>
<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $clearUrl; ?>"><i class="fas fa-headset"></i> NCC</a>
        <button class="navbar-toggler"     type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left menu -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- More Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">More</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="search5()"><i class="fas fa-user"></i> First name</a></li>
                        <li><a class="dropdown-item" href="#" onclick="search15()"><i class="fas fa-user-tag"></i> Last name</a></li>
                        <li><a class="dropdown-item" href="#" onclick="search16()"><i class="fas fa-building"></i> Company</a></li>
                        <li><a class="dropdown-item" href="#" onclick="search2()"><i class="fas fa-briefcase"></i> Business</a></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="del()"><i class="fas fa-trash"></i> Delete</a></li>
                    </ul>
                </li>

                <!-- Assignment - Only show if NOT on dispatcher_assignments.php -->
                <?php if (!$isDispatcherPage): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="dispatch()"><i class="fas fa-plus-circle"></i> Assignment</a>
                </li>
                <?php endif; ?>

                <!-- Reports Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Reports</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="live_tracking.php"><i class="fas fa-map-marker-alt"></i> Live Tracking</a></li>
                        <li><a class="dropdown-item" href="#" onclick="list1()"><i class="fas fa-list"></i> Simple List(Clients)</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="dropdown-header">Tickets</li>
                        <li><a class="dropdown-item" href="#" onclick="list79()"><i class="fas fa-ticket-alt"></i> Simple List(Tickets)</a></li>
                        <li><a class="dropdown-item" href="#" onclick="tick79()"><i class="fas fa-folder-open"></i> Open Tickets</a></li>
                        <li><a class="dropdown-item" href="#" onclick="incidents()"><i class="fas fa-info-circle"></i> Tickets Details</a></li>
                        <li><a class="dropdown-item" href="#" onclick="incidents2()"><i class="fas fa-chart-pie"></i> Statistics(Tickets)</a></li>
                    </ul>
                </li>

                <!-- System Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">System</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Drivers</li>
                         <li><a class="dropdown-item" href="#" onclick="add22()"><i class="fas fa-users"></i> Drivers</a></li>
                        <li><a class="dropdown-item" href="#" onclick="add3()"><i class="fas fa-user-plus"></i> Add Driver</a></li>
                         <li><a class="dropdown-item text-danger" href="#" onclick="deldriverAdvanced()"><i class="fas fa-user-minus"></i> Delete Driver</a></li>

                        <li class="dropdown-header">Agents</li>
                        <li><a class="dropdown-item" href="#" onclick="search10()"><i class="fas fa-user-tie"></i> Agent</a></li>
                        <?php if($nam=="user"): ?>
                            <li><a class="dropdown-item text-danger" href="#" onclick="delag()"><i class="fas fa-user-minus"></i> Delete Agent</a></li>
                            <li><a class="dropdown-item text-danger" href="#" onclick="delal()"><i class="fas fa-users-slash"></i> Delete All</a></li>
                        <?php endif; ?>

                        <li class="dropdown-header">Complaints</li>
                        <li><a class="dropdown-item" href="#" onclick="add322()"><i class="fas fa-exclamation-triangle"></i> Complaints</a></li>
                        <li><a class="dropdown-item" href="#" onclick="add33()"><i class="fas fa-plus"></i> Add Complaint</a></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="del_ag1()"><i class="fas fa-trash-alt"></i> Delete Complaint</a></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="del_al1()"><i class="fas fa-trash"></i> Delete All</a></li>
                    </ul>
                </li>

                <!-- Data Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Data</a>
                    <ul class="dropdown-menu">
                        <!--li class="dropdown-header">Import</li>
                        <li><a class="dropdown-item" href="#" onclick="Import()"><i class="fas fa-file-import"></i> Import Client</a></li>
                        <li><a class="dropdown-item" href="#" onclick="Importc1()"><i class="fas fa-file-import"></i> Import Complaints</a></li-->

                        <li class="dropdown-header">Export</li>
                        <!--li><a class="dropdown-item" href="#" onclick="Exportd()"><i class="fas fa-file-export"></i> Export Client</a></li-->
                        <li><a class="dropdown-item" href="#" onclick="Exportc1()"><i class="fas fa-file-export"></i> Export Complaints</a></li>

                        <li class="dropdown-header">Operations</li>
                        <li><a class="dropdown-item" href="#" onclick="bb()"><i class="fas fa-save"></i> Backup</a></li>
                        <li><a class="dropdown-item" href="#" onclick="ImportSql()"><i class="fas fa-undo"></i> Recovery</a></li>

                        <?php if($nam=="user"): ?>
                            <li class="dropdown-header text-danger">Danger Zone</li>
                            <li><a class="dropdown-item text-danger" href="#" onclick="delAll()"><i class="fas fa-exclamation-triangle"></i> Delete All Clients</a></li>
                            <li><a class="dropdown-item text-danger" href="#" onclick="delAll2()"><i class="fas fa-exclamation-triangle"></i> Delete All Complaints</a></li>
                            <li><a class="dropdown-item text-danger" href="#" onclick="del7()"><i class="fas fa-exclamation-triangle"></i> Delete Locations</a></li>
                            <!--li><a class="dropdown-item text-danger" href="#" onclick="del8()"><i class="fas fa-exclamation-triangle"></i> Delete Locations(last 30 days)</a></li-->
                        <?php endif; ?>
                    </ul>
                </li>

            </ul>

            <!-- Right menu -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <span class="text-white"><i class="fas fa-user"></i> Login as <?php echo htmlspecialchars($nam); ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="login200.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>