<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Billing System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step-number {
            width: 40px;
            height: 40px;
            background-color: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
        }

        .step.active .step-number {
            background-color: #0d6efd;
            color: white;
        }

        .step.completed .step-number {
            background-color: #198754;
            color: white;
        }

        .step-title {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .step.active .step-title {
            color: #0d6efd;
            font-weight: bold;
        }

        .step.completed .step-title {
            color: #198754;
        }

        .step-connector {
            position: absolute;
            top: 20px;
            left: 50%;
            right: -50%;
            height: 2px;
            background-color: #e9ecef;
            z-index: -1;
        }

        .step.completed .step-connector {
            background-color: #198754;
        }

        .step:last-child .step-connector {
            display: none;
        }

        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }

        .service-table th {
            white-space: nowrap;
            background-color: #f8f9fa;
        }

        .service-table input {
            width: 100px;
        }

        .total-row {
            font-weight: bold;
            background-color: #f1f8ff;
        }

        .printable-area {
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .printable-area,
            .printable-area * {
                visibility: visible;
            }

            .printable-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border: none;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-file-invoice-dollar me-2"></i>Patient Billing System</h3>
                    </div>
                    <a href="patient-queue.html" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i> Back to Queue
                    </a>
                    <div class="card-body">
                        <!-- Step Indicator -->
                        <div class="step-indicator">
                            <div class="step active" id="step1-indicator">
                                <div class="step-number">1</div>
                                <div class="step-title">Select Patient</div>
                                <div class="step-connector"></div>
                            </div>
                            <div class="step" id="step2-indicator">
                                <div class="step-number">2</div>
                                <div class="step-title">Record Services</div>
                                <div class="step-connector"></div>
                            </div>
                            <div class="step" id="step3-indicator">
                                <div class="step-number">3</div>
                                <div class="step-title">Review & Print</div>
                            </div>
                        </div>

                        <!-- Step 1: Select Patient -->
                        <div class="step-content active" id="step1-content">
                            <h4 class="mb-4"><i class="fas fa-user me-2"></i>Select Patient</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        <input type="text" class="form-control" id="patientSearch"
                                            placeholder="Search patients...">
                                    </div>
                                    <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                                        <a href="#" class="list-group-item list-group-item-action patient-item"
                                            data-id="1001">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">John Doe</h5>
                                                <small>P-1001</small>
                                            </div>
                                            <p class="mb-1">35 years, Male</p>
                                            <small>Last visit: May 15, 2023</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action patient-item"
                                            data-id="1002">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Mary Johnson</h5>
                                                <small>P-1002</small>
                                            </div>
                                            <p class="mb-1">28 years, Female</p>
                                            <small>Last visit: May 10, 2023</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action patient-item"
                                            data-id="1003">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Robert Brown</h5>
                                                <small>P-1003</small>
                                            </div>
                                            <p class="mb-1">42 years, Male</p>
                                            <small>Last visit: May 5, 2023</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action patient-item"
                                            data-id="1004">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Sarah Williams</h5>
                                                <small>P-1004</small>
                                            </div>
                                            <p class="mb-1">31 years, Female</p>
                                            <small>Last visit: April 28, 2023</small>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Selected Patient</h5>
                                        </div>
                                        <div class="card-body" id="selectedPatientInfo">
                                            <div class="text-center text-muted py-4">
                                                <i class="fas fa-user fa-3x mb-3"></i>
                                                <p>No patient selected</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <a href="viewvisit.php" class="btn btn-outline-danger"> <i class="fas fa-arrow-left me-2"></i> Queue</a>
                                <button class="btn btn-primary" id="step1-next" disabled>
                                    Next <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>

                        </div>

                        <!-- Step 2: Record Services -->
                        <div class="step-content" id="step2-content">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4><i class="fas fa-list-alt me-2"></i>Record Services</h4>
                                <div>
                                    <span class="badge bg-primary">
                                        <i class="fas fa-user me-1"></i>
                                        <span id="currentPatientName">No patient selected</span>
                                    </span>
                                </div>
                            </div>

                            <div class="table-responsive mb-4">
                                <table class="table table-bordered service-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service Type</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Price (USD)</th>
                                            <th>Total (USD)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="servicesTable">
                                        <!-- Services will be added here -->
                                    </tbody>
                                    <tfoot>
                                        <tr class="total-row">
                                            <td colspan="5" class="text-end"><strong>Subtotal:</strong></td>
                                            <td id="subtotal">0.00</td>
                                            <td></td>
                                        </tr>
                                        <tr class="total-row">
                                            <td colspan="5" class="text-end"><strong>Insurance Coverage (80%):</strong>
                                            </td>
                                            <td id="insurance-cover">0.00</td>
                                            <td></td>
                                        </tr>
                                        <tr class="total-row">
                                            <td colspan="5" class="text-end"><strong>Amount Due:</strong></td>
                                            <td id="amount-due">0.00</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Add New Service -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label class="form-label">Service Type</label>
                                    <select class="form-select" id="newServiceType">
                                        <option value="consultation">Consultation</option>
                                        <option value="laboratory">Laboratory</option>
                                        <option value="radiology">Radiology</option>
                                        <option value="procedure">Procedure</option>
                                        <option value="pharmacy">Pharmacy</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" id="newServiceDesc"
                                        placeholder="Service description">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="newServiceQty" value="1" min="1">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Unit Price</label>
                                    <input type="number" class="form-control" id="newServicePrice" step="0.01" min="0"
                                        placeholder="0.00">
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button class="btn btn-primary" id="addServiceBtn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-secondary" id="step2-back">
                                    <i class="fas fa-arrow-left me-2"></i> Back
                                </button>
                                <button class="btn btn-primary" id="step2-next">
                                    Next <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Review & Print -->
                        <div class="step-content" id="step3-content">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4><i class="fas fa-file-invoice me-2"></i>Review & Print Invoice</h4>
                                <div>
                                    <span class="badge bg-primary">
                                        <i class="fas fa-user me-1"></i>
                                        <span id="reviewPatientName">No patient selected</span>
                                    </span>
                                </div>
                            </div>

                            <div class="printable-area mb-4" id="invoicePreview">
                                <div class="text-center mb-4">
                                    <h3>HEALTHCARE CLINIC</h3>
                                    <p class="mb-1">123 Medical Drive, City, State 12345</p>
                                    <p class="mb-1">Phone: (123) 456-7890 | Email: info@clinic.com</p>
                                    <hr>
                                    <h4>PATIENT INVOICE</h4>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Invoice #:</strong> INV-2023-<span
                                                id="invoiceNumber">0000</span></p>
                                        <p class="mb-1"><strong>Date:</strong> <span id="invoiceDate">May 20,
                                                2023</span></p>
                                        <p class="mb-1"><strong>Billed By:</strong> Admin User</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Patient:</strong> <span id="invoicePatientName">-</span>
                                        </p>
                                        <p class="mb-1"><strong>Patient ID:</strong> <span
                                                id="invoicePatientId">-</span></p>
                                        <p class="mb-1"><strong>Insurance:</strong> <span id="invoiceInsurance">ABC
                                                Insurance (80%)</span></p>
                                    </div>
                                </div>

                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Description</th>
                                                <th class="text-end">Qty</th>
                                                <th class="text-end">Unit Price</th>
                                                <th class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="invoiceItems">
                                            <!-- Filled by JavaScript -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-end"><strong>Subtotal:</strong></td>
                                                <td class="text-end" id="invoiceSubtotal">0.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end"><strong>Insurance Coverage
                                                        (80%):</strong></td>
                                                <td class="text-end" id="invoiceInsuranceCover">0.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end"><strong>Amount Due:</strong></td>
                                                <td class="text-end" id="invoiceTotal">0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Payment Method:</label>
                                    <select class="form-select no-print" id="paymentMethod">
                                        <option>Cash</option>
                                        <option>Credit Card</option>
                                        <option>Insurance</option>
                                        <option>Mobile Money</option>
                                    </select>
                                    <p class="no-screen"><strong>Payment Method:</strong> <span
                                            id="printedPaymentMethod">Cash</span></p>
                                </div>

                                <div class="alert alert-success no-print">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Payment Complete</strong> - Thank you for choosing our clinic!
                                </div>

                                <div class="text-center mt-4 no-screen">
                                    <p class="mb-0">Thank you for choosing our clinic!</p>
                                    <p>Please bring this invoice for your next visit</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between no-print">
                                <button class="btn btn-outline-secondary" id="step3-back">
                                    <i class="fas fa-arrow-left me-2"></i> Back
                                </button>
                                <div>
                                    <button class="btn btn-outline-primary me-2">
                                        <i class="fas fa-envelope me-1"></i> Email Invoice
                                    </button>
                                    <button class="btn btn-primary" onclick="window.print()">
                                        <i class="fas fa-print me-1"></i> Print Invoice
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        // Current state
        let currentStep = 1;
        let selectedPatient = null;
        let services = [];
        let invoiceNumber = Math.floor(Math.random() * 9000) + 1000;

        // Initialize date
        document.getElementById('invoiceDate').textContent = new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        document.getElementById('invoiceNumber').textContent = invoiceNumber;

        // Step navigation
        function goToStep(step) {
            // Hide all steps
            document.querySelectorAll('.step-content').forEach(el => {
                el.classList.remove('active');
            });
            document.querySelectorAll('.step').forEach(el => {
                el.classList.remove('active', 'completed');
            });

            // Show current step
            document.getElementById(`step${step}-content`).classList.add('active');
            document.getElementById(`step${step}-indicator`).classList.add('active');

            // Mark previous steps as completed
            for (let i = 1; i < step; i++) {
                document.getElementById(`step${i}-indicator`).classList.add('completed');
            }

            currentStep = step;
        }

        // Step 1: Select Patient
        document.querySelectorAll('.patient-item').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();

                // Remove active class from all items
                document.querySelectorAll('.patient-item').forEach(i => {
                    i.classList.remove('active');
                });

                // Add active class to clicked item
                this.classList.add('active');

                // Store selected patient
                selectedPatient = {
                    id: this.getAttribute('data-id'),
                    name: this.querySelector('h5').textContent,
                    number: this.querySelector('small').textContent,
                    details: this.querySelector('p').textContent,
                    lastVisit: this.querySelectorAll('small')[1].textContent
                };

                // Update selected patient display
                document.getElementById('selectedPatientInfo').innerHTML = `
                    <h5>${selectedPatient.name}</h5>
                    <p class="mb-1"><strong>Patient ID:</strong> ${selectedPatient.number}</p>
                    <p class="mb-1"><strong>Details:</strong> ${selectedPatient.details}</p>
                    <p class="mb-1"><strong>Last Visit:</strong> ${selectedPatient.lastVisit}</p>
                    <p class="mb-0"><strong>Insurance:</strong> ABC Insurance (80% coverage)</p>
                `;

                // Enable next button
                document.getElementById('step1-next').disabled = false;
            });
        });

        document.getElementById('step1-next').addEventListener('click', function () {
            if (selectedPatient) {
                document.getElementById('currentPatientName').textContent = selectedPatient.name;
                document.getElementById('reviewPatientName').textContent = selectedPatient.name;
                document.getElementById('invoicePatientName').textContent = selectedPatient.name;
                document.getElementById('invoicePatientId').textContent = selectedPatient.number;
                goToStep(2);
            }
        });

        // Step 2: Record Services
        document.getElementById('step2-back').addEventListener('click', function () {
            goToStep(1);
        });

        document.getElementById('step2-next').addEventListener('click', function () {
            if (services.length > 0) {
                goToStep(3);
            } else {
                alert('Please add at least one service');
            }
        });

        // Step 3: Review & Print
        document.getElementById('step3-back').addEventListener('click', function () {
            goToStep(2);
        });

        // Service management
        function updateRowTotal(row) {
            const qty = parseFloat(row.querySelector('.qty').value) || 0;
            const price = parseFloat(row.querySelector('.price').value) || 0;
            const totalCell = row.querySelector('.total');
            totalCell.textContent = (qty * price).toFixed(2);
        }

        function calculateTotals() {
            let subtotal = 0;
            const serviceRows = document.querySelectorAll('#servicesTable tr:not(.total-row)');

            serviceRows.forEach(row => {
                subtotal += parseFloat(row.querySelector('.total').textContent) || 0;
            });

            const insuranceCover = subtotal * 0.8;
            const amountDue = subtotal - insuranceCover;

            document.getElementById('subtotal').textContent = subtotal.toFixed(2);
            document.getElementById('insurance-cover').textContent = insuranceCover.toFixed(2);
            document.getElementById('amount-due').textContent = amountDue.toFixed(2);

            // Update invoice preview
            updateInvoicePreview(subtotal, insuranceCover, amountDue);
        }

        function updateInvoicePreview(subtotal, insuranceCover, amountDue) {
            const invoiceItems = document.getElementById('invoiceItems');
            invoiceItems.innerHTML = '';

            let itemCount = 1;
            document.querySelectorAll('#servicesTable tr:not(.total-row)').forEach(row => {
                const cells = row.querySelectorAll('td');
                const desc = cells[2].textContent;
                const qty = cells[3].querySelector('input').value;
                const price = cells[4].querySelector('input').value;
                const total = (qty * price).toFixed(2);

                invoiceItems.innerHTML += `
                    <tr>
                        <td>${itemCount++}</td>
                        <td>${desc}</td>
                        <td class="text-end">${qty}</td>
                        <td class="text-end">${parseFloat(price).toFixed(2)}</td>
                        <td class="text-end">${total}</td>
                    </tr>
                `;
            });

            document.getElementById('invoiceSubtotal').textContent = subtotal.toFixed(2);
            document.getElementById('invoiceInsuranceCover').textContent = insuranceCover.toFixed(2);
            document.getElementById('invoiceTotal').textContent = amountDue.toFixed(2);
        }

        document.getElementById('addServiceBtn').addEventListener('click', function () {
            const typeSelect = document.getElementById('newServiceType');
            const desc = document.getElementById('newServiceDesc');
            const qty = document.getElementById('newServiceQty');
            const price = document.getElementById('newServicePrice');

            if (!desc.value || !price.value) {
                alert('Please enter description and price');
                return;
            }

            const typeText = typeSelect.options[typeSelect.selectedIndex].text;
            const total = (parseFloat(qty.value) * parseFloat(price.value)).toFixed(2);

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${document.querySelectorAll('#servicesTable tr:not(.total-row)').length + 1}</td>
                <td>${typeText}</td>
                <td>${desc.value}</td>
                <td><input type="number" class="form-control qty" value="${qty.value}" min="1"></td>
                <td><input type="number" class="form-control price" value="${price.value}" step="0.01" min="0"></td>
                <td class="total">${total}</td>
                <td>
                    <button class="btn btn-sm btn-outline-danger remove-service">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            `;

            const tbody = document.getElementById('servicesTable');
            const totalRows = tbody.querySelectorAll('.total-row');
            tbody.insertBefore(newRow, totalRows[0]);

            // Store service
            services.push({
                type: typeText,
                description: desc.value,
                quantity: qty.value,
                price: price.value,
                total: total
            });

            // Clear inputs
            desc.value = '';
            price.value = '';
            qty.value = '1';
            typeSelect.selectedIndex = 0;

            // Add event listeners to new inputs
            newRow.querySelector('.qty').addEventListener('input', function () {
                updateRowTotal(newRow);
                calculateTotals();
            });

            newRow.querySelector('.price').addEventListener('input', function () {
                updateRowTotal(newRow);
                calculateTotals();
            });

            newRow.querySelector('.remove-service').addEventListener('click', function () {
                newRow.remove();
                calculateTotals();
            });

            calculateTotals();
        });

        // Payment method display for print
        document.getElementById('paymentMethod').addEventListener('change', function () {
            document.getElementById('printedPaymentMethod').textContent = this.value;
        });
    </script>
</body>

</html>