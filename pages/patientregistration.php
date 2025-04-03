<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration - HMIS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
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
        .registration-card {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .form-header {
            background-color: #0d6efd;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px;
        }
        .required-field::after {
            content: "*";
            color: red;
            margin-left: 4px;
        }
        .insurance-section {
            background-color: #f0f7ff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
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
                <div class="container py-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card registration-card">
                                <div class="form-header">
                                    <h3 class="text-center mb-0"><i class="fas fa-user-plus me-2"></i>PATIENT REGISTRATION FORM</h3>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <!-- Personal Information Section -->
                                        <h5 class="mb-4 text-primary"><i class="fas fa-user-circle me-2"></i>Personal Information</h5>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4">
                                                <label for="firstName" class="form-label required-field">First Name</label>
                                                <input type="text" class="form-control" id="firstName" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="middleName" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="middleName">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="lastName" class="form-label required-field">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" required>
                                            </div>
                                        </div>

                                        <div class="row g-3 mb-4">
                                            <div class="col-md-3">
                                                <label for="dob" class="form-label required-field">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label required-field">Gender</label>
                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                                        <label class="form-check-label" for="male">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                                        <label class="form-check-label" for="female">Female</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                                        <label class="form-check-label" for="other">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="maritalStatus" class="form-label">Marital Status</label>
                                                <select class="form-select" id="maritalStatus">
                                                    <option selected disabled value="">Select</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="widowed">Widowed</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="bloodGroup" class="form-label">Blood Group</label>
                                                <select class="form-select" id="bloodGroup">
                                                    <option selected disabled value="">Select</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Contact Information Section -->
                                        <h5 class="mb-4 text-primary"><i class="fas fa-address-book me-2"></i>Contact Information</h5>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-6">
                                                <label for="address" class="form-label required-field">Address</label>
                                                <textarea class="form-control" id="address" rows="2" required></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="city" class="form-label required-field">City</label>
                                                <input type="text" class="form-control" id="city" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="state" class="form-label required-field">State/Region</label>
                                                <input type="text" class="form-control" id="state" required>
                                            </div>
                                        </div>

                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4">
                                                <label for="country" class="form-label required-field">Country</label>
                                                <input type="text" class="form-control" id="country" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="postalCode" class="form-label">Postal Code</label>
                                                <input type="text" class="form-control" id="postalCode">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="phone" class="form-label required-field">Phone Number</label>
                                                <input type="tel" class="form-control" id="phone" required>
                                            </div>
                                        </div>

                                        <div class="row g-3 mb-4">
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="emergencyContact" class="form-label required-field">Emergency Contact</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="emergencyContactName" placeholder="Name" required>
                                                    <input type="tel" class="form-control" id="emergencyContactPhone" placeholder="Phone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Insurance Information Section -->
                                        <div class="insurance-section">
                                            <h5 class="mb-4 text-primary"><i class="fas fa-file-invoice-dollar me-2"></i>Insurance Information</h5>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="hasInsurance">
                                                <label class="form-check-label" for="hasInsurance">
                                                    This patient has insurance coverage
                                                </label>
                                            </div>

                                            <div id="insuranceDetails" style="display: none;">
                                                <div class="row g-3 mb-4">
                                                    <div class="col-md-6">
                                                        <label for="insuranceProvider" class="form-label">Insurance Provider</label>
                                                        <select class="form-select" id="insuranceProvider">
                                                            <option selected disabled value="">Select Provider</option>
                                                            <option value="Aetna">Aetna</option>
                                                            <option value="Blue Cross Blue Shield">Blue Cross Blue Shield</option>
                                                            <option value="Cigna">Cigna</option>
                                                            <option value="UnitedHealthcare">UnitedHealthcare</option>
                                                            <option value="Medicare">Medicare</option>
                                                            <option value="Medicaid">Medicaid</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="insurancePlan" class="form-label">Insurance Plan</label>
                                                        <input type="text" class="form-control" id="insurancePlan" placeholder="e.g., Gold PPO, Silver HMO">
                                                    </div>
                                                </div>

                                                <div class="row g-3 mb-4">
                                                    <div class="col-md-6">
                                                        <label for="policyNumber" class="form-label">Policy/Member Number</label>
                                                        <input type="text" class="form-control" id="policyNumber" placeholder="Insurance member ID">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="groupNumber" class="form-label">Group Number (if applicable)</label>
                                            <input type="text" class="form-control" id="groupNumber">
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="coverageStart" class="form-label">Coverage Start Date</label>
                                            <input type="date" class="form-control" id="coverageStart">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="coverageEnd" class="form-label">Coverage End Date</label>
                                            <input type="date" class="form-control" id="coverageEnd">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <h5 class="mb-4 text-primary"><i class="fas fa-info-circle me-2"></i>Additional Information</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="occupation" class="form-label">Occupation</label>
                                    <input type="text" class="form-control" id="occupation">
                                </div>
                                <div class="col-md-6">
                                    <label for="referredBy" class="form-label">Referred By</label>
                                    <input type="text" class="form-control" id="referredBy" placeholder="Doctor's name or other source">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="medicalHistory" class="form-label">Known Medical History</label>
                                <textarea class="form-control" id="medicalHistory" rows="3" placeholder="Any known allergies, chronic conditions, etc."></textarea>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="reset" class="btn btn-outline-secondary me-md-2"><i class="fas fa-undo me-1"></i> Reset</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Submit Registration</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript for insurance toggle -->
    <script>
        document.getElementById('hasInsurance').addEventListener('change', function() {
            const insuranceDetails = document.getElementById('insuranceDetails');
            if (this.checked) {
                insuranceDetails.style.display = 'block';
            } else {
                insuranceDetails.style.display = 'none';
            }
        });
    </script>
</body>
</html>