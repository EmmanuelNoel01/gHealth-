<!DOCTYPE html>
<html>
<head>
    <title>Find Patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            padding: 20px; 
        }
        .container {
            max-width: 800px;
            width: 100%; 
            padding: 20px;
            background-color: white; 
            border: 1px solid #ccc; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        }
        .header {
            background-color: #2196F3;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .form-group1 {
            margin-bottom: 30px; 
            display: flex;
            flex-direction: column; 
        }
        label {
            font-weight: bold;
            margin-bottom: 5px; 
        }
        input[type="text"], select {
            width: 100%; 
            max-width: 200px; 
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            display: block;
            width: 150px; 
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 auto;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #2196F3;
            color: white;
        }
        .is-paid-consultation {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Find Patient</h1>
        </div>
        <br>
        <br>
        <div class="form-group">
            <button class="btn" onclick="window.location.href='register-patient.html'">Register Patient</button>
            <button class="btn" onclick="searchPatient()">Find Patient</button>
            <button class="btn" onclick="window.location.href='view-visits.html'">View Visits</button>
        </div>
        <div class="form-group1">
            <label for="patient-number">Enter Patient Number</label>
            <input type="text" id="patient-number" placeholder="Enter Patient Number">
        </div>
        <div class="form-group1">
            <label for="patient-number">OR</label>
        </div>
        <div class="form-group1">
            <label for="patient-name">Enter Patient Name</label>
            <input type="text" id="patient-name" placeholder="Enter Patient Name">
        </div>
        <button class="btn" onclick="searchPatient()">Search</button>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Patient Number</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody id="patient-table-body">
                <tr>
                    <td>Martin Ssembube</td>
                    <td>2499786</td>
                    <td>2000-03-17</td>
                    <td>Male</td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <div class="form-group">
            <label for="doctor-select">Select Doctor to see</label>
            <select id="doctor-select">
                <option value="">Select Doctor</option>
                <option value="doctor1">Doctor 1</option>
                <option value="doctor2">Doctor 2</option>
                <option value="doctor3">Doctor 3</option>
            </select>
        </div>
        <button class="btn" onclick="queueVisit()">Queue Visit</button>
        <br>
        <br>
        <div class="form-group1 is-paid-consultation">
            <label>Is consultation Paid?</label>
            <input type="checkbox" id="is-paid-consultation">
        </div>
    </div>
    <script>
        function searchPatient() {
            console.log("Search button clicked");
        }
        function queueVisit() {
            console.log("Queue Visit button clicked");
        }
    </script>
</body>
</html>