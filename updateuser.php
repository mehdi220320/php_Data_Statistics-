<?php
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

