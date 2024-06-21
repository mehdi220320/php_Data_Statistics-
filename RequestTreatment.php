<?php
include "config db.php";
global $db;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT r.*, s.service_name, u.nom, u.prenom, u.email FROM reclamation r 
                          INNER JOIN service s ON r.service_id = s.service_id 
                          INNER JOIN user u ON r.user_id = u.id_user 
                          WHERE r.reclamation_id = :reclamation_id");
    $stmt->bindParam(':reclamation_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $request = $stmt->fetch(PDO::FETCH_ASSOC);
} else
{
    $msg= "There s no id here";
    header("location: RequestList.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the reclamation ID from the POST data
    $reclamation_id = filter_input(INPUT_POST, 'reclamation_id', FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute the UPDATE query to set 'etat' to 'refusé'
    $stmt = $db->prepare("UPDATE reclamation SET etat = 'refusé' WHERE reclamation_id = :reclamation_id");
    $stmt->bindParam(':reclamation_id', $reclamation_id, PDO::PARAM_INT);

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        $msg = "Request updated successfully.";
        header("Location: RequestList.php");
        exit; // Stop further execution after redirect
    } else {
        $msg = "Error: Could not update the request.";
    }
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"/>
    <link rel="stylesheet" href="assets/css/styles.min.css"/>
    <style>
        .card-body * {
            color: black;
        }
    </style>
</head>
<body id="page-top">
<?php include "sidebar.php"?>
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav
            class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light"
        >
            <div class="container-fluid">
                <button
                    class="btn btn-link d-md-none rounded-circle me-3"
                    id="sidebarToggleTop"
                    type="button"
                >
                    <i class="fas fa-bars"></i>
                </button>
                <form
                    class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search"
                >
                    <div class="input-group">
                        <input
                            class="bg-light form-control border-0 small"
                            type="text"
                            placeholder="Search for ..."
                        /><button class="btn btn-primary py-0" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item dropdown d-sm-none no-arrow">
                        <a
                            class="dropdown-toggle nav-link"
                            aria-expanded="false"
                            data-bs-toggle="dropdown"
                            href="#"
                        ><i class="fas fa-search"></i
                            ></a>
                        <div
                            class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                            aria-labelledby="searchDropdown"
                        >
                            <form class="me-auto navbar-search w-100">
                                <div class="input-group">
                                    <input
                                        class="bg-light form-control border-0 small"
                                        type="text"
                                        placeholder="Search for ..."
                                    />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary py-0" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow">
                            <a
                                class="dropdown-toggle nav-link"
                                aria-expanded="false"
                                data-bs-toggle="dropdown"
                                href="#"
                            ><span class="badge bg-danger badge-counter">3+</span
                                ><i class="fas fa-bell fa-fw"></i
                                ></a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in"
                            >
                                <h6 class="dropdown-header">alerts center</h6>
                                <a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                ><div class="me-3">
                                        <div class="bg-primary icon-circle">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                          <span class="small text-gray-500"
                          >December 12, 2019</span
                          >
                                        <p>A new monthly report is ready to download!</p>
                                    </div></a
                                ><a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                ><div class="me-3">
                                        <div class="bg-success icon-circle">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                          <span class="small text-gray-500"
                          >December 7, 2019</span
                          >
                                        <p>$290.29 has been deposited into your account!</p>
                                    </div></a
                                ><a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                ><div class="me-3">
                                        <div class="bg-warning icon-circle">
                                            <i
                                                class="fas fa-exclamation-triangle text-white"
                                            ></i>
                                        </div>
                                    </div>
                                    <div>
                          <span class="small text-gray-500"
                          >December 2, 2019</span
                          >
                                        <p>
                                            Spending Alert: We've noticed unusually high
                                            spending for your account.
                                        </p>
                                    </div></a
                                ><a
                                    class="dropdown-item text-center small text-gray-500"
                                    href="#"
                                >Show All Alerts</a
                                >
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow">
                            <a
                                class="dropdown-toggle nav-link"
                                aria-expanded="false"
                                data-bs-toggle="dropdown"
                                href="#"
                            ><span class="badge bg-danger badge-counter">7</span
                                ><i class="fas fa-envelope fa-fw"></i
                                ></a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in"
                            >
                                <h6 class="dropdown-header">alerts center</h6>
                                <a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                ><div class="dropdown-list-image me-3">
                                        <img
                                            class="rounded-circle"
                                            src="assets/img/avatars/avatar4.jpeg"
                                        />
                                        <div class="bg-success status-indicator"></div>
                                    </div>
                                    <div class="fw-bold">
                                        <div class="text-truncate">
                            <span
                            >Hi there! I am wondering if you can help me with
                              a problem I've been having.</span
                            >
                                        </div>
                                        <p class="small text-gray-500 mb-0">
                                            Emily Fowler - 58m
                                        </p>
                                    </div></a
                                ><a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                ><div class="dropdown-list-image me-3">
                                        <img
                                            class="rounded-circle"
                                            src="assets/img/avatars/avatar2.jpeg"
                                        />
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div class="fw-bold">
                                        <div class="text-truncate">
                            <span
                            >I have the photos that you ordered last
                              month!</span
                            >
                                        </div>
                                        <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                    </div></a
                                ><a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                ><div class="dropdown-list-image me-3">
                                        <img
                                            class="rounded-circle"
                                            src="assets/img/avatars/avatar3.jpeg"
                                        />
                                        <div class="bg-warning status-indicator"></div>
                                    </div>
                                    <div class="fw-bold">
                                        <div class="text-truncate">
                            <span
                            >Last month's report looks great, I am very happy
                              with the progress so far, keep up the good
                              work!</span
                            >
                                        </div>
                                        <p class="small text-gray-500 mb-0">
                                            Morgan Alvarez - 2d
                                        </p>
                                    </div></a
                                ><a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                ><div class="dropdown-list-image me-3">
                                        <img
                                            class="rounded-circle"
                                            src="assets/img/avatars/avatar5.jpeg"
                                        />
                                        <div class="bg-success status-indicator"></div>
                                    </div>
                                    <div class="fw-bold">
                                        <div class="text-truncate">
                            <span
                            >Am I a good boy? The reason I ask is because
                              someone told me that people say this to all dogs,
                              even if they aren't good...</span
                            >
                                        </div>
                                        <p class="small text-gray-500 mb-0">
                                            Chicken the Dog · 2w
                                        </p>
                                    </div></a
                                ><a
                                    class="dropdown-item text-center small text-gray-500"
                                    href="#"
                                >Show All Alerts</a
                                >
                            </div>
                        </div>
                        <div
                            class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                            aria-labelledby="alertsDropdown"
                        ></div>
                    </li>
                    <div class="d-none d-sm-block topbar-divider"></div>
                    <li class="nav-item dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                            <a
                                class="dropdown-toggle nav-link"
                                aria-expanded="false"
                                data-bs-toggle="dropdown"
                                href="#"
                            ><span class="d-none d-lg-inline me-2 text-gray-600 small"
                                >Valerie Luna</span
                                ><img
                                    class="border rounded-circle img-profile"
                                    src="assets/img/avatars/avatar1.jpeg"
                                /></a>
                            <div
                                class="dropdown-menu shadow dropdown-menu-end animated--grow-in"
                            >
                                <a class="dropdown-item" href="#"
                                ><i
                                        class="fas fa-user fa-sm fa-fw me-2 text-gray-400"
                                    ></i
                                    >&nbsp;Profile</a
                                ><a class="dropdown-item" href="#"
                                ><i
                                        class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"
                                    ></i
                                    >&nbsp;Settings</a
                                ><a class="dropdown-item" href="#"
                                ><i
                                        class="fas fa-list fa-sm fa-fw me-2 text-gray-400"
                                    ></i
                                    >&nbsp;Activity log</a
                                >
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                ><i
                                        class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"
                                    ></i
                                    >&nbsp;Logout</a
                                >
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <h3 class="text-dark mb-4">Request: <?php echo $request['titre']; ?></h3>
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Request Details </p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($msg)): ?>
                            <div class="alert alert-warning"><?php echo $msg; ?></div>
                        <?php endif; ?>
                        <p><strong>Reclamation ID: </strong><span id="reclamation_id"><?php echo $request['reclamation_id']; ?></span></p>
                        <p><strong>Title: </strong><span id="titre"><?php echo $request['titre']; ?></span></p>
                        <p><strong>Service Name: </strong><span id="service_name"><?php echo $request['service_name']; ?></span></p>
                        <p><strong>Sender:</strong></p>
                        <ul>
                            <li><strong>First Name: </strong><span id="user_first_name"><?php echo $request['prenom']; ?></span></li>
                            <li><strong>Last Name: </strong><span id="user_last_name"><?php echo $request['nom']; ?></span></li>
                            <li><strong>Email: </strong><span id="email"><?php echo $request['email']; ?></span></li>
                            <li><strong>Address: </strong><span id="adresse"><?php echo $request['adresse']; ?></span></li>
                        </ul>
                        <p><strong>Expiration Date: </strong><span id="date_expiration"><?php echo $request['date']; ?></span></p>
                        <p><strong>Description: </strong><span id="description"><?php echo $request['description']; ?></span></p>
                        <p><strong>Status: </strong><span id="etat"><?php echo $request['etat']; ?></span></p>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary me-2" type="button">
                                <a href="RequestList.php" style="text-decoration: none;">Cancel</a>
                            </button>
                            <form action="RequestTreatment.php" method="post" style="display:inline;">
                                <input type="hidden" name="reclamation_id" value="<?php echo $request['reclamation_id']; ?>">
                                <button class="btn btn-danger me-2" type="submit" name="denied">Denied</button>
                            </form>
                            <button class="btn btn-success" type="submit">Traitement</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright">
                <span>Copyright © Brand 2024</span>
            </div>
        </div>
    </footer>
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>
</html>


