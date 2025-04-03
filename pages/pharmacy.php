<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Dashboard | HMIS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar { background-color: #2c3e50; }
        .nav-link { color: white !important; }
        .nav-link:hover { background-color: #34495e; }
        .priority-high { border-left: 4px solid #e74c3c; }
        .priority-medium { border-left: 4px solid #f39c12; }
        .priority-low { border-left: 4px solid #2ecc71; }
        .prescription-card { transition: all 0.3s; }
        .prescription-card:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .search-box { max-width: 400px; }
        .inventory-low { background-color: #fff8e1; }
        .inventory-critical { background-color: #ffebee; }
        .patient-badge { cursor: pointer; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar text-white p-0 vh-100">
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
            <div class="col-md-10 p-4">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="fas fa-prescription-bottle-alt me-2"></i> Pharmacy Dashboard</h2>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#patientSearchModal">
                            <i class="fas fa-search me-1"></i> Search Patient
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i> Pharm. John Doe
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Selected Patient Banner -->
                <div class="card mb-4" id="selectedPatientBanner" style="display: none;">
                    <div class="card-body py-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold me-3" id="selectedPatientName">No patient selected</span>
                                <span class="badge bg-primary me-2" id="selectedPatientMRN"></span>
                                <span class="badge bg-secondary me-2" id="selectedPatientAgeSex"></span>
                                <span class="badge bg-info" id="selectedPatientAllergies"></span>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#newPrescriptionModal">
                                    <i class="fas fa-plus me-1"></i> New Prescription
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" id="clearPatientSelection">
                                    <i class="fas fa-times me-1"></i> Clear
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient Medications (shown when patient is selected) -->
                <div class="card mb-4" id="patientMedications" style="display: none;">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Current Medications</span>
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#newPrescriptionModal">
                                <i class="fas fa-plus me-1"></i> Add Medication
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Medication</th>
                                    <th>Prescribed</th>
                                    <th>Prescriber</th>
                                    <th>Last Filled</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="patientMedsTable">
                                <!-- Will be populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Empty State (shown when no patient is selected) -->
                <div class="row mt-5" id="emptyState">
                    <div class="col-12 text-center">
                        <i class="fas fa-user-injured fa-4x text-muted mb-3"></i>
                        <h3 class="text-muted">No Patient Selected</h3>
                        <p class="text-muted">Search for a patient to view their medications or issue new prescriptions</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#patientSearchModal">
                            <i class="fas fa-search me-1"></i> Search Patient
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
                                    <th>Allergies</th>
                                    <th>Last Visit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="searchResultsTable">
                                <!-- Sample data - in real app this would be populated from backend -->
                                <tr>
                                    <td>123456</td>
                                    <td>John Doe</td>
                                    <td>45/M</td>
                                    <td>Penicillin, Sulfa</td>
                                    <td>2023-06-15</td>
                                    <td><button class="btn btn-sm btn-primary select-patient">Select</button></td>
                                </tr>
                                <tr>
                                    <td>789012</td>
                                    <td>Jane Smith</td>
                                    <td>32/F</td>
                                    <td>None</td>
                                    <td>2023-06-14</td>
                                    <td><button class="btn btn-sm btn-primary select-patient">Select</button></td>
                                </tr>
                                <tr>
                                    <td>345678</td>
                                    <td>Robert Johnson</td>
                                    <td>68/M</td>
                                    <td>Codeine</td>
                                    <td>2023-06-10</td>
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

    <!-- New Prescription Modal -->
    <div class="modal fade" id="newPrescriptionModal" tabindex="-1" aria-labelledby="newPrescriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="newPrescriptionModalLabel">New Prescription</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Prescribing for: <strong id="prescribingFor">No patient selected</strong>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Prescriber</label>
                            <select class="form-select" id="prescribingDoctor">
                                <option>Dr. Smith (Cardiology)</option>
                                <option>Dr. Johnson (Internal Medicine)</option>
                                <option>Dr. Williams (Pediatrics)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Priority</label>
                            <select class="form-select" id="prescriptionPriority">
                                <option>Routine</option>
                                <option>Urgent</option>
                                <option selected>STAT</option>
                            </select>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h5 class="mb-3"><i class="fas fa-pills me-2"></i>Medication Details</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Drug Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search medication..." id="medicationSearch">
                                <button class="btn btn-outline-secondary" type="button" id="searchMedication">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Strength</label>
                            <input type="text" class="form-control" placeholder="e.g. 500mg" id="medicationStrength">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Form</label>
                            <select class="form-select" id="medicationForm">
                                <option>Tablet</option>
                                <option>Capsule</option>
                                <option>Liquid</option>
                                <option>Injection</option>
                                <option>Inhaler</option>
                                <option>Topical</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Dosage</label>
                            <input type="text" class="form-control" placeholder="e.g. 1 tablet" id="medicationDose">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Frequency</label>
                            <select class="form-select" id="medicationFrequency">
                                <option>Once daily</option>
                                <option>Twice daily</option>
                                <option>Three times daily</option>
                                <option>Four times daily</option>
                                <option>Every 6 hours</option>
                                <option>Every 8 hours</option>
                                <option>Every 12 hours</option>
                                <option>As needed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Duration</label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="e.g. 7" id="medicationDuration">
                                <span class="input-group-text">days</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Quantity to Dispense</label>
                            <input type="number" class="form-control" id="dispenseQuantity">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Refills</label>
                            <select class="form-select" id="refillOption">
                                <option value="0">No refills</option>
                                <option value="1">1 refill</option>
                                <option value="2">2 refills</option>
                                <option value="3">3 refills</option>
                                <option value="4">4 refills</option>
                                <option value="5">5 refills</option>
                                <option value="99">Unlimited refills</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Special Instructions</label>
                        <textarea class="form-control" rows="3" id="specialInstructions" placeholder="Take with food, avoid alcohol, etc."></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Prescription Notes</label>
                        <textarea class="form-control" rows="2" id="prescriptionNotes" placeholder="Additional notes for pharmacy..."></textarea>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="printLabel">
                        <label class="form-check-label" for="printLabel">
                            Print medication label after saving
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="savePrescription">Save Prescription</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Store selected patient data
        let selectedPatient = null;
        
        // Patient selection handler
        document.addEventListener('DOMContentLoaded', function() {
            // Handle patient selection from search
            document.querySelectorAll('.select-patient').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    selectedPatient = {
                        mrn: row.cells[0].textContent,
                        name: row.cells[1].textContent,
                        ageSex: row.cells[2].textContent,
                        allergies: row.cells[3].textContent
                    };
                    
                    updatePatientDisplay();
                    
                    // Close the search modal
                    const searchModal = bootstrap.Modal.getInstance(document.getElementById('patientSearchModal'));
                    searchModal.hide();
                });
            });
            
            // Clear patient selection
            document.getElementById('clearPatientSelection').addEventListener('click', function() {
                selectedPatient = null;
                updatePatientDisplay();
            });
            
            // Update prescription modal when shown
            document.getElementById('newPrescriptionModal').addEventListener('show.bs.modal', function() {
                if (selectedPatient) {
                    document.getElementById('prescribingFor').innerHTML = 
                        `${selectedPatient.name} <span class="badge bg-primary">${selectedPatient.mrn}</span>`;
                } else {
                    document.getElementById('prescribingFor').textContent = 'No patient selected';
                }
            });
            
            // Save prescription handler
            document.getElementById('savePrescription').addEventListener('click', function() {
                if (!selectedPatient) {
                    alert('Please select a patient first');
                    return;
                }
                
                // In a real app, this would send data to the server
                const medication = document.getElementById('medicationSearch').value || 'Unknown Medication';
                const strength = document.getElementById('medicationStrength').value || '';
                const form = document.getElementById('medicationForm').value;
                
                // Add to patient's medication list
                addMedicationToTable({
                    medication: `${medication} ${strength} ${form}`,
                    prescriber: document.getElementById('prescribingDoctor').value,
                    date: new Date().toLocaleDateString(),
                    status: 'Active'
                });
                
                // Show success message
                alert(`Prescription for ${medication} saved successfully for ${selectedPatient.name}`);
                
                // Close the modal
                const prescriptionModal = bootstrap.Modal.getInstance(document.getElementById('newPrescriptionModal'));
                prescriptionModal.hide();
            });
        });
        
        function updatePatientDisplay() {
            const patientBanner = document.getElementById('selectedPatientBanner');
            const patientMeds = document.getElementById('patientMedications');
            const emptyState = document.getElementById('emptyState');
            
            if (selectedPatient) {
                // Update patient banner
                document.getElementById('selectedPatientName').textContent = selectedPatient.name;
                document.getElementById('selectedPatientMRN').textContent = `MRN: ${selectedPatient.mrn}`;
                document.getElementById('selectedPatientAgeSex').textContent = selectedPatient.ageSex;
                document.getElementById('selectedPatientAllergies').textContent = 
                    selectedPatient.allergies === 'None' ? 'No known allergies' : `Allergies: ${selectedPatient.allergies}`;
                
                // Show patient sections
                patientBanner.style.display = 'block';
                patientMeds.style.display = 'block';
                emptyState.style.display = 'none';
                
                // Load patient's medications (simulated)
                loadPatientMedications(selectedPatient.mrn);
            } else {
                // Hide patient sections
                patientBanner.style.display = 'none';
                patientMeds.style.display = 'none';
                emptyState.style.display = 'flex';
            }
        }
        
        function loadPatientMedications(mrn) {
            // In a real app, this would fetch from an API
            const medsTable = document.getElementById('patientMedsTable');
            medsTable.innerHTML = '';
            
            // Sample data - would come from backend in real app
            const sampleMeds = [
                {
                    medication: 'Amoxicillin 500mg Capsule',
                    prescribed: '2023-06-10',
                    prescriber: 'Dr. Smith',
                    lastFilled: '2023-06-10',
                    status: 'Active'
                },
                {
                    medication: 'Lisinopril 10mg Tablet',
                    prescribed: '2023-05-15',
                    prescriber: 'Dr. Johnson',
                    lastFilled: '2023-06-01',
                    status: 'Active'
                }
            ];
            
            sampleMeds.forEach(med => {
                addMedicationToTable(med);
            });
        }
        
        function addMedicationToTable(med) {
            const medsTable = document.getElementById('patientMedsTable');
            const row = document.createElement('tr');
            
            row.innerHTML = `
                <td>${med.medication}</td>
                <td>${med.prescribed}</td>
                <td>${med.prescriber}</td>
                <td>${med.lastFilled}</td>
                <td><span class="badge bg-success">${med.status}</span></td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" title="Refill">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <button class="btn btn-sm btn-info me-1" title="View">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Discontinue">
                        <i class="fas fa-ban"></i>
                    </button>
                </td>
            `;
            
            medsTable.appendChild(row);
        }
    </script>
</body>
</html>