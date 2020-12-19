<?php
ob_start();
// HEADER
include('header.php')
?>
<?php


if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('location: index.php');
    exit;
}
require('db.php');


$email_err = $password_err = '';
$email = $password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (empty(trim($_POST['email']))) {

        $email_err = "*E-mail can't be empty.";

    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_err = "*Please enter email in the correct format.";
    } else {
        $email = trim($_POST['email']);
    }


    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter a password.';
    } else {
        $password = trim($_POST['password']);
    }


    if (empty($email_err) || $email_err == false && empty($password_err)) {

        $sql = 'SELECT id, email, password FROM users WHERE email = ?';

        if ($stmt = $conn->prepare($sql)) {

            $stmt->bind_param('s', $param_email);

            $param_email = $email;

            if ($stmt->execute()) {

                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $email, $hashed_password);

                    if ($stmt->fetch()) {

                        if (password_verify($password, $hashed_password)) {


                            $_SESSION['logged_in'] = true;

                            //$_SESSION['role'] = $role;

                            header('location: index.php');

                        } else
                            var_dump(123);

                        $password_err = "Password is not correct!";
                    }

                }
            }


        }

    }


}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        body {
            color: #fff;
            background: #ffffff;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }

        .form-control:focus {
            border-color: #5cb85c;
        }

        .form-control, .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }

        .signup-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }

        .signup-form h2:before, .signup-form h2:after {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }

        .signup-form h2:before {
            left: 0;
        }

        .signup-form h2:after {
            right: 0;
        }

        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }  </style>
</head>


<body class="text-center">
<div class="signup-form">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <h2>Log in</h2>

        <div class="form-group">

            <input type="email" class="form-control <?= !empty($email_err) ? 'is-invalid' : ''; ?>" name="email"
                   placeholder="Email" required="required">
            <small id="error" class="form-text text-muted "><?= $email_err; ?></small>

        </div>
        <div class="form-group">
            <input type="password" class="form-control <?= !empty($password_err) ? 'is-invalid' : ''; ?>"
                   name="password" placeholder="Password" required="required">
            <small id="error" class="form-text text-muted "><?= $password_err; ?></small>

        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Log in</button>
        </div>
    </form>
    <div class="text-center" style="color: black;">Don't have an account? <a href="signup.php" style="color: black;">Sign
            up</a></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>
<?php
// Footer
include('footer.php')
?>

</html>
