<!DOCTYPE html>
<html>
<head>
    <title>View Visits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2196F3;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header a {
            color: white;
            text-decoration: none;
            margin-left: 10px;
        }
        header a.logout {
            color: #f44336;
        }
        header .back-arrow {
            font-size: 20px;
            margin-right: auto; /* Pushes the logout button to the right */
        }
        nav {
            display: flex;
            justify-content: space-around;
            background-color: #f1f1f1;
            padding: 10px;
        }
        nav a {
            color: #2196F3;
            text-decoration: none;
        }
        main {
            padding: 20px;
        }
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-container input {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        .search-container button {
            background-color: #2196F3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .patient-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f1f1f1;
            padding: 10px;
        }
        .patient-info button {
            background-color: #2196F3;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
        }
        .patient-info .end-visit {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <header>
        <a href="#" class="back-arrow">&larr;</a>
        <br>
        <br>
        <a href="#" class="logout">Log Out</a>
    </header>
        <br>
        <br>
    <main>
        <div class="search-container">
            <input type="text" placeholder="Enter Patient Name">
            <button>Search</button>
        </div>
        <br>
        <br>
        <div class="patient-info">
            <div>Martin Ssembuze</div>
            <button>Ongoing</button>
            <button>Ongoing</button>
            <button>Ongoing</button>
            <button>Ongoing</button>
            <button>Ongoing</button>
            <button>Ongoing</button>
            <button class="end-visit">End Visit</button>
        </div>
    </main>
</body>
</html>