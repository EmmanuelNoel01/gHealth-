<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIS - Triage Workflow</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .priority-1 {
            background-color: #ffebee;
        }

        .priority-2 {
            background-color: #fff8e1;
        }

        .priority-3 {
            background-color: #e8f5e9;
        }

        .priority-4 {
            background-color: #e3f2fd;
        }

        .patient-card {
            transition: all 0.3s;
            cursor: pointer;
        }

        .patient-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .vital-badge {
            font-size: 0.8rem;
        }

        .triage-form-section {
            display: none;
        }

        .active-tab {
            border-bottom: 3px solid #0d6efd;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="text-primary">HMIS Triage</h4>
                    </div>
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
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Workflow Tabs -->
                <ul class="nav nav-tabs mb-4" id="triageTabs">
                    <li class="nav-item">
                        <a class="nav-link active active-tab" id="queue-tab" data-bs-toggle="tab" href="#queue">
                            <i class="fas fa-list-ol me-1"></i> Triage Queue
                        </a>
                    </li>
                    <li class="nav-item d-none">
                        <a class="nav-link" id="triage-tab" data-bs-toggle="tab" href="#triage">
                            <i class="fas fa-edit me-1"></i> Perform Triage
                        </a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Queue Tab -->
                    <div class="tab-pane fade show active" id="queue">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Patients Waiting for Triage</h5>
                                    <span class="badge bg-light text-dark">15 patients</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Search Box -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="patientSearch"
                                                placeholder="Search by name or ID">
                                            <button class="btn btn-outline-secondary" type="button" id="searchButton">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select" id="priorityFilter">
                                            <option value="">All Priorities</option>
                                            <option value="1">Priority 1 (Emergency)</option>
                                            <option value="2">Priority 2 (Urgent)</option>
                                            <option value="3">Priority 3 (Semi-urgent)</option>
                                            <option value="4">Priority 4 (Non-urgent)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary w-100" id="refreshQueue">
                                            <i class="fas fa-sync-alt me-1"></i> Refresh
                                        </button>
                                    </div>
                                </div>

                                <!-- Patient Queue -->
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Queue #</th>
                                                <th>Patient</th>
                                                <th>Vital Signs</th>
                                                <th>Arrival Time</th>
                                                <th>Waiting Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Priority 1 Patient -->
                                            <tr class="priority-1">
                                                <td>1</td>
                                                <td>
                                                    <strong>John Smith</strong><br>
                                                    <small class="text-muted">ID: P10045 | 42yo Male</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-danger vital-badge me-1">BP: 190/110</span>
                                                    <span class="badge bg-danger vital-badge me-1">HR: 120</span>
                                                    <span class="badge bg-warning vital-badge">SpO2: 88%</span>
                                                </td>
                                                <td>10:15 AM</td>
                                                <td><span class="badge bg-danger">45 min</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary triage-start"
                                                        data-patient-id="10045">
                                                        <i class="fas fa-user-edit me-1"></i> Start Triage
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Priority 2 Patient -->
                                            <tr class="priority-2">
                                                <td>2</td>
                                                <td>
                                                    <strong>Sarah Johnson</strong><br>
                                                    <small class="text-muted">ID: P10046 | 35yo Female</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning vital-badge me-1">BP: 150/95</span>
                                                    <span class="badge bg-warning vital-badge me-1">HR: 105</span>
                                                    <span class="badge bg-success vital-badge">SpO2: 96%</span>
                                                </td>
                                                <td>10:30 AM</td>
                                                <td><span class="badge bg-warning">30 min</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary triage-start"
                                                        data-patient-id="10046">
                                                        <i class="fas fa-user-edit me-1"></i> Start Triage
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Priority 3 Patient -->
                                            <tr class="priority-3">
                                                <td>3</td>
                                                <td>
                                                    <strong>Michael Brown</strong><br>
                                                    <small class="text-muted">ID: P10047 | 28yo Male</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success vital-badge me-1">BP: 120/80</span>
                                                    <span class="badge bg-success vital-badge me-1">HR: 75</span>
                                                    <span class="badge bg-success vital-badge">SpO2: 98%</span>
                                                </td>
                                                <td>10:45 AM</td>
                                                <td><span class="badge bg-success">15 min</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary triage-start"
                                                        data-patient-id="10047">
                                                        <i class="fas fa-user-edit me-1"></i> Start Triage
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <nav aria-label="Patient queue navigation">
                                    <ul class="pagination justify-content-center mt-3">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Triage Form Tab -->
                    <div class="tab-pane fade" id="triage">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Patient Triage Assessment</h5>
                            </div>
                            <div class="card-body">
                                <!-- Patient Info -->
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h5><i class="fas fa-user me-2"></i> Patient Information</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>Name:</strong> <span id="triage-patient-name">John
                                                        Smith</span></p>
                                            </div>
                                            <div class="col-md-2">
                                                <p><strong>Age:</strong> <span id="triage-patient-age">42</span></p>
                                            </div>
                                            <div class="col-md-2">
                                                <p><strong>Sex:</strong> <span id="triage-patient-sex">Male</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Patient ID:</strong> <span
                                                        id="triage-patient-id">P10045</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="alert alert-warning">
                                            <i class="fas fa-clock me-2"></i>
                                            <strong>Waiting Time:</strong> <span id="triage-waiting-time">45
                                                minutes</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Triage Form -->
                                <form id="triageAssessmentForm">
                                    <div class="row">
                                        <!-- Vital Signs -->
                                        <div class="col-md-6">
                                            <div class="card mb-4">
                                                <div class="card-header bg-light">
                                                    <h6 class="mb-0"><i class="fas fa-heartbeat me-2"></i>Vital Signs
                                                    </h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="bloodPressure" class="form-label">Blood
                                                                Pressure</label>
                                                            <input type="text" class="form-control" id="bloodPressure"
                                                                placeholder="e.g. 120/80">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="heartRate" class="form-label">Heart Rate
                                                                (bpm)</label>
                                                            <input type="number" class="form-control" id="heartRate"
                                                                placeholder="e.g. 72">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="temperature" class="form-label">Temperature
                                                                (°C)</label>
                                                            <input type="number" step="0.1" class="form-control"
                                                                id="temperature" placeholder="e.g. 36.5">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="respiratoryRate" class="form-label">Respiratory
                                                                Rate</label>
                                                            <input type="number" class="form-control"
                                                                id="respiratoryRate" placeholder="e.g. 16">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="oxygenSaturation" class="form-label">SpO2
                                                                (%)</label>
                                                            <input type="number" class="form-control"
                                                                id="oxygenSaturation" placeholder="e.g. 98">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="painScore" class="form-label">Pain Score
                                                                (0-10)</label>
                                                            <input type="number" min="0" max="10" class="form-control"
                                                                id="painScore" placeholder="0-10">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Triage Assessment -->
                                        <div class="col-md-6">
                                            <div class="card mb-4">
                                                <div class="card-header bg-light">
                                                    <h6 class="mb-0"><i class="fas fa-clipboard-check me-2"></i>Triage
                                                        Assessment</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="triagePriority" class="form-label">Priority
                                                            Level</label>
                                                        <select class="form-select" id="triagePriority" required>
                                                            <option value="">Select priority</option>
                                                            <option value="1">1 - Emergency (Immediate care needed)
                                                            </option>
                                                            <option value="2">2 - Urgent (Care within 30 mins)</option>
                                                            <option value="3">3 - Semi-urgent (Care within 1-2 hours)
                                                            </option>
                                                            <option value="4">4 - Non-urgent (Care within 4 hours)
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="chiefComplaint" class="form-label">Chief Complaints
                                                            From Patients</label>
                                                        <textarea class="form-control" id="chiefComplaint" rows="2"
                                                            required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="triageNotes" class="form-label">Triage Notes</label>
                                                        <textarea class="form-control" id="triageNotes"
                                                            rows="3"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="assignedDoctor" class="form-label">Assign to
                                                            Doctor</label>
                                                        <select class="form-select" id="assignedDoctor" required>
                                                            <option value="">Select doctor</option>
                                                            <option value="dr_jones">Dr. Jones (Emergency)</option>
                                                            <option value="dr_smith">Dr. Smith (General Medicine)
                                                            </option>
                                                            <option value="dr_lee">Dr. Lee (Pediatrics)</option>
                                                            <option value="dr_wilson">Dr. Wilson (Surgery)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary" id="cancelTriage">
                                            <i class="fas fa-times me-1"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-paper-plane me-1"></i> Send to Doctor
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Simulate starting triage for a patient
        document.querySelectorAll('.triage-start').forEach(button => {
            button.addEventListener('click', function () {
                const patientId = this.getAttribute('data-patient-id');

                // In a real app, you would fetch patient data here
                console.log(`Starting triage for patient ID: ${patientId}`);

                // Switch to the triage tab
                const triageTab = new bootstrap.Tab(document.getElementById('triage-tab'));
                triageTab.show();
            });
        });

        // Cancel button returns to queue
        document.getElementById('cancelTriage').addEventListener('click', function () {
            const queueTab = new bootstrap.Tab(document.getElementById('queue-tab'));
            queueTab.show();
        });

        // Form submission
        document.getElementById('triageAssessmentForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Validate form
            const priority = document.getElementById('triagePriority').value;
            const chiefComplaint = document.getElementById('chiefComplaint').value;

            if (!priority || !chiefComplaint) {
                alert('Please fill in all required fields');
                return;
            }

            // In a real app, you would submit the form data to the server here
            console.log('Triage data submitted:', {
                patientId: document.getElementById('triage-patient-id').textContent,
                vitalSigns: {
                    bp: document.getElementById('bloodPressure').value,
                    hr: document.getElementById('heartRate').value,
                    temp: document.getElementById('temperature').value,
                    rr: document.getElementById('respiratoryRate').value,
                    spo2: document.getElementById('oxygenSaturation').value,
                    pain: document.getElementById('painScore').value
                },
                priority: priority,
                complaint: chiefComplaint,
                notes: document.getElementById('triageNotes').value,
                doctor: document.getElementById('assignedDoctor').value
            });

            // Show success message and return to queue
            alert('Triage completed and patient sent to doctor!');
            const queueTab = new bootstrap.Tab(document.getElementById('queue-tab'));
            queueTab.show();

            // Reset form
            this.reset();
        });
    </script>
</body>

</html>