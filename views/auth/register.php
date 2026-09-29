<?php require "../../inc/header.php"; ?>

<div class="container content mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-4">Create an Account</h3>

                    <form action="../../handlers/auth/registerUser.php" method="POST" novalidate>

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name"
                                   class="form-control" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" id="email" name="email"
                                   class="form-control" placeholder="name@example.com" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                   class="form-control" placeholder="••••••••" required minlength="6">
                            <div class="form-text">At least 6 characters.</div>
                            <div class="invalid-feedback">Password must be at least 6 characters.</div>
                        </div>

                        <div class="mb-4">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password"
                                   class="form-control" placeholder="••••••••" required>
                            <div class="invalid-feedback">Please confirm your password.</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Create Account</button>

                    </form>
                </div>

                <div class="card-footer text-center bg-white py-3">
                    <small class="text-muted">Already have an account?
                        <a href="login.php">Login</a>
                    </small>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require "../../inc/footer.php"; ?>