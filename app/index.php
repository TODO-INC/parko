<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parko</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./frontend/adminpanel/css/auth.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
</head>
<body>
    <main class="container">
        <div class="card text-center custom-card">
            <div class="card-header custom-card-header">Welcome</div>
            <div class="card-body custom-card-body">
                <!-- Login Form -->
                <p>
                    <button class="btn btn-primary collapsed btn-base-auth" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLogin" aria-expanded="false" aria-controls="collapseLogin">
                        Already have an account
                    </button>
                </p>
                <div class="collapse" id="collapseLogin">
                    <form name="login" id="form" class="form-signin" action="/post_login" method="post">
                        <div class="form-floating">
                            <input name="l_email" type="email" class="form-control" id="l_email" >
                            <label for="l.email">Email</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="l_password" type="password" class="form-control" id="l_password" >
                            <label for="l.password">Password</label>
                        </div>
                        <button class="btn btn-bd-primary btn-auth w-100 py-2" type="submit">Login</button>
                    </form>
                </div>
                <p>
                    <button class="btn btn-primary btn-base-auth" id="signup-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSignup" aria-expanded="false" aria-controls="collapseSignup">
                        Didn't have an account? Sign Up
                    </button>
                </p>
                <div class="collapse" id="collapseSignup">
                <form name="login" id="form2" class="form-signin" method="post">
                        <div class="form-floating">
                            <input name="name" type="text" class="form-control" id="name" >
                            <label for="s.user.name">User Name</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="email" type="email" class="form-control" id="email" >
                            <label for="s.email">Email</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="phone" type="text" class="form-control" id="phone" >
                            <label for="s.phone">Phone Number</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="password" type="password" class="form-control" id="password" >
                            <label for="user.password">Password</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="user.retype.password" type="password" class="form-control" id="user.retype.password" >
                            <label for="user.retype.password">Confirm Password</label>
                        </div>
                        <button class="btn btn-bd-primary btn-auth w-100 py-2" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="navbar navbar-expand-md custom-common-footer">
        <div class="container custom-footer">
            <div class="navbar-brand">
                <a class="nav-link" style="font-size:15px">© 2023 TODO-INC</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JS -->
    <script src="/frontend/adminpanel/js/auth.js"></script>

    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting
            // Perform your login logic here
            // After login logic is complete, redirect to another page
            window.location.href = 'frontend/user/templates/index.php';
        });
        document.getElementById('form2').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting
            // Perform your login logic here
            // After login logic is complete, redirect to another page
            window.location.href = 'frontend/user/templates/index.php';
        });
    </script>
</body>
</html>


