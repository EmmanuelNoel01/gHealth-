<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: right;
            width: 100%;
        }
        .header button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        .button-group {
            margin-bottom: 20px;
        }
        .button-group button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s, border 0.3s;
        }
        .button-group .register {
            background-color: #007bff;
            color: white;
        }
        .button-group .register:active {
            background-color: #0056b3; /* Darker blue when active */
        }
        .button-group .find {
            border: 2px solid #007bff;
            color: #007bff;
            background-color: white;
        }
        .button-group .find:hover {
            background-color: #007bff;
            color: white;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            width: 100%;
        }
        .form-row > div {
            flex-basis: 48%;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"], .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group .radio-group {
            display: flex;
            align-items: center;
        }
        .form-group .radio-group label {
            margin-right: 10px;
            font-weight: normal;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 20px auto 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <button>Log Out</button>
    </div>
    <div class="container">
        <div class="form-container">
            <div class="button-group">
                <button type="button" class="register">Register Patient</button>
                <button type="button" class="find">Find Patient</button>
            </div>
            <form method="post" action="register_patient.php">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nin">NIN</label>
                        <input type="text" id="nin" name="nin" required>
                    </div>
                    <div class="form-group">
                        <label>Marital Status</label>
                        <div class="radio-group">
                            <input type="radio" id="single" name="marital_status" value="single" required>
                            <label for="single">Single</label>
                            <input type="radio" id="married" name="marital_status" value="married">
                            <label for="married">Married</label>
                            <input type="radio" id="widow" name="marital_status" value="widow">
                            <label for="widow">Widow</label>
                            <input type="radio" id="divorced" name="marital_status" value="divorced">
                            <label for="divorced">Divorced</label>
                            <input type="radio" id="other" name="marital_status" value="other">
                            <label for="other">Other</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" required>
                    </div>
                    <div class="form-group">
                        <label for="phone1">Phone 1</label>
                        <input type="text" id="phone1" name="phone1" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone2">Phone 2</label>
                        <input type="text" id="phone2" name="phone2">
                    </div>
                    <div class="form-group">
                        <label for="email_address">Email Address</label>
                        <input type="text" id="email_address" name="email_address" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="spouse_name">Spouse Name</label>
                        <input type="text" id="spouse_name" name="spouse_name">
                    </div>
                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <div class="radio-group">
                            <input type="radio" id="male" name="sex" value="male" required>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="sex" value="female">
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-submit">Submit Patient</button>
            </form>
        </div>
    </div>
</body>
</html>