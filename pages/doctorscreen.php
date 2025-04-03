<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management System</title>
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
        .diagnosis-card {
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
                    <h2>Patient Management</h2>
                    <div class="d-flex">
                        <div class="dropdown me-2">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="specialtyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Enter your specialty
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="specialtyDropdown">
                                <li><a class="dropdown-item" href="#">Cardiology</a></li>
                                <li><a class="dropdown-item" href="#">Neurology</a></li>
                                <li><a class="dropdown-item" href="#">Pediatrics</a></li>
                                <li><a class="dropdown-item" href="#">General Medicine</a></li>
                            </ul>
                        </div>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Available Patients Table -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Available Patients</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>P1001</td>
                                        <td>John Doe</td>
                                        <td>45</td>
                                        <td>Male</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td><button class="btn btn-sm btn-primary">Select</button></td>
                                    </tr>
                                    <tr>
                                        <td>P1002</td>
                                        <td>Jane Smith</td>
                                        <td>32</td>
                                        <td>Female</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td><button class="btn btn-sm btn-primary">Select</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Patient Information Section -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 diagnosis-card">
                            <div class="card-header">
                                <h5 class="mb-0">Diagnosis</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Main Diagnosis</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter diagnosis">
                                        <button class="btn btn-outline-secondary" type="button">ADD</button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Other Diagnosis</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter other diagnosis">
                                        <button class="btn btn-outline-secondary" type="button">ADD</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Presenting Symptoms and Complaints</h5>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control" rows="4" placeholder="Enter patient symptoms and complaints"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Clinical Notes</h5>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control" rows="8" placeholder="Enter clinical notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Medical Actions Section -->
                <div class="form-section">
                    <h4 class="mb-4">Medical Actions</h4>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Labs</span>
                                <input type="text" class="form-control" placeholder="Enter lab test">
                                <button class="btn btn-outline-primary" type="button">Add</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Imaging</span>
                                <input type="text" class="form-control" placeholder="Enter imaging test">
                                <button class="btn btn-outline-primary" type="button">Add</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Procedures</span>
                                <input type="text" class="form-control" placeholder="Enter procedure">
                                <button class="btn btn-outline-primary" type="button">Add</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5>Prescription</h5>
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Enter Drug Name">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" placeholder="QTY">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="DOSAGE">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-wrap">
                    <button class="btn btn-action btn-primary">
                        <i class="fas fa-flask me-2"></i>Send to Laboratory
                    </button>
                    <button class="btn btn-action btn-success">
                        <i class="fas fa-pills me-2"></i>Send to Pharmacy
                    </button>
                    <button class="btn btn-action btn-info">
                        <i class="fas fa-x-ray me-2"></i>Send to Radiology
                    </button>
                    <button class="btn btn-action btn-danger ms-auto">
                        <i class="fas fa-paper-plane me-2"></i>Send
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>