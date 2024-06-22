<?php
global $db;
include 'config db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confpassword = filter_input(INPUT_POST, 'confpassword', FILTER_SANITIZE_STRING);
    $fname = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $cin = filter_input(INPUT_POST, 'cin', FILTER_SANITIZE_NUMBER_INT);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    // Validate form input
    if (!empty($email) && !empty($password) && !empty($fname) && !empty($lname) && !empty($description) && !empty($confpassword)) {
        if($password == $confpassword)
        {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL statement
            $stmt = $db->prepare("INSERT INTO user (`id_user`, `nom`, `prenom`, `email`,CIN,DateDenaissance, `password`, `description`, `id_role`) VALUES (NULL,:lname,:fname,:email,:cin,:date, :password, :description,'2')");
            // Bind the parameters
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cin', $cin);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':description', $description);
            // Execute the statement

            if ($stmt->execute()) {
                $error= "New user created successfully.";
                header("Location: AddAuditeur.php");
            } else {
                $error ="Error: Could not execute the query.";
            }
        }else {
            $error="Please confirme your password";
        }
    } else {
        $error= "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
<?php include"sidebar.php"; ?>
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
            <div class="container-fluid">
                <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i>
                </button>
                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                        <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <i class="fas fa-search"></i></a>
                        <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="me-auto navbar-search w-100">
                                <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                    <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                    </div>
                                    <div><span class="small text-gray-500">December 12, 2019</span>
                                        <p>A new monthly report is ready to download!</p>
                                    </div>
                                </a><a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                    </div>
                                    <div><span class="small text-gray-500">December 7, 2019</span>
                                        <p>$290.29 has been deposited into your account!</p>
                                    </div>
                                </a><a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                    </div>
                                    <div><span class="small text-gray-500">December 2, 2019</span>
                                        <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                    </div>
                                </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                        <div class="bg-success status-indicator"></div>
                                    </div>
                                    <div class="fw-bold">
                                        <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                        <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                    </div>
                                </a><a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div class="fw-bold">
                                        <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                        <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                    </div>
                                </a><a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                        <div class="bg-warning status-indicator"></div>
                                    </div>
                                    <div class="fw-bold">
                                        <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                        <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                    </div>
                                </a><a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                        <div class="bg-success status-indicator"></div>
                                    </div>
                                    <div class="fw-bold">
                                        <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                        <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                    </div>
                                </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </div>
                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                    </li>
                    <div class="d-none d-sm-block topbar-divider"></div>
                    <li class="nav-item dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Valerie Luna</span>
                                <img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <h3 class="text-dark mb-4">Administration Panel</h3>
            <div class="card shadow">
                <div class="card-header py-3" style="display: flex;">
                    <p class="text-primary m-0 fw-bold">Add Auditeur</p>
                    <button type="button" class="btn btn-sm btn-outline-primary" style="margin-left: 83%;font-weight: bold;font-size: medium;"><a href="UsersTable.php" style="text-decoration: none">Users List</a></button>
                </div>
                <div class="card-body lh-sm ">
                    <div class="row">
                        <div class="col-lg-15">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-5" style="font-size: 3em;font-family: 'Bodoni MT Poster Compressed'">Create an Account!</h4>
                                </div>
                                <?php if (!empty($error)): ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form class="user" method="post" action="AddAuditeur.php" >
                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input class="form-control form-control-user" type="text" style="color: black;"  id="exampleFirstName" placeholder="First Name" name="first_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-user" type="text"  style="color: black;" id="exampleLastName" placeholder="Last Name" name="last_name">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="email" style="color: black;"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input class="form-control form-control-user" type="number" style="color: black;"  id="cin" placeholder="CIN" name="cin">
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-user" type="date"  style="color: black;" id="birthdaydate" placeholder="Date de naissance" name="date">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input class="form-control form-control-user" type="password" style="color: black;"  id="examplePasswordInput" placeholder="Password" name="password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-user" type="password" style="color: black;"  id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="confpassword">
                                        </div>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="exampleFormControlTextarea1">Description:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"  name="description" rows="3"></textarea>
                                    </div>

                                    <button class="btn btn-primary d-block btn-user w-100" type="submit">Submit</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2024</span></div>
        </div>
    </footer>
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/script.min.js?h=bdf36300aae20ed8ebca7e88738d5267"></script>

</body>

</html>

