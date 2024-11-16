<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent scrolling */
        }
        
    .background-image {
        position: fixed; /* Fix it to the viewport */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Cover the entire area */
        z-index: -1; /* Send it to the back */
    }

    .content {
        position: relative; /* Keep this above the background */
        z-index: 1; /* Bring content in front */
        /* Additional styles for your content */
    }

        .bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/bg.png'); /* Corrected image path */
            background-size: cover;
            background-position: center;
            filter: blur(8px); /* Adjust blur amount here */
            z-index: -1; /* Send background to the back */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly more opaque for readability */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-box button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<img src="assets\\bg.png" alt="Background Image" class="background-image">
<div class="content">
    <div class="container">
        <div class="login-box">
            <h2>HMS</h2>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Enter Username" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <button type="submit">Log In</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
