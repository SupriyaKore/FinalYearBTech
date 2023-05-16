<!doctype html>
<html lang="en">
<?php
   require 'database.php';

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="Opening.php">Smart Car Parking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homeAll.php">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="card text-center h-100 margincard newcard">
    <form action="action_page.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <div class="mb-3">
    <label for="name" class="form-label"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" required>
    </div>

    <div class="mb-3">
    <label for="email" class="form-label"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    </div>

    <div class="mb-3">
    <label for="gender" class="form-label"><b>Gender</b></label>
    <input type="text" placeholder="Enter Gender" name="gender" id="gender" required>
    </div>

    <div class="mb-3">
    <label for="mobile" class="form-label"><b>Mobile</b></label>
    <input type="text" placeholder="Enter Mobile No." name="mobile" id="mobile" required>
    </div>

    <div class="mb-3">
    <label for="psw" class="form-label"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
    </div>

    <div class="mb-3">
    <label for="psw-repeat" class="form-label"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw-repeat" required>
    </div>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
</div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>