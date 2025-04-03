<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        .sidebar {
            background-color: var(--dark-color);
            color: white;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
            border-radius: 5px;
            padding: 10px 15px;
        }
        
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .stat-card {
            border-radius: 10px;
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card .card-body {
            padding: 20px;
        }
        
        .stat-card i {
            font-size: 2.5rem;
            opacity: 0.7;
        }
        
        .table-responsive {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar d-none d-md-block">
                <div class="text-center mb-4">
                    <h4>Hospital Admin</h4>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard" data-bs-toggle="tab">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#users" data-bs-toggle="tab">
                            <i class="fas fa-users"></i> User Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#finance" data-bs-toggle="tab">
                            <i class="fas fa-money-bill-wave"></i> Financial
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#inventory" data-bs-toggle="tab">
                            <i class="fas fa-pills"></i> Drug Inventory
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sundries" data-bs-toggle="tab">
                            <i class="fas fa-boxes"></i> Sundries
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reports" data-bs-toggle="tab">
                            <i class="fas fa-chart-bar"></i> Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#settings" data-bs-toggle="tab">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 ms-sm-auto main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Overview</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <i class="fas fa-calendar"></i> This month
                        </button>
                    </div>
                </div>

                <div class="tab-content">
                    <!-- Dashboard Tab -->
                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="row">
                            <!-- Stat Cards -->
                            <div class="col-md-3">
                                <div class="card stat-card bg-primary text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="card-subtitle mb-2">Active Users</h6>
                                                <h3 class="card-title">142</h3>
                                            </div>
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="mt-3">
                                            <small>+5.2% from last month</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card stat-card bg-success text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="card-subtitle mb-2">Monthly Revenue</h6>
                                                <h3 class="card-title">₦8.7M</h3>
                                            </div>
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                        <div class="mt-3">
                                            <small>+12.4% from last month</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card stat-card bg-warning text-dark">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="card-subtitle mb-2">Low Stock Items</h6>
                                                <h3 class="card-title">17</h3>
                                            </div>
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="mt-3">
                                            <small>Needs immediate attention</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card stat-card bg-info text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="card-subtitle mb-2">Pending Approvals</h6>
                                                <h3 class="card-title">9</h3>
                                            </div>
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="mt-3">
                                            <small>3 high priority</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Recent Activity</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>User</th>
                                                        <th>Activity</th>
                                                        <th>Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>10:30 AM</td>
                                                        <td>Dr. Adebayo</td>
                                                        <td>Prescribed medication</td>
                                                        <td>Paracetamol 500mg</td>
                                                    </tr>
                                                    <tr>
                                                        <td>09:45 AM</td>
                                                        <td>Nurse Chioma</td>
                                                        <td>Inventory request</td>
                                                        <td>Bandages (10 packs)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Yesterday</td>
                                                        <td>Admin</td>
                                                        <td>New user created</td>
                                                        <td>Dr. Femi (Cardiology)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Yesterday</td>
                                                        <td>Pharmacy</td>
                                                        <td>Stock updated</td>
                                                        <td>Amoxicillin (+250 units)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2 days ago</td>
                                                        <td>Finance</td>
                                                        <td>Payment received</td>
                                                        <td>₦125,000 (OPD)</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Upcoming Stock Take</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="calendar"></div>
                                        <div class="mt-3">
                                            <h6>Next Stock Take:</h6>
                                            <p class="text-primary">May 31, 2023 - End of Month</p>
                                            <button class="btn btn-sm btn-outline-primary">Schedule New</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Management Tab -->
                    <div class="tab-pane fade" id="users">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2>User Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                <i class="fas fa-plus"></i> Add New User
                            </button>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Search users...">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-select">
                                            <option>Filter by Role</option>
                                            <option>Administrator</option>
                                            <option>Doctor</option>
                                            <option>Nurse</option>
                                            <option>Pharmacist</option>
                                            <option>Accountant</option>
                                            <option>Support Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Department</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="https://via.placeholder.com/40" class="user-avatar me-2">
                                                    Dr. Adebayo Ojo
                                                </td>
                                                <td>adebayo@hospital.com</td>
                                                <td><span class="badge bg-primary">Doctor</span></td>
                                                <td>Cardiology</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-ban"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="https://via.placeholder.com/40" class="user-avatar me-2">
                                                    Nurse Chioma Eze
                                                </td>
                                                <td>chioma@hospital.com</td>
                                                <td><span class="badge bg-info">Nurse</span></td>
                                                <td>Emergency</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-ban"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="https://via.placeholder.com/40" class="user-avatar me-2">
                                                    Pharmacist Musa Bello
                                                </td>
                                                <td>musa@hospital.com</td>
                                                <td><span class="badge bg-warning text-dark">Pharmacist</span></td>
                                                <td>Pharmacy</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-ban"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="https://via.placeholder.com/40" class="user-avatar me-2">
                                                    Admin User
                                                </td>
                                                <td>admin@hospital.com</td>
                                                <td><span class="badge bg-danger">Administrator</span></td>
                                                <td>Administration</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-ban"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="https://via.placeholder.com/40" class="user-avatar me-2">
                                                    Accountant Folake Ade
                                                </td>
                                                <td>folake@hospital.com</td>
                                                <td><span class="badge bg-secondary">Accountant</span></td>
                                                <td>Finance</td>
                                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
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

                    <!-- Financial Tab -->
                    <div class="tab-pane fade" id="finance">
                        <h2>Financial Management</h2>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#revenue" data-bs-toggle="tab">Revenue</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#expenses" data-bs-toggle="tab">Expenses</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#payments" data-bs-toggle="tab">Payments</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="revenue">
                                                <canvas id="revenueChart" height="200"></canvas>
                                                <div class="mt-3">
                                                    <div class="table-responsive">
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Service</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>May 15, 2023</td>
                                                                    <td>Consultation</td>
                                                                    <td>₦25,000</td>
                                                                    <td><span class="badge bg-success">Paid</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>May 14, 2023</td>
                                                                    <td>Lab Test</td>
                                                                    <td>₦15,000</td>
                                                                    <td><span class="badge bg-success">Paid</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>May 13, 2023</td>
                                                                    <td>Surgery</td>
                                                                    <td>₦350,000</td>
                                                                    <td><span class="badge bg-warning text-dark">Partial</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="expenses">
                                                <canvas id="expensesChart" height="200"></canvas>
                                            </div>
                                            <div class="tab-pane fade" id="payments">
                                                <canvas id="paymentsChart" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Quick Stats</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h6>Total Revenue (Month)</h6>
                                            <h3 class="text-success">₦8,742,500</h3>
                                            <small class="text-muted">+12.4% from last month</small>
                                        </div>
                                        <div class="mb-3">
                                            <h6>Total Expenses</h6>
                                            <h3 class="text-danger">₦4,210,300</h3>
                                            <small class="text-muted">+8.2% from last month</small>
                                        </div>
                                        <div class="mb-3">
                                            <h6>Net Profit</h6>
                                            <h3 class="text-primary">₦4,532,200</h3>
                                            <small class="text-muted">+16.8% from last month</small>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100">Generate Financial Report</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Drug Inventory Tab -->
                    <div class="tab-pane fade" id="inventory">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2>Drug Inventory Management</h2>
                            <div>
                                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addDrugModal">
                                    <i class="fas fa-plus"></i> Add Drug
                                </button>
                                <button class="btn btn-outline-secondary">
                                    <i class="fas fa-file-export"></i> Export
                                </button>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Search drugs...">
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select">
                                            <option>All Categories</option>
                                            <option>Antibiotics</option>
                                            <option>Analgesics</option>
                                            <option>Antihypertensives</option>
                                            <option>Vitamins</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select">
                                            <option>All Status</option>
                                            <option>In Stock</option>
                                            <option>Low Stock</option>
                                            <option>Out of Stock</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-outline-primary w-100">Filter</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Drug Name</th>
                                                <th>Category</th>
                                                <th>Batch No.</th>
                                                <th>Expiry Date</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Paracetamol 500mg</td>
                                                <td>Analgesic</td>
                                                <td>PC-2305-01</td>
                                                <td>12/2024</td>
                                                <td>1,250</td>
                                                <td>₦50</td>
                                                <td><span class="badge bg-success">In Stock</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Amoxicillin 250mg</td>
                                                <td>Antibiotic</td>
                                                <td>AM-2304-12</td>
                                                <td>08/2024</td>
                                                <td>320</td>
                                                <td>₦120</td>
                                                <td><span class="badge bg-warning text-dark">Low Stock</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Vitamin C 100mg</td>
                                                <td>Vitamin</td>
                                                <td>VC-2303-05</td>
                                                <td>05/2025</td>
                                                <td>890</td>
                                                <td>₦80</td>
                                                <td><span class="badge bg-success">In Stock</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Losartan 50mg</td>
                                                <td>Antihypertensive</td>
                                                <td>LS-2302-08</td>
                                                <td>11/2024</td>
                                                <td>45</td>
                                                <td>₦150</td>
                                                <td><span class="badge bg-danger">Critical</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-sync-alt"></i> Refresh
                                        </button>
                                    </div>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination mb-0">
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
                    </div>

                    <!-- Sundries Tab -->
                    <div class="tab-pane fade" id="sundries">
                        <h2>Sundries Inventory</h2>
                        <p>This section would follow a similar structure to the Drug Inventory but for non-pharmaceutical items.</p>
                    </div>

                    <!-- Reports Tab -->
                    <div class="tab-pane fade" id="reports">
                        <h2>Reports & Analytics</h2>
                        <p>This section would contain various reports for users, finances, and inventory.</p>
                    </div>

                    <!-- Settings Tab -->
                    <div class="tab-pane fade" id="settings">
                        <h2>System Settings</h2>
                        <p>Configuration options for the hospital management system.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <select class="form-select" id="department" required>
                                        <option value="">Select Department</option>
                                        <option>Administration</option>
                                        <option>Cardiology</option>
                                        <option>Emergency</option>
                                        <option>Pharmacy</option>
                                        <option>Finance</option>
                                        <option>Laboratory</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" required>
                                        <option value="">Select Role</option>
                                        <option>Administrator</option>
                                        <option>Doctor</option>
                                        <option>Nurse</option>
                                        <option>Pharmacist</option>
                                        <option>Accountant</option>
                                        <option>Support Staff</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="sendWelcomeEmail">
                            <label class="form-check-label" for="sendWelcomeEmail">Send welcome email with login instructions</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Create User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Drug Modal -->
    <div class="modal fade" id="addDrugModal" tabindex="-1" aria-labelledby="addDrugModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDrugModalLabel">Add New Drug</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="drugName" class="form-label">Drug Name</label>
                            <input type="text" class="form-control" id="drugName" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" required>
                                        <option value="">Select Category</option>
                                        <option>Antibiotic</option>
                                        <option>Analgesic</option>
                                        <option>Antihypertensive</option>
                                        <option>Vitamin</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="batchNumber" class="form-label">Batch Number</label>
                                    <input type="text" class="form-control" id="batchNumber" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Unit Price (₦)</label>
                                    <input type="number" class="form-control" id="price" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="expiryDate" class="form-label">Expiry Date</label>
                            <input type="date" class="form-control" id="expiryDate" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="supplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="supplier">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Drug</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize charts
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue (₦)',
                        data: [6500000, 5900000, 7200000, 8100000, 8740000, 0],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
            
            // Expenses Chart
            const expensesCtx = document.getElementById('expensesChart').getContext('2d');
            const expensesChart = new Chart(expensesCtx, {
                type: 'bar',
                data: {
                    labels: ['Salaries', 'Drugs', 'Equipment', 'Utilities', 'Maintenance'],
                    datasets: [{
                        label: 'Expenses (₦)',
                        data: [2500000, 1200000, 800000, 300000, 400000],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            
            // Payments Chart
            const paymentsCtx = document.getElementById('paymentsChart').getContext('2d');
            const paymentsChart = new Chart(paymentsCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Cash', 'Bank Transfer', 'POS', 'Insurance'],
                    datasets: [{
                        data: [45, 30, 15, 10],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>