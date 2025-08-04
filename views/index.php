<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
             <div class="card w-50 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center text-primary">LOGIN<i class="fa-solid fa-right-to-bracket"></i></h1>
                </div>

                <div class="card-body">
                    <form action="../actions/login.php" method="post">
                    <div class="mb-3 d-flex">
                        <label for="username" class="form-label">Userame </label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="USERNAME" autofocus required>
                    </div>
                        
                    <div class="mb-3 d-flex">
                        <label for="password" class="form-label">Password </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" required>
                    </div>
                        

                        <button type="submit" class="btn btn-primary w-100 mb-3">Log in</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger d-block mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create Account
                        </button>

                    </form>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="card-header bg-white border-0 py-3">
                                    <h1 class="text-center text-danger"><i class="fa-solid fa-user-plus"></i>Registration</h1>
                                </div>
                                <div class="modal-body">
                                    <form action="../actions/register.php" method="post">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="first-name" class="form-label">First Name</label>
                                                <input type="text" name="first_name" id="first-name" class="form-control" required autofocus>
                                            </div>
                                            <div class="col mb-3">
                                                <label for="last-name" class="form-label">Last Name</label>
                                                <input type="text" name="last_name" id="last-name" class="form-control" required>
                                            </div>
                                        </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Userame</label>
                                                <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" id="password" class="form-control fw-bold" minlength="8" aria-describedby="password-info" required>
                                            </div>

                                            <button type="submit" class="btn btn-danger w-100 mb-4">Register</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>