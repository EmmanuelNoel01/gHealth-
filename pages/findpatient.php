<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Management - Patient Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        .nav-link {
            color: #495057;
            font-weight: 500;
        }
        .nav-link:hover, .nav-link.active {
            color: #0d6efd;
            background-color: #e9ecef;
        }
        .search-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .patient-info-card {
            border-left: 4px solid #0d6efd;
        }
        .action-btn {
            min-width: 120px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar p-0">
                <div class="p-3">
                    <h4 class="text-center mb-4">Clinic Management</h4>
                    <hr>
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
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">
                <h2 class="mb-4">Patient Dashboard</h2>
                
                <!-- Search Card -->
                <div class="card search-card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Patient Search</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Patient Number</span>
                                    <input type="text" class="form-control" placeholder="Enter patient number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Patient Name</span>
                                    <input type="text" class="form-control" placeholder="Enter patient name">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">
                                <i class="fas fa-search me-1"></i> Search
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Patient Information -->
                <div class="card patient-info-card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">Martin Ssembuze</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="mb-1"><strong>Patient Number:</strong></p>
                                        <p>2490786</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1"><strong>Date of Birth:</strong></p>
                                        <p>2000-03-17</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1"><strong>Gender:</strong></p>
                                        <p>Male</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <button class="btn btn-success action-btn mb-2">
                                    <i class="fas fa-user-edit me-1"></i> Edit Patient
                                </button>
                                <button class="btn btn-danger action-btn">
                                    <i class="fas fa-trash-alt me-1"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visit Management -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Visit Management</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Select Doctor</label>
                                <select class="form-select">
                                    <option selected>Choose doctor...</option>
                                    <option>Dr. Smith</option>
                                    <option>Dr. Johnson</option>
                                    <option>Dr. Williams</option>
                                </select>
                            </div>
                            <div class="col-md-6 d-flex align-items-end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="consultationPaid">
                                    <label class="form-check-label" for="consultationPaid">
                                        Is consultation paid?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary action-btn">
                                <i class="fas fa-plus-circle me-1"></i> Queue Visit
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recent Visits Table -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Visits</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Doctor</th>
                                        <th>Diagnosis</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2023-04-15</td>
                                        <td>Dr. Smith</td>
                                        <td>Common Cold</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2023-03-28</td>
                                        <td>Dr. Johnson</td>
                                        <td>Annual Checkup</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">View</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>