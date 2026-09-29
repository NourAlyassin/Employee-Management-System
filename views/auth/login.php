<?php require "../../inc/header.php"; ?>

<div class="container content mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-4">Welcome Back</h3>

                    <form action="../../handlers/auth/loginUser.php" method="POST" novalidate>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" id="email" name="email"
                                   class="form-control" placeholder="name@example.com" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                   class="form-control" placeholder="••••••••" required>
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Login</button>

                    </form>
                </div>

                <div class="card-footer text-center bg-white py-3">
                    <small class="text-muted">Don't have an account?
                        <a href="register.php">Register</a>
                    </small>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require "../../inc/footer.php"; ?>