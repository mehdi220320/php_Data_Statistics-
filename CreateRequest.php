<?php
global $db;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form input
    $service = filter_input(INPUT_POST, 'service', FILTER_SANITIZE_SPECIAL_CHARS);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $adresse = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING );
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    // Validate form input
    if (!empty($service) && !empty($title) && !empty($adresse) && !empty($date) ) {
            // Prepare the SQL statement
            $stmt = $db->prepare("INSERT INTO reclamation (`reclamation_id`, `titre`, `date`, `description`, `adresse`, etat ,`service_id`, `user_id`) VALUES ('',:title,:date,:description, :adresse,'en attente', '3',:id_user)");
            // Bind the parameters
//            $stmt->bindParam(':service', $service);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id_user', $_SESSION['user_id']);

        // Execute the statement

            if ($stmt->execute()) {
                $msg= "New request created successfully.";
                header("Location: CreateRequest.php");
            } else {
                $msg ="Error: Could not execute the query.";
            }
    } else {
        $msg= "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Profile - Brand</title>
    <link
        rel="stylesheet"
        href="assets/bootstrap/css/bootstrap.min.css"
    />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
    />
    <link
        rel="stylesheet"
        href="assets/css/styles.min.css"
    />
    <style>

        #header.header-inner-pages {
            background: rgba(0, 125, 254, 255);
            padding: 12px 0;
        }

        .container2 {
            width: 80%;
            margin: 20px auto;
        }
        h1 {
            text-align: center;
        }
        .contact-form {
            max-width: 500px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"], .form-group input[type="email"], .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .button-49,
        .button-49:after {
            width: 150px;
            height: 76px;
            line-height: 78px;
            font-size: 20px;
            font-family: 'Bebas Neue', sans-serif;
            background: rgba(0, 125, 254, 255);
            border: 0;
            color: #fff;
            letter-spacing: 3px;
            box-shadow: 6px 0px 0px #00E6F6;
            outline: transparent;
            position: relative;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-49:after {
            --slice-0: inset(50% 50% 50% 50%);
            --slice-1: inset(80% -6px 0 0);
            --slice-2: inset(50% -6px 30% 0);
            --slice-3: inset(10% -6px 85% 0);
            --slice-4: inset(40% -6px 43% 0);
            --slice-5: inset(80% -6px 5% 0);

            content: 'ALTERNATE TEXT';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 3%, #00E6F6 3%, #00E6F6 5%, #6528db  5%);
            text-shadow: -3px -3px 0px #F8F005, 3px 3px 0px #00E6F6;
            clip-path: var(--slice-0);
        }

        .button-49:hover:after {
            animation: 1s glitch;
            animation-timing-function: steps(2, end);
        }

        @keyframes glitch {
            0% {
                clip-path: var(--slice-1);
                transform: translate(-20px, -10px);
            }
            10% {
                clip-path: var(--slice-3);
                transform: translate(10px, 10px);
            }
            20% {
                clip-path: var(--slice-1);
                transform: translate(-10px, 10px);
            }
            30% {
                clip-path: var(--slice-3);
                transform: translate(0px, 5px);
            }
            40% {
                clip-path: var(--slice-2);
                transform: translate(-5px, 0px);
            }
            50% {
                clip-path: var(--slice-3);
                transform: translate(5px, 0px);
            }
            60% {
                clip-path: var(--slice-4);
                transform: translate(5px, 10px);
            }
            70% {
                clip-path: var(--slice-2);
                transform: translate(-10px, 10px);
            }
            80% {
                clip-path: var(--slice-5);
                transform: translate(20px, -10px);
            }
            90% {
                clip-path: var(--slice-1);
                transform: translate(-10px, 0px);
            }
            100% {
                clip-path: var(--slice-1);
                transform: translate(0);
            }
        }

        @media (min-width: 768px) {
            .button-49,
            .button-49:after {
                width: 200px;
                height: 86px;
                line-height: 88px;
            }
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
            <h3 class="text-dark mb-4">CreateRequest</h3>
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Forum </p>
                </div>
                <div class="card-body">
                    <?php if (!empty($msg)): ?>
                        <div class="alert alert-warning"><?php echo $msg; ?></div>
                    <?php endif; ?>
                    <form method="post" action="CreateRequest.php" >
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="type">Request type<span style="color: #D72A12">*</span></label>
                                <select name="service"   id="type" class="form-control" >
                                    <option value="Service1" selected>Service1</option>
                                    <option value="Service2" selected>Service2</option>
                                    <option value="Service3" selected>Service3</option>
                                    <option value="Service4" selected>Service4</option>
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="title">Title<span style="color: #D72A12">*</span></label>
                                <input class="form-control" id="title" type="text"  name="title" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="Adresse">Adresse<span style="color: #D72A12">*</span></label>
                                <input class="form-control" id="Adresse" type="text"  name="adresse" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="title">Date<span style="color: #D72A12">*</span></label>
                                <input class="form-control" id="title" type="date"  name="date" >
                            </div>
                            <label class="small mb-1" for="description">Description</label>
                            <textarea class="form-control"  id="description" type="text"  name="description" ></textarea>
                            <button type="submit" class="btn btn-primary" style="text-align: center;width: 250px;margin-left: 465px;margin-top: 15px;" >Submit Request</button>
                        </div>

                    </form>
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
<a class="border rounded d-inline scroll-to-top" href="#page-top"
><i class="fas fa-angle-up"></i
    ></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>
</html>

