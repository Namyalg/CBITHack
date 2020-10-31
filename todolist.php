<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CTRL-R</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/to-do.css">

</head>

<body>

    <section id="container">

        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>

            <a href="index.html" class="logo"><b>CTRL-R -- TODO</b></a>

            <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Water</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Food</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Football</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">M3 Preparation</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
                </ul>
            </div>
        </header>
        <aside>
            <div id="sidebar" class="nav-collapse ">

                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                    <h5 class="centered">CTRL-R</h5>

                    <li class="mt">
                        <a href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="active" href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>My plans list</span>
                        </a>
                        <ul class="sub">
                            <li><a href="calendar.html">Calendar</a></li>
                            <li class="active"><a href="todo_list.html">Todo List</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </aside>

        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> To-Do Lists</h3>
                <div class="row mt mb">
                    <div class="col-md-12">
                        <section class="task-panel tasks-widget">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h5><i class="fa fa-tasks"></i> Todo List </h5>
                                </div>
                                <br>
                            </div>
                            <div class="panel-body">
                                <?php require_once 'process.php'; ?>

                                <?php
        if(isset($_SESSION['message'])): ?>

                                <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                    <div class="container">
                                        <?php
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            ?>
                                    </div>

                                </div>
                                <?php endif ?>


                                <div class="container">

                                    <?php 
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>

                                    <div class="row justify-content-center">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Topic</th>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                            </thead>

                                            <?php while($row = $result->fetch_assoc()): ?>

                                            <tr>
                                                <td><?php echo $row['topic']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td>
                                                    <a href="todolist.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
                                                    <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>

                                            <?php endwhile ;?>
                                        </table>

                                    </div>

                                    <?php
                                        function pre_r( $array ){
                                        echo '<pre>';
                                        print_r( $array );
                                        echo '</pre>';
                                        }

                                    ?>
                                    <div class="row justify-content-center">
                                        <form action="process.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $id;?>">

                                            <div class="form-group row">
                                                <label><b>Topic</b></label>
                                                <input type="text" name="topic" value="<?php echo $topic; ?>" class="form-control " placeholder="Topic Name..">
                                            </div>
                                            <div class="form-group row ">
                                                <label><b>Date</b></label>
                                                <input type="timestamp" name="date" value="<?php echo $date; ?>" class="form-control" placeholder="(D/M/Y)">
                                            </div>
                                            <div class="form-group row">
                                                <label><b>Description</b></label>
                                                <input type="message" name="description" value="<?php echo $description; ?>" class="form-control form-control-lg" placeholder="Details..">
                                            </div>
                                            <div class="form-group row">

                                                <?php if($update == true): ?>
                                                <button type="submit" class="btn btn-warning" name="update">Update</button>

                                                <?php else: ?>
                                                <button type="submit" class="btn btn-primary" name="save">Save</button>

                                                <?php endif;?>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class=" add-task-row">
                                <a class="btn btn-success btn-sm pull-left" href="todolist.php">Add New Tasks</a>
                                <a class="btn btn-default btn-sm pull-right" href="todolist.php">See All Tasks</a>
                            </div>
                        </section>
                    </div>
            </div>
        
        </section>
    </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>



    <script src="assets/js/common-scripts.js"></script>


    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="assets/js/tasks.js" type="text/javascript"></script>

    <script>
        jQuery(document).ready(function() {
            TaskList.initTaskWidget();
        });

        $(function() {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        });

    </script>


    <script>
        $(function() {
            $('select.styled').customSelect();
        });

    </script>

</body>

</html>
