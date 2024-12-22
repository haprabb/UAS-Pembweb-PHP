<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - goTravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="adminIndex.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-3">
                <h4 class="text-center mb-4">goTravel Admin</h4>
                <div class="nav flex-column">
                    <!-- Tambahkan div pembungkus untuk memisahkan logout -->
                    <div class="nav-links">
                        <a href="#" class="nav-link active mb-2" data-section="dashboard">
                            <i class="fas fa-home me-2"></i> Dashboard
                        </a>
                        <a href="#" class="nav-link mb-2" data-section="bookings">
                            <i class="fas fa-ticket-alt me-2"></i> Manajemen Pemesanan
                        </a>
                        <a href="#" class="nav-link mb-2" data-section="schedule">
                            <i class="fas fa-calendar me-2"></i> Jadwal & Harga
                        </a>
                        <a href="#" class="nav-link mb-2" data-section="analytics">
                            <i class="fas fa-chart-bar me-2"></i> Analitik
                        </a>
                        <a href="#" class="nav-link mb-2" data-section="users">
                            <i class="fas fa-users me-2"></i> Manajemen Pengguna
                        </a>
                        <a href="#" class="nav-link mb-2" data-section="settings">
                            <i class="fas fa-cog me-2"></i> Pengaturan Sistem
                        </a>
                    </div>

                    <div class="nav-logout">
                        <a href="../logic/logout.php" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content p-4">
                <!-- Dashboard Section -->
                <div id="dashboard" class="content-section active">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Dashboard</h2>
                        <div class="d-flex align-items-center">
                            <div class="dropdown me-3">
                                <button class="btn btn-light" type="button" id="notificationDropdown" data-bs-toggle="dropdown">
                                    <i class="fas fa-bell"></i>
                                    <span class="badge bg-danger">3</span>
                                </button>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                                    <i class="fas fa-user me-2"></i>Admin
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card stats-card bg-primary text-white p-3">
                                <h6>Total Pemesanan</h6>
                                <h3>1,234</h3>
                                <p class="mb-0"><small>+12% dari bulan lalu</small></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stats-card bg-success text-white p-3">
                                <h6>Pendapatan</h6>
                                <h3>Rp 45.6M</h3>
                                <p class="mb-0"><small>+8% dari bulan lalu</small></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stats-card bg-info text-white p-3">
                                <h6>Pengguna Aktif</h6>
                                <h3>5,678</h3>
                                <p class="mb-0"><small>+15% dari bulan lalu</small></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stats-card bg-warning text-white p-3">
                                <h6>Tingkat Kepuasan</h6>
                                <h3>94%</h3>
                                <p class="mb-0"><small>+2% dari bulan lalu</small></p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Bookings -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Pemesanan Terbaru</h5>
                            <button class="btn btn-primary btn-sm">Lihat Semua</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID Pemesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Layanan</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#12345</td>
                                            <td>Budi Santoso</td>
                                            <td>Tiket Pesawat</td>
                                            <td><span class="badge bg-success">Sukses</span></td>
                                            <td>Rp 2.500.000</td>
                                            <td>
                                                <button class="btn btn-sm btn-info">Detail</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Sections -->
                <div id="bookings" class="content-section">
                    <h2>Manajemen Pemesanan</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID Pemesanan</th>
                                            <th>Tanggal</th>
                                            <th>Pelanggan</th>
                                            <th>Destinasi</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#12346</td>
                                            <td>2023-10-15</td>
                                            <td>Siti Aminah</td>
                                            <td>Bali</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>Rp 3.500.000</td>
                                            <td>
                                                <button class="btn btn-sm btn-info">Edit</button>
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="schedule" class="content-section">
                    <h2>Jadwal & Harga</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Jadwal Penerbangan</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Rute</label>
                                            <input type="text" class="form-control" placeholder="Jakarta - Bali">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Harga</label>
                                            <input type="number" class="form-control" placeholder="Rp">
                                        </div>
                                        <button class="btn btn-primary">Tambah Jadwal</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Jadwal Kereta Api</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Rute</label>
                                            <input type="text" class="form-control" placeholder="Jakarta - Bandung">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <select class="form-control">
                                                <option>Ekonomi</option>
                                                <option>Bisnis</option>
                                                <option>Eksekutif</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Harga</label>
                                            <input type="number" class="form-control" placeholder="Rp">
                                        </div>
                                        <button class="btn btn-primary">Tambah Jadwal</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Jadwal Bus Travel</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Rute</label>
                                            <input type="text" class="form-control" placeholder="Jakarta - Surabaya">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tipe Bus</label>
                                            <select class="form-control">
                                                <option>Regular</option>
                                                <option>Executive</option>
                                                <option>Super Executive</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Harga</label>
                                            <input type="number" class="form-control" placeholder="Rp">
                                        </div>
                                        <button class="btn btn-primary">Tambah Jadwal</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Hotel</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Hotel</label>
                                            <input type="text" class="form-control" placeholder="Nama Hotel">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" placeholder="Kota">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tipe Kamar</label>
                                            <select class="form-control">
                                                <option>Standard</option>
                                                <option>Deluxe</option>
                                                <option>Suite</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Harga per Malam</label>
                                            <input type="number" class="form-control" placeholder="Rp">
                                        </div>
                                        <button class="btn btn-primary">Tambah Hotel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="analytics" class="content-section">
                    <h2>Analitik</h2>
                    <div class="row">
                        <div class="col-md-8">

                            <!-- Grafik Penggunaan Layanan -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Penggunaan Layanan (12 Bulan Terakhir)</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="serviceUsageChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Destinasi Populer</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Bali
                                            <span class="badge bg-primary rounded-pill">245</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Lombok
                                            <span class="badge bg-primary rounded-pill">185</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="users" class="content-section">
                    <h2>Manajemen Pengguna</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Ahmad Rizki</td>
                                            <td>ahmad@email.com</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                            <td>2023-09-01</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning">Edit</button>
                                                <button class="btn btn-sm btn-danger">Nonaktifkan</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="settings" class="content-section">
                    <h2>Pengaturan Sistem</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Pengaturan Umum</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Situs</label>
                                            <input type="text" class="form-control" value="goTravel">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email Admin</label>
                                            <input type="email" class="form-control" value="admin@gotravel.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Zona Waktu</label>
                                            <select class="form-select">
                                                <option>WIB</option>
                                                <option>WITA</option>
                                                <option>WIT</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Implementasi navigasi
            const navLinks = document.querySelectorAll('.nav-link');
            const contentSections = document.querySelectorAll('.content-section');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Menghapus kelas active dari semua link dan section
                    navLinks.forEach(l => l.classList.remove('active'));
                    contentSections.forEach(section => section.classList.remove('active'));

                    // Menambahkan kelas active ke link yang diklik
                    this.classList.add('active');

                    // Menampilkan section yang sesuai
                    const targetSection = this.getAttribute('data-section');
                    document.getElementById(targetSection).classList.add('active');
                });
            });

            // Inisialisasi grafik penggunaan layanan
            const serviceUsageCtx = document.getElementById('serviceUsageChart').getContext('2d');
            new Chart(serviceUsageCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                            label: 'Pesawat',
                            data: [450, 480, 520, 490, 560, 530, 600, 580, 620, 590, 630, 650],
                            borderColor: '#007bff',
                            fill: false
                        },
                        {
                            label: 'Kereta',
                            data: [320, 350, 380, 360, 400, 380, 420, 400, 440, 420, 460, 480],
                            borderColor: '#28a745',
                            fill: false
                        },
                        {
                            label: 'Bus Travel',
                            data: [280, 300, 320, 310, 340, 330, 360, 350, 380, 370, 400, 420],
                            borderColor: '#ffc107',
                            fill: false
                        },
                        {
                            label: 'Hotel',
                            data: [200, 220, 240, 230, 260, 250, 280, 270, 300, 290, 320, 340],
                            borderColor: '#dc3545',
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Pemesanan'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tren Penggunaan Layanan Selama 12 Bulan'
                        }
                    }
                }
            });

            // Implementasi notifikasi real-time bisa ditambahkan di sini
        });
    </script>
</body>

</html>
=======
<?php
session_start();
include "../config/connection.php";

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/admin-style.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Travel Admin</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="<?php echo $page === 'dashboard' ? 'active' : ''; ?>">
                <a href="?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="<?php echo $page === 'users' ? 'active' : ''; ?>">
                <a href="?page=users"><i class="fas fa-users"></i> User Management</a>
            </li>
            <li class="<?php echo $page === 'packages' ? 'active' : ''; ?>">
                <a href="?page=packages"><i class="fas fa-box"></i> Tour Packages</a>
            </li>
            <li class="<?php echo $page === 'transport' ? 'active' : ''; ?>">
                <a href="?page=transport"><i class="fas fa-bus"></i> Transportation</a>
            </li>
            <li class="<?php echo $page === 'hotels' ? 'active' : ''; ?>">
                <a href="?page=hotels"><i class="fas fa-hotel"></i> Hotels/Partners</a>
            </li>
            <li class="<?php echo $page === 'bookings' ? 'active' : ''; ?>">
                <a href="?page=bookings"><i class="fas fa-calendar-check"></i> Bookings</a>
            </li>
            <li class="<?php echo $page === 'finance' ? 'active' : ''; ?>">
                <a href="?page=finance"><i class="fas fa-money-bill"></i> Financial</a>
            </li>
            <li class="<?php echo $page === 'promos' ? 'active' : ''; ?>">
                <a href="?page=promos"><i class="fas fa-percent"></i> Promos</a>
            </li>
            <li class="<?php echo $page === 'reviews' ? 'active' : ''; ?>">
                <a href="?page=reviews"><i class="fas fa-star"></i> Reviews</a>
            </li>
            <li class="<?php echo $page === 'settings' ? 'active' : ''; ?>">
                <a href="?page=settings"><i class="fas fa-cog"></i> Settings</a>
            </li>
            <li class="<?php echo $page === 'reports' ? 'active' : ''; ?>">
                <a href="?page=reports"><i class="fas fa-chart-bar"></i> Reports</a>
            </li>
            <li class="<?php echo $page === 'roles' ? 'active' : ''; ?>">
                <a href="?page=roles"><i class="fas fa-user-shield"></i> Roles</a>
            </li>
            <li class="<?php echo $page === 'website' ? 'active' : ''; ?>">
                <a href="?page=website"><i class="fas fa-globe"></i> Website</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="ml-auto">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="../logic/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid">
            <?php
            switch($page) {
                case 'dashboard':
                    include 'pages/dashboard.php';
                    break;
                case 'users':
                    include 'pages/users.php';
                    break;
                case 'packages':
                    include 'pages/packages.php';
                    break;
                case 'transport':
                    include 'pages/transport.php';
                    break;
                case 'hotels':
                    include 'pages/hotels.php';
                    break;
                case 'bookings':
                    include 'pages/bookings.php';
                    break;
                case 'finance':
                    include 'pages/finance.php';
                    break;
                case 'promos':
                    include 'pages/promos.php';
                    break;
                case 'reviews':
                    include 'pages/reviews.php';
                    break;
                case 'settings':
                    include 'pages/settings.php';
                    break;
                case 'reports':
                    include 'pages/reports.php';
                    break;
                case 'roles':
                    include 'pages/roles.php';
                    break;
                case 'website':
                    include 'pages/website.php';
                    break;
                default:
                    include 'pages/dashboard.php';
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/js/admin-script.js"></script>

</body>
</html>
>>>>>>> Stashed changes
