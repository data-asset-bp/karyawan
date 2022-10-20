<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: serif;
        }

        /* Fixed sidenav, full height */
        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        /* Style the sidenav links and the dropdown button */
        .sidenav a,
        .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        /* On mouse-over */
        .sidenav a:hover,
        .dropdown-btn:hover {
            color: #f1f1f1;
        }

        /* Main content */
        .main {
            margin-left: 200px;
            /* Same as the width of the sidenav */
            font-size: 20px;
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        /* Add an active class to the active dropdown button */
        .active {
            background-color: green;
            color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #262626;
            padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <a class="nav-link" href="index.php?page=dashboard">
                        <div class="sb-nav-link-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="index.php?page=user">
                        <div class="sb-nav-link-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                        Admin
                    </a>
                    <button class="dropdown-btn btn-sm ml-2"><i class="fa fa-list" aria-hidden="true"></i><span>Assets</span>
                    </button>
                    <div class="collapse">
                        <li><a class="nav-link collapse-item" href="index.php?page=data_asset"></i>All</a></li>
                        <li><a class="nav-link collapse-item" href="index.php?page=status_archived"></i>Archived</a></li>
                        <li><a class="nav-link collapse-item" href="index.php?page=status_deployable"></i>Deployable</a></li>
                        <li><a class="nav-link collapse-item" href="index.php?page=status_deployed"></i>Deployed</a></li>
                        <li><a class="nav-link collapse-item" href="index.php?page=status_pending"></i>Pending</a></li>
                        <li><a class="nav-link collapse-item" href="index.php?page=status_undeployable"></i>Un-Deployed</a></li>
                    </div>
                    <a class="nav-link" href="index.php?page=karyawan">
                        <div class="sb-nav-link-icon"><i class="far fa-address-card" aria-hidden="true"></i></div>
                        Employee Data
                    </a>
                    <a class="nav-link" href="index.php?page=chekin">
                        <div class="sb-nav-link-icon"><i class="far fa-calendar-check" aria-hidden="true"></i></div>
                        Check In/Check Out
                    </a>

                    <a class="nav-link" href="index.php?page=cari_karyawan">
                        <div class="sb-nav-link-icon"><i class="fas fa-search" aria-hidden="true"></i></div>
                        Search Employee Asset Data
                    </a>

                    <button class="dropdown-btn btn-sm ml-2"><i class="fas fa-cogs" aria-hidden="true"></i> <a>Pengaturan </a>
                    </button>
                    <div class="dropdown-container btn-sm ml-2">
                        <li><a class="nav-link" href="index.php?page=tambah_divisi">Tambah Divisi </a></li>
                        <li><a class="nav-link" href="index.php?page=tambah_ba">Tambah Branch Area</a></li>
                        <li><a class="nav-link" href="index.php?page=tambah_pa">Tambah Personal Area</a>
                        <li>
                    </div>


                    <a class="nav-link" href="logout.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-ellipsis-v"></i></div>
                        Log Out
                    </a>


                </div>
            </div>
        </nav>
    </div>
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

    </body>

</html>