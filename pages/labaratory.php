<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            background-color: #f8f9fa;
            height: 100vh;
            position: sticky;
            top: 0;
        }
        .main-content {
            padding: 20px;
        }
        .test-card {
            border-left: 4px solid #0d6efd;
        }
        .form-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-action {
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .status-badge {
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar p-3">
                <h4 class="text-center mb-4">Hospital System</h4>
                <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-primary" id="triageLink" href="#triageMenu" role="button">
                                <i class="fas fa-user-nurse me-2"></i> Triage (Nurse)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" id="doctorLink" href="#doctorMenu" role="button">
                                <i class="fas fa-user-md me-2"></i> Doctor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" id="labLink" href="#labMenu" role="button">
                                <i class="fas fa-flask me-2"></i> Lab
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" id="radiologyLink" href="#radiologyMenu" role="button">
                                <i class="fas fa-x-ray me-2"></i> Radiology
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" id="pharmacyLink" href="#pharmacyMenu" role="button">
                                <i class="fas fa-pills me-2"></i> Pharmacy
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" id="billingLink" href="#billingMenu" role="button">
                                <i class="fas fa-file-invoice-dollar me-2"></i> Billers
                            </a>
                        </li>
                    </ul>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            let navLinks = document.querySelectorAll(".nav-link");

                            // Check if a section was previously selected (stored in localStorage)
                            let activeSection = localStorage.getItem("activeSection");
                            if (activeSection) {
                                document.getElementById(activeSection)?.classList.add("active");
                            }

                            // Add click event to each menu item
                            navLinks.forEach(link => {
                                link.addEventListener("click", function () {
                                    // Remove 'active' from all links
                                    navLinks.forEach(item => item.classList.remove("active"));

                                    // Add 'active' to the clicked link
                                    this.classList.add("active");

                                    // Save active section in localStorage
                                    localStorage.setItem("activeSection", this.id);
                                });
                            });
                        });
                    </script>
                    <style>
                        .nav-link.active {
                            background-color: #007bff !important;
                            /* Highlight color */
                            color: white !important;
                            border-radius: 5px;
                            font-weight: bold;
                        }
                    </style>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Laboratory Management</h2>
                    <div class="d-flex">
                        <div class="input-group me-2" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search tests or patients">
                            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                        </div>
                        <button class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>New Test
                        </button>
                    </div>
                </div>

                <!-- Pending Tests Section -->
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Pending Tests</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Test ID</th>
                                        <th>Patient</th>
                                        <th>Test Type</th>
                                        <th>Ordered By</th>
                                        <th>Order Date</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>LT-1001</td>
                                        <td>John Doe (ID: P1001)</td>
                                        <td>CBC</td>
                                        <td>Dr. Smith</td>
                                        <td>2023-06-15</td>
                                        <td><span class="badge bg-danger">High</span></td>
                                        <td><span class="badge bg-warning status-badge">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Process</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LT-1002</td>
                                        <td>Jane Smith (ID: P1002)</td>
                                        <td>Lipid Profile</td>
                                        <td>Dr. Johnson</td>
                                        <td>2023-06-15</td>
                                        <td><span class="badge bg-success">Normal</span></td>
                                        <td><span class="badge bg-warning status-badge">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Process</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Test Processing Section -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 test-card">
                            <div class="card-header">
                                <h5 class="mb-0">Test Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Test Type</label>
                                    <select class="form-select">
                                        <option selected>Select test type</option>
                                        <option>Complete Blood Count (CBC)</option>
                                        <option>Basic Metabolic Panel</option>
                                        <option>Lipid Profile</option>
                                        <option>Liver Function Test</option>
                                        <option>Thyroid Function Test</option>
                                        <option>Urinalysis</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="form-select">
                                        <option>Normal</option>
                                        <option>High</option>
                                        <option>Stat (Immediate)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter any special instructions"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Test Results</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Result Value</label>
                                    <input type="text" class="form-control" placeholder="Enter result value">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Unit</label>
                                    <input type="text" class="form-control" placeholder="Enter unit of measurement">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Reference Range</label>
                                    <input type="text" class="form-control" placeholder="Enter reference range">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Interpretation</label>
                                    <textarea class="form-control" rows="2" placeholder="Enter interpretation notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test Parameters Section (for complex tests) -->
                <div class="form-section">
                    <h4 class="mb-4">Test Parameters</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Parameter</th>
                                    <th>Result</th>
                                    <th>Unit</th>
                                    <th>Reference Range</th>
                                    <th>Flag</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hemoglobin</td>
                                    <td><input type="text" class="form-control form-control-sm" value="14.2"></td>
                                    <td>g/dL</td>
                                    <td>13.5-17.5</td>
                                    <td><span class="badge bg-success">Normal</span></td>
                                </tr>
                                <tr>
                                    <td>WBC Count</td>
                                    <td><input type="text" class="form-control form-control-sm" value="6.8"></td>
                                    <td>x10³/µL</td>
                                    <td>4.5-11.0</td>
                                    <td><span class="badge bg-success">Normal</span></td>
                                </tr>
                                <tr>
                                    <td>Platelets</td>
                                    <td><input type="text" class="form-control form-control-sm" value="185"></td>
                                    <td>x10³/µL</td>
                                    <td>150-450</td>
                                    <td><span class="badge bg-success">Normal</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-wrap justify-content-between">
                    <div>
                        <button class="btn btn-action btn-outline-secondary">
                            <i class="fas fa-print me-2"></i>Print Labels
                        </button>
                        <button class="btn btn-action btn-outline-primary">
                            <i class="fas fa-file-export me-2"></i>Export Data
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-action btn-danger">
                            <i class="fas fa-times me-2"></i>Cancel Test
                        </button>
                        <button class="btn btn-action btn-warning">
                            <i class="fas fa-save me-2"></i>Save Draft
                        </button>
                        <button class="btn btn-action btn-success">
                            <i class="fas fa-check me-2"></i>Complete Test
                        </button>
                    </div>
                </div>

                <!-- Completed Tests Section -->
                <div class="card mt-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Recently Completed Tests</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Test ID</th>
                                        <th>Patient</th>
                                        <th>Test Type</th>
                                        <th>Completed On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>LT-0998</td>
                                        <td>Robert Brown (ID: P0998)</td>
                                        <td>Glucose Test</td>
                                        <td>2023-06-14 14:30</td>
                                        <td><span class="badge bg-success status-badge">Completed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info">View</button>
                                            <button class="btn btn-sm btn-primary">Print</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LT-0997</td>
                                        <td>Alice Green (ID: P0997)</td>
                                        <td>Liver Function Test</td>
                                        <td>2023-06-14 11:15</td>
                                        <td><span class="badge bg-success status-badge">Completed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info">View</button>
                                            <button class="btn btn-sm btn-primary">Print</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>