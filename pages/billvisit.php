<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Visit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout {
            color: red;
            font-weight: bold;
            text-decoration: none;
        }
        .content {
            margin: 20px;
            text-align: center;
        }
        .content h2 {
            margin: 20px 0;
        }
        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
        .table {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            width: 80%;
        }
        .table div {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }
        .input-box {
            background-color: #f0f0f0;
            height: 40px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <button onclick="history.back()">Back</button>
        <h3>Martin Ssembuze</h3>
        <a href="#" class="logout">Log Out</a>
    </div>
    <div class="content">
        <div class="table-container">
            <div class="table">
                <div>Service</div>
                <div>Amount</div>
                <div class="input-box"></div>
                <div class="input-box"></div>
            </div>
        </div>
    </div>
</body>
</html>
