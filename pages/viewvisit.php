<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Queue Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .status-badge {
            font-size: 0.85rem;
            padding: 0.35em 0.65em;
        }

        .queue-card {
            border-left: 4px solid;
            transition: all 0.3s ease;
        }

        .queue-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .status-waiting {
            border-left-color: #ffc107;
        }

        .status-doctor {
            border-left-color: #0d6efd;
        }

        .status-lab {
            border-left-color: #fd7e14;
        }

        .status-pharmacy {
            border-left-color: #20c997;
        }

        .status-radiology {
            border-left-color: #6f42c1;
        }

        .status-completed {
            border-left-color: #198754;
        }

        .filter-btn.active {
            background-color: #0d6efd;
            color: white;
        }

        .service-table th {
            white-space: nowrap;
        }

        .service-table input {
            width: 80px;
        }

        .total-row {
            font-weight: bold;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Patient Queue Management</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="refreshBtn">
                                <i class="fas fa-sync-alt me-1"></i> Refresh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Status Filters -->
                <div class="btn-group mb-4" role="group" id="statusFilters">
                    <button type="button" class="btn btn-outline-primary filter-btn active"
                        data-filter="all">All</button>
                    <button type="button" class="btn btn-outline-primary filter-btn"
                        data-filter="waiting">Waiting</button>
                    <button type="button" class="btn btn-outline-primary filter-btn" data-filter="doctor">At
                        Doctor</button>
                    <button type="button" class="btn btn-outline-primary filter-btn" data-filter="lab">At Lab</button>
                    <button type="button" class="btn btn-outline-primary filter-btn" data-filter="pharmacy">At
                        Pharmacy</button>
                    <button type="button" class="btn btn-outline-primary filter-btn" data-filter="radiology">At
                        Radiology</button>
                    <button type="button" class="btn btn-outline-primary filter-btn"
                        data-filter="completed">Completed</button>
                </div>

                <!-- Search Box -->
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search patients...">
                    <button class="btn btn-outline-secondary" type="button" id="searchBtn">Search</button>
                </div>

                <!-- Patient Queue -->
                <div class="row" id="patientQueue">
                    <!-- Patient Card 1 - Waiting -->
                    <div class="col-md-6 col-lg-4 mb-4 patient-card" data-status="waiting">
                        <div class="card queue-card status-waiting h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">John Doe</h5>
                                    <span class="badge bg-warning text-dark status-badge">Waiting</span>
                                </div>
                                <p class="card-text text-muted small mb-1">Patient #: P-1001</p>
                                <p class="card-text text-muted small mb-1">Age: 35 | Male</p>
                                <p class="card-text text-muted small">Arrival: Today, 09:15 AM</p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-user-md me-1"></i> Send to Doctor
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-info-circle me-1"></i> Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Card 2 - At Doctor -->
                    <div class="col-md-6 col-lg-4 mb-4 patient-card" data-status="doctor">
                        <div class="card queue-card status-doctor h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">Mary Johnson</h5>
                                    <span class="badge bg-primary status-badge">At Doctor</span>
                                </div>
                                <p class="card-text text-muted small mb-1">Patient #: P-1002</p>
                                <p class="card-text text-muted small mb-1">Age: 28 | Female</p>
                                <p class="card-text text-muted small">With: Dr. Smith</p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-flask me-1"></i> Send to Lab
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-info-circle me-1"></i> Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Card 3 - At Lab -->
                    <div class="col-md-6 col-lg-4 mb-4 patient-card" data-status="lab">
                        <div class="card queue-card status-lab h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">Robert Brown</h5>
                                    <span class="badge bg-warning text-dark status-badge">At Lab</span>
                                </div>
                                <p class="card-text text-muted small mb-1">Patient #: P-1003</p>
                                <p class="card-text text-muted small mb-1">Age: 42 | Male</p>
                                <p class="card-text text-muted small">Test: Blood Work</p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-pills me-1"></i> Send to Pharmacy
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-info-circle me-1"></i> Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Card 4 - At Pharmacy -->
                    <div class="col-md-6 col-lg-4 mb-4 patient-card" data-status="pharmacy">
                        <div class="card queue-card status-pharmacy h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">Sarah Williams</h5>
                                    <span class="badge bg-success status-badge">At Pharmacy</span>
                                </div>
                                <p class="card-text text-muted small mb-1">Patient #: P-1004</p>
                                <p class="card-text text-muted small mb-1">Age: 31 | Female</p>
                                <p class="card-text text-muted small">Prescription: Antibiotics</p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#billingModal">
                                        <i class="fas fa-receipt me-1"></i> End Visit
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-info-circle me-1"></i> Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Card 5 - At Radiology -->
                    <div class="col-md-6 col-lg-4 mb-4 patient-card" data-status="radiology">
                        <div class="card queue-card status-radiology h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">David Wilson</h5>
                                    <span class="badge bg-info status-badge">At Radiology</span>
                                </div>
                                <p class="card-text text-muted small mb-1">Patient #: P-1005</p>
                                <p class="card-text text-muted small mb-1">Age: 56 | Male</p>
                                <p class="card-text text-muted small">Scan: Chest X-Ray</p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#billingModal">
                                        <i class="fas fa-receipt me-1"></i> End Visit
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-info-circle me-1"></i> Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Card 6 - Completed -->
                    <div class="col-md-6 col-lg-4 mb-4 patient-card" data-status="completed">
                        <div class="card queue-card status-completed h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">Lisa Taylor</h5>
                                    <span class="badge bg-success status-badge">Completed</span>
                                </div>
                                <p class="card-text text-muted small mb-1">Patient #: P-1006</p>
                                <p class="card-text text-muted small mb-1">Age: 24 | Female</p>
                                <p class="card-text text-muted small">Discharged: Today, 11:30 AM</p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#invoiceModal">
                                        <i class="fas fa-print me-1"></i> Print Invoice
                                    </button>
                                    <a href="invoice.php" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-info-circle me-1"></i> Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services and Invoice Modals (same as before) -->

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        // Filter functionality - Fixed version
        document.getElementById('statusFilters').addEventListener('click', function (e) {
            if (e.target.classList.contains('filter-btn')) {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                });

                // Add active class to clicked button
                e.target.classList.add('active');

                const filter = e.target.getAttribute('data-filter');
                const patientCards = document.querySelectorAll('.patient-card');

                patientCards.forEach(card => {
                    if (filter === 'all') {
                        card.style.display = 'block';
                    } else {
                        if (card.getAttribute('data-status') === filter) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            }
        });

        // Search functionality
        document.getElementById('searchBtn').addEventListener('click', function () {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const patientCards = document.querySelectorAll('.patient-card');

            patientCards.forEach(card => {
                const cardText = card.textContent.toLowerCase();
                if (cardText.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Refresh functionality
        document.getElementById('refreshBtn').addEventListener('click', function () {
            // In a real app, this would reload data from the server
            document.getElementById('searchInput').value = '';
            document.querySelectorAll('.patient-card').forEach(card => {
                card.style.display = 'block';
            });
            // Reset filter button to "All"
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelector('.filter-btn[data-filter="all"]').classList.add('active');
        });

        // Rest of your existing JavaScript (services and invoice functionality)
        // ...
    </script>
</body>

</html>