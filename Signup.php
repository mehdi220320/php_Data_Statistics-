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
    // Validate form input
    if (!empty($email) && !empty($password) && !empty($fname) && !empty($lname) && !empty($description) && !empty($confpassword)) {
        if($password == $confpassword)
        {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL statement
            $stmt = $db->prepare("INSERT INTO user (`id_user`, `nom`, `prenom`, `email`, `password`, `description`, `id_role`) VALUES (NULL,:lname,:fname,:email, :password, :description,'3')");
            // Bind the parameters
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':description', $description);
            // Execute the statement

            if ($stmt->execute()) {
                $error= "New user created successfully.";
                header("Location: Login.php");
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

<body class="bg-gradient-primary">
<?php
echo "<div>" . $email ." ". $lname ." ". $fname ." ". $password ." ". $description . "</div>";
?>
<div class="container" style="margin-top: 5%">
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-15">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-5" style="font-size: 3em;font-family: 'Bodoni MT Poster Compressed'">Create an Account!</h4>
                        </div>
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form class="user" method="post" action="Signup.php" style="color: black">
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="First Name" name="first_name">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control form-control-user" type="text" id="exampleLastName" placeholder="Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email">
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password">
                                </div>
                                <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="confpassword">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleFormControlTextarea1">Description:</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1"  name="description" rows="3"></textarea>
                            </div>

                            <button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>

                        </form>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>
<script src="assets/js/script.min.js">

</script>
</body>

</html>

