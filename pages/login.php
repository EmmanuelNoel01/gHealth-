<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIS - Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
        }
        
        body {
            background-color: #f8f9fa;
            background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), 
                              url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }
        
        .login-container {
            max-width: 450px;
            margin-top: 5%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .login-header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .login-header img {
            height: 150px;
            margin-bottom: 5px;
        }
        
        .login-body {
            padding: 30px;
            background-color: white;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        .btn-login {
            background-color: var(--secondary-color);
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: 600;
        }
        
        .btn-login:hover {
            background-color: #2980b9;
        }
        
        .forgot-password {
            color: var(--secondary-color);
            text-decoration: none;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        .input-group-text {
            background-color: var(--light-color);
        }
        
        .footer-links {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }
        
        .footer-links a {
            color: var(--primary-color);
            text-decoration: none;
            margin: 0 10px;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container mx-auto">
            <div class="login-header">
                <!-- Updated image path - use relative path from your root -->
                <img src="/gHealth+/assets/logo.png" alt="HMIS Logo" class="img-fluid" onerror="this.src='https://via.placeholder.com/60?text=LOGO';this.alt='Placeholder Logo'">
                <!-- <h2>gHealth+</h2> -->
                <!-- <p class="mb-0">Secure Login Portal</p> -->
            </div>
            
            <div class="login-body">
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Added Role Dropdown -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" selected disabled>Select your role</option>
                                <option value="admin">Administrator</option>
                                <option value="doctor">Doctor</option>
                                <option value="nurse">Nurse</option>
                                <option value="pharmacist">Pharmacist</option>
                                <option value="lab_technician">Lab Technician</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="patient">Patient</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                        <!-- <a href="#" class="forgot-password float-end">Forgot password?</a> -->
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-login mb-3">
                        <i class="fas fa-sign-in-alt me-2"></i> Login
                    </button>
                    
                    <div class="text-center mt-3">
                        <p class="mb-0">New to HMIS? <a href="#" class="forgot-password">Request access</a></p>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="footer-links mt-4">
            <a href="#"><i class="fas fa-shield-alt me-1"></i> Privacy Policy</a>
            <a href="#"><i class="fas fa-question-circle me-1"></i> Help</a>
            <a href="#"><i class="fas fa-phone-alt me-1"></i> Contact Support</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>