<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Screen</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: right;
        }

        .header h1 {
            margin: 0;
        }

        .form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group textarea {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: none;
        }

        .results-group textarea {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: none;
            background-color: #f2f2f2;
            cursor: not-allowed;
        }

        .buttons {
            grid-column: 1 / -1;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .buttons button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <a style="color:red" href="#"><span>Log Out</span></a>
        </div>
        <div class="form-container">
            <div class="proposed">
                <h2>Proposed</h2>
                <form>
                    <div class="form-group">
                        <label for="labs">Labs</label>
                        <textarea id="labs" name="labs" rows="3" placeholder="Enter labs"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imaging">Imaging</label>
                        <textarea id="imaging" name="imaging" rows="3" placeholder="Enter imaging"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="test-procedures">Test or Procedures</label>
                        <textarea id="test-procedures" name="test-procedures" rows="3" placeholder="Enter test or procedures"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="drugs">Drugs</label>
                        <textarea id="drugs" name="drugs" rows="3" placeholder="Enter drugs"></textarea>
                    </div>
                </form>
            </div>
            <div class="results">
                <h2>Results</h2>
                <div class="form-group">
                    <label for="labs-result">Labs</label>
                    <textarea id="labs-result" name="labs-result" rows="3" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="imaging-result">Imaging</label>
                    <textarea id="imaging-result" name="imaging-result" rows="3" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="test-procedures-result">Test or Procedures</label>
                    <textarea id="test-procedures-result" name="test-procedures-result" rows="3" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="drugs-result">Drugs</label>
                    <textarea id="drugs-result" name="drugs-result" rows="3" disabled></textarea>
                </div>
            </div>
        </div>
        <br>
        <br>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <select id="destination" name="destination">
                            <option value="laboratory">Send to Laboratory</option>
                            <option value="pharmacy">Send to Pharmacy</option>
                            <option value="radiology">Send to Radiology</option>
                            <option value="radiology">Send to FrontDesk</option>
                        </select>
                    </div>
        <br>
        <br>
        <div class="buttons">
            <button type="submit">Send</button>
        </div>
    </div>
</body>
</html>