<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Attendance</title>

    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../../../css/animate.css" rel="stylesheet">
    <link href="../../../css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="../../../login/logout.php">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="../../../home.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Auto Attendance</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="../../auto_attendance.php">Take Attendance</a></li>
                        <li><a href="../../attendance.php">View Attendance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../../manual_attendance.php"><i class="fa fa-th-large"></i> <span class="nav-label">Manual Attendance</span></a>
                </li>
                <li>
                    <a href="examples.php"><i class="fa fa-th-large"></i> <span class="nav-label">Attendance reports</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Result</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="../../../pdf/gen_result.php">Generate Result</a></li>
                        <li><a href="../../attendance.php">View Result</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../../gen_circular.php"><i class="fa fa-th-large"></i> <span class="nav-label">Circular</span></a>
                </li>
                <li>
                    <a href="../../../login/logout.php"><i class="fa fa-th-large"></i> <span class="nav-label">Logout</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="../login/logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>