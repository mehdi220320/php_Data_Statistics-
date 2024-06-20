<?php
global $db;
session_start(); // Start the session
include "config db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validate form input
    if (!empty($email) && !empty($password)) {
        // Prepare and execute the query
        $stmt = $db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and verify password
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['email'] = $user['email'];
                // Fetch user's role
                $role_stmt = $db->prepare("SELECT nom_role FROM role WHERE id_role = :role_id");
                $role_stmt->bindParam(':role_id', $user['id_role']);
                $role_stmt->execute();
                $role = $role_stmt->fetchColumn(); // Fetching role name
                $_SESSION['role'] = $role;
                // Redirect to index page
                switch ($role) {
                    case "administrateur":
                        header('Location: Index.php');
                        break;
                    case 'auditeur':
                        header('Location: Index.php');
                        exit;
                        break;
                    case 'client':
                        header('Location: Profile.php');
                        exit;
                        break;
                    default:
                        header('Location: Login.php');
                        exit;
                }
            } else {
                $error = "Invalid password";
            }
        } else {
            $error = "Invalid email";
        }
    } else {
        $error = "Please fill in both fields.";
    }
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>
<body class="bg-gradient-primary">

<div class="container">
    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" >
                                <img src="assets/img/img_1.png" style=" width: 451px;
                                                                        padding-top: 47px;
                                                                        position: absolute;
                                                                        margin-left: 35px;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Welcome Back!</h4>
                                </div>
                                <?php if (!empty($error)): ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form class="user" method="post" action="login.php">
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required />
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="password" placeholder="Password" name="password" required />
                                    </div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small">
                                            <div class="form-check">
                                                <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"/>
                                                <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                    <hr />
                                </form>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.min.js"></script>

</body>
</html>