<?php
// triage.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 900px;
            margin: 50px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px 10px 0 0;
        }
        .header a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .header a:hover {
            text-decoration: underline;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .form-footer {
            display: flex;
            justify-content: center;
        }
    </style>
    <script>
        function calculateBMI() {
            const height = parseFloat(document.getElementById('height').value);
            const weight = parseFloat(document.getElementById('weight').value);
            if (height > 0 && weight > 0) {
                const bmi = (weight / ((height / 100) * (height / 100))).toFixed(2);
                document.getElementById('bmi').value = bmi;
            } else {
                document.getElementById('bmi').value = '';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="#">Back</a>
            <a style="color:red" href="#"><span>Log Out</span></a>
        </div>
        <h3 class="text-center mt-3">Triage</h3>
        <form action="process_triage.php" method="post">
            <div class="form-group">
                <label>The problem / Pain came</label><br>
                <label><input type="radio" name="pain_came" value="Suddenly"> Suddenly</label>
                <label><input type="radio" name="pain_came" value="Gradually"> Gradually</label>
                <label><input type="radio" name="pain_came" value="Comes and goes"> Comes and goes</label>
                <label><input type="radio" name="pain_came" value="No pain"> No pain</label>
            </div>
            
            <div class="form-group">
                <label>Problems in the last few days</label><br>
                <label><input type="checkbox" name="problems[]" value="Chills"> Chills</label>
                <label><input type="checkbox" name="problems[]" value="Coughing"> Coughing</label>
                <label><input type="checkbox" name="problems[]" value="Cramps"> Cramps</label>
                <label><input type="checkbox" name="problems[]" value="Diarrhea"> Diarrhea</label>
                <label><input type="checkbox" name="problems[]" value="Discomfort"> Discomfort</label>
                <label><input type="checkbox" name="problems[]" value="Dizziness"> Dizziness</label>
                <label><input type="checkbox" name="problems[]" value="Fainting"> Fainting</label>
                <label><input type="checkbox" name="problems[]" value="Fever"> Fever</label>
                <label><input type="checkbox" name="problems[]" value="Headache"> Headache</label>
                <label><input type="checkbox" name="problems[]" value="Itching"> Itching</label>
                <label><input type="checkbox" name="problems[]" value="Nausea"> Nausea</label>
                <label><input type="checkbox" name="problems[]" value="Pain"> Pain</label>
                <label><input type="checkbox" name="problems[]" value="Rashes"> Rashes</label>
                <label><input type="checkbox" name="problems[]" value="Tremor"> Tremor</label>
                <label><input type="checkbox" name="problems[]" value="Vomiting"> Vomiting</label>
                <label><input type="checkbox" name="problems[]" value="Drink / Eat"> Drink / Eat</label>
                <label><input type="checkbox" name="problems[]" value="Sleep"> Sleep</label>
            </div>
            
            <div class="form-group">
                <label>Other symptoms</label>
                <input type="text" name="other_symptoms" class="form-control">
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="height">Height</label>
                    <input type="number" step="0.1" id="height" name="height" class="form-control" oninput="calculateBMI()">
                </div>
                <div class="form-group col-md-3">
                    <label for="weight">Weight</label>
                    <input type="number" step="0.1" id="weight" name="weight" class="form-control" oninput="calculateBMI()">
                </div>
                <div class="form-group col-md-3">
                    <label for="bmi">BMI</label>
                    <input type="text" id="bmi" name="bmi" class="form-control" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="body_temperature">Body temperature</label>
                    <input type="number" step="0.1" id="body_temperature" name="body_temperature" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="pulse_rate">Pulse Rate</label>
                    <input type="number" id="pulse_rate" name="pulse_rate" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="respiratory_rate">Respiratory Rate</label>
                    <input type="number" id="respiratory_rate" name="respiratory_rate" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="ph">pH</label>
                    <input type="text" id="ph" name="ph" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="blood_pressure">Blood Pressure</label>
                    <input type="text" id="blood_pressure" name="blood_pressure" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="blood_sugar">Blood Sugar</label>
                    <input type="number" step="0.1" id="blood_sugar" name="blood_sugar" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="oxygen_saturation">Oxygen Saturation</label>
                    <input type="text" id="oxygen_saturation" name="oxygen_saturation" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="entered_by">Entered By</label>
                    <input type="text" id="entered_by" name="entered_by" class="form-control">
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Save Triage</button>
            </div>
        </form>
    </div>
</body>
</html>