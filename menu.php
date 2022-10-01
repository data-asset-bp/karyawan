<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <a class="nav-link" href="home.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="index.php?page=user">
                        <div class="sb-nav-link-icon"><i class="far fa-bookmark" aria-hidden="true"></i></div>
                        User
                    </a>
                    <a class="nav-link" href="index.php?page=asset">
                        <div class="sb-nav-link-icon"><i class="fas fa-sd-card"></i></div>
                        Asset Data
                    </a>
                    <a class="nav-link" href="index.php?page=pegawai">
                        <div class="sb-nav-link-icon"><i class="far fa-address-card" aria-hidden="true"></i></div>
                        Employee Data
                    </a>
                    <a class="nav-link" href="index.php?page=chekin">
                        <div class="sb-nav-link-icon"><i class="far fa-calendar-check" aria-hidden="true"></i></div>
                        Check In/Check Out
                    </a>

                    <a class="nav-link" href="index.php?page=caripegawai">
                        <div class="sb-nav-link-icon"><i class="fas fa-search" aria-hidden="true"></i></div>
                        Search Employee Asset Data
                    </a>

                    <a class="nav-link" href="/view/status/view.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-cog"></i>
                        </div>
                        Asset Status
                    </a>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Asset Status</h6>
                            <a class="collapse-item pending " href="/view/status/pending.php">Pending</a>
                            <a class="collapse-item undeployable" href="/view/status/undeployable.php">Undeployable</a>
                            <a class="collapse-item Deployed" href="/view/status/deployed.php">Deployed</a>
                            <a class="collapse-item Archived" href="/view/status/archived.php">Archived</a>
                            <a class="collapse-item Deployable" href="/view/status/deployable.php">Deployable</a>
                        </div>
                    </div>

                    <a class="nav-link" href="logout.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-ellipsis-v"></i></div>
                        Log Out
                    </a>


                </div>
            </div>
        </nav>
    </div>