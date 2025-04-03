<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radiology Dashboard | HMIS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .exam-priority-high { border-left: 4px solid #dc3545; }
        .exam-priority-medium { border-left: 4px solid #ffc107; }
        .exam-priority-low { border-left: 4px solid #28a745; }
        .image-thumbnail { height: 120px; object-fit: cover; cursor: pointer; }
        .navigation-tab { cursor: pointer; }
        .patient-info-card { background-color: #f8f9fa; }
        .search-results { max-height: 300px; overflow-y: auto; }
        .modal-xl-custom { max-width: 1200px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-2 bg-dark text-white p-0 vh-100">
                <div class="p-3 text-center border-bottom">
                    <h5 class="mb-0">RADIOLOGY HMIS</h5>
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

            <!-- Main Content Area -->
            <div class="col-md-10 p-4">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Radiology Workstation</h2>
                    <div>
                        <span class="me-3"><i class="fas fa-bell"></i></span>
                        <span class="me-3"><i class="fas fa-envelope"></i></span>
                        <span class="fw-bold">Dr. Radiologist</span>
                        <img src="https://via.placeholder.com/40" class="rounded-circle ms-2" alt="Profile">
                    </div>
                </div>

                <!-- Patient Info Section (will be populated after search) -->
                <div class="card patient-info-card mb-4" id="patientInfoSection" style="display: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5><i class="fas fa-user-injured me-2"></i> Patient Info</h5>
                                <p class="mb-1"><strong>Name:</strong> <span id="patientName">-</span></p>
                                <p class="mb-1"><strong>MRN:</strong> <span id="patientMRN">-</span></p>
                                <p class="mb-1"><strong>Age/Sex:</strong> <span id="patientAgeSex">-</span></p>
                            </div>
                            <div class="col-md-3">
                                <h5><i class="fas fa-calendar-alt me-2"></i> Exam Info</h5>
                                <p class="mb-1"><strong>Order Date:</strong> <span id="examOrderDate">-</span></p>
                                <p class="mb-1"><strong>Exam Type:</strong> <span id="examType">-</span></p>
                                <p class="mb-1"><strong>Accession #:</strong> <span id="examAccession">-</span></p>
                            </div>
                            <div class="col-md-3">
                                <h5><i class="fas fa-stethoscope me-2"></i> Clinical Info</h5>
                                <p class="mb-1"><strong>Ordering MD:</strong> <span id="orderingMD">-</span></p>
                                <p class="mb-1"><strong>Reason:</strong> <span id="examReason">-</span></p>
                                <p class="mb-1"><strong>History:</strong> <span id="patientHistory">-</span></p>
                            </div>
                            <div class="col-md-3 text-end">
                                <button class="btn btn-primary me-2"><i class="fas fa-file-alt me-1"></i> Report</button>
                                <button class="btn btn-success"><i class="fas fa-check me-1"></i> Complete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Work Area (hidden until patient is selected) -->
                <div class="row" id="mainWorkArea" style="display: none;">
                    <!-- Image Viewer -->
                    <div class="col-md-8">
                        <!-- ... (same image viewer as before) ... -->
                    </div>

                    <!-- Exam Details and Reporting -->
                    <div class="col-md-4">
                        <!-- ... (same reporting section as before) ... -->
                    </div>
                </div>

                <!-- Empty State (shown when no patient is selected) -->
                <div class="row mt-5" id="emptyState">
                    <div class="col-12 text-center">
                        <i class="fas fa-search fa-4x text-muted mb-3"></i>
                        <h3 class="text-muted">No Patient Selected</h3>
                        <p class="text-muted">Search for a patient or create a new radiology order to begin</p>
                        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#patientSearchModal">
                            <i class="fas fa-search me-1"></i> Search Patient
                        </button>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                            <i class="fas fa-plus-circle me-1"></i> New Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Patient Search Modal -->
    <div class="modal fade" id="patientSearchModal" tabindex="-1" aria-labelledby="patientSearchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="patientSearchModalLabel">Patient Search</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by MRN, Name, or DOB" id="patientSearchInput">
                            <button class="btn btn-primary" type="button" id="searchButton">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                    
                    <div class="search-results">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>MRN</th>
                                    <th>Name</th>
                                    <th>Age/Sex</th>
                                    <th>DOB</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="searchResultsTable">
                                <!-- Sample data - in real app this would be populated from backend -->
                                <tr>
                                    <td>123456</td>
                                    <td>John Doe</td>
                                    <td>45/M</td>
                                    <td>1978-05-15</td>
                                    <td><button class="btn btn-sm btn-primary select-patient">Select</button></td>
                                </tr>
                                <tr>
                                    <td>789012</td>
                                    <td>Jane Smith</td>
                                    <td>32/F</td>
                                    <td>1991-11-22</td>
                                    <td><button class="btn btn-sm btn-primary select-patient">Select</button></td>
                                </tr>
                                <tr>
                                    <td>345678</td>
                                    <td>Robert Johnson</td>
                                    <td>68/M</td>
                                    <td>1955-02-10</td>
                                    <td><button class="btn btn-sm btn-primary select-patient">Select</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- New Radiology Order Modal -->
    <div class="modal fade" id="newOrderModal" tabindex="-1" aria-labelledby="newOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl-custom">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="newOrderModalLabel">New Radiology Order</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Patient Information</h5>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search patient..." id="orderPatientSearch">
                                <button class="btn btn-outline-secondary" type="button" id="orderSearchButton">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">MRN</label>
                                                <input type="text" class="form-control" id="orderMRN">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" id="orderPatientName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="orderDOB">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select" id="orderGender">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h5>Order Information</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Ordering Physician</label>
                                        <select class="form-select" id="orderingPhysician">
                                            <option>Dr. Smith (Cardiology)</option>
                                            <option>Dr. Johnson (Oncology)</option>
                                            <option>Dr. Williams (ER)</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Priority</label>
                                        <select class="form-select" id="orderPriority">
                                            <option>Routine</option>
                                            <option>Urgent</option>
                                            <option selected>STAT</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Exam Type</label>
                                        <select class="form-select" id="examTypeSelect">
                                            <option>X-Ray</option>
                                            <option>CT Scan</option>
                                            <option>MRI</option>
                                            <option>Ultrasound</option>
                                            <option>Mammography</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Specific Exam</label>
                                        <select class="form-select" id="specificExam">
                                            <option>X-Ray Chest PA</option>
                                            <option>X-Ray Abdomen</option>
                                            <option>X-Ray Extremity</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Clinical Indication</label>
                                        <textarea class="form-control" rows="3" id="clinicalIndication" placeholder="Reason for exam..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Additional Information
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Special Instructions</label>
                                        <textarea class="form-control" rows="2" id="specialInstructions" placeholder="Any special instructions..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Contrast Required</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="contrastRequired">
                                            <label class="form-check-label" for="contrastRequired">
                                                Yes (specify below)
                                            </label>
                                        </div>
                                        <textarea class="form-control mt-2" rows="2" id="contrastDetails" placeholder="Contrast details..." disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="submitOrderButton">Submit Order</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript for functionality -->
    <script>
        // Sample JavaScript to handle patient selection and order submission
        document.addEventListener('DOMContentLoaded', function() {
            // Patient selection from search
            document.querySelectorAll('.select-patient').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const mrn = row.cells[0].textContent;
                    const name = row.cells[1].textContent;
                    const ageSex = row.cells[2].textContent;
                    
                    // Update patient info section
                    document.getElementById('patientName').textContent = name;
                    document.getElementById('patientMRN').textContent = mrn;
                    document.getElementById('patientAgeSex').textContent = ageSex;
                    
                    // Show the patient info and main work area
                    document.getElementById('patientInfoSection').style.display = 'block';
                    document.getElementById('mainWorkArea').style.display = 'flex';
                    document.getElementById('emptyState').style.display = 'none';
                    
                    // Close the modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('patientSearchModal'));
                    modal.hide();
                });
            });
            
            // Enable contrast details when checkbox is checked
            document.getElementById('contrastRequired').addEventListener('change', function() {
                document.getElementById('contrastDetails').disabled = !this.checked;
            });
            
            // Handle order submission
            document.getElementById('submitOrderButton').addEventListener('click', function() {
                // In a real app, this would send data to the server
                alert('Order submitted successfully!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('newOrderModal'));
                modal.hide();
                
                // For demo purposes, populate the patient info with the ordered exam
                document.getElementById('patientName').textContent = document.getElementById('orderPatientName').value || 'New Patient';
                document.getElementById('patientMRN').textContent = document.getElementById('orderMRN').value || 'NEW-'+Math.floor(Math.random()*10000);
                document.getElementById('examType').textContent = document.getElementById('examTypeSelect').value + ' - ' + 
                                                              document.getElementById('specificExam').value;
                document.getElementById('examReason').textContent = document.getElementById('clinicalIndication').value;
                document.getElementById('orderingMD').textContent = document.getElementById('orderingPhysician').value;
                document.getElementById('examOrderDate').textContent = new Date().toLocaleDateString();
                
                // Show the patient info and main work area
                document.getElementById('patientInfoSection').style.display = 'block';
                document.getElementById('mainWorkArea').style.display = 'flex';
                document.getElementById('emptyState').style.display = 'none';
            });
        });
    </script>
</body>
</html>