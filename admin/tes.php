<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - goTravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6f42c1;
            --secondary-color: #8854d0;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            color: white;
        }

        .nav-link {
            color: rgba(255,255,255,0.8);
            transition: all 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
        }

        .main-content {
            background: #f8f9fa;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .stats-card {
            transition: transform 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar p-3">
            <h4 class="text-center mb-4">goTravel Admin</h4>
            <div class="nav flex-column">
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
                                            <button class="btn btn-sm btn-info" onclick="showEditForm('#12346')">Edit</button>
                                            <button class="btn btn-sm btn-danger" onclick="showDeleteConfirm('#12346')">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Form Edit Pemesanan -->
                        <div id="editForm" class="mt-4" style="display:none;">
                            <h4>Edit Pemesanan</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">ID Pemesanan</label>
                                        <input type="text" class="form-control" id="editBookingId" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="editDate">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Pelanggan</label>
                                        <input type="text" class="form-control" id="editCustomer">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Destinasi</label>
                                        <input type="text" class="form-control" id="editDestination">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" id="editStatus">
                                            <option value="pending">Pending</option>
                                            <option value="success">Sukses</option>
                                            <option value="cancelled">Dibatalkan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Total</label>
                                        <input type="text" class="form-control" id="editTotal">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="saveEdit()">Simpan Perubahan</button>
                                <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Batal</button>
                            </form>
                        </div>

                        <!-- Konfirmasi Hapus -->
                        <div id="deleteConfirm" class="mt-4" style="display:none;">
                            <div class="alert alert-danger">
                                <h5>Konfirmasi Penghapusan</h5>
                                <p>Apakah Anda yakin ingin menghapus pemesanan <span id="deleteBookingId"></span>?</p>
                                <button class="btn btn-danger" onclick="confirmDelete()">Ya, Hapus</button>
                                <button class="btn btn-secondary" onclick="hideDeleteConfirm()">Batal</button>
                            </div>
                        </div>

                        <script>
                            function showEditForm(id) {
                                document.getElementById('editForm').style.display = 'block';
                                document.getElementById('editBookingId').value = id;
                            }

                            function hideEditForm() {
                                document.getElementById('editForm').style.display = 'none';
                            }

                            function saveEdit() {
                                alert('Perubahan telah disimpan!');
                                hideEditForm();
                            }

                            function showDeleteConfirm(id) {
                                document.getElementById('deleteConfirm').style.display = 'block';
                                document.getElementById('deleteBookingId').textContent = id;
                            }

                            function hideDeleteConfirm() {
                                document.getElementById('deleteConfirm').style.display = 'none';
                            }

                            function confirmDelete() {
                                alert('Data telah dihapus!');
                                hideDeleteConfirm();
                            }
                        </script>
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
                <div class="card mb-4">
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
                                            <button class="btn btn-sm btn-danger" onclick="toggleDeactivateForm(1)">Nonaktifkan</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h2>Manajemen Admin</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Super Admin</td>
                                        <td>admin@sistem.com</td>
                                        <td>Super Admin</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

                        <!-- Form Konfirmasi Nonaktifkan -->
                        <div id="deactivateForm" class="mt-4" style="display: none;">
                            <div class="card">
                                <div class="card-header bg-warning text-dark">
                                    <h5>Konfirmasi Nonaktifkan Pengguna</h5>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" id="deactivateUserId">
                                    <p>Apakah Anda yakin ingin menonaktifkan pengguna <strong id="deactivateUserName"></strong>?</p>
                                    <p>Tindakan ini akan mencabut akses pengguna ke sistem.</p>
                                    <button type="button" class="btn btn-danger" onclick="nonaktifkanPengguna()">Ya, Nonaktifkan</button>
                                    <button type="button" class="btn btn-secondary" onclick="toggleDeactivateForm()">Batal</button>
                                </div>
                            </div>
                        </div>

                        <script>
                            const userData = {
                                1: { nama: 'Ahmad Rizki', email: 'ahmad@email.com', status: 'aktif' }
                            };

                            function toggleDeactivateForm(userId = null) {
                                const form = document.getElementById('deactivateForm');
                                if (userId) {
                                    document.getElementById('deactivateUserId').value = userId;
                                    document.getElementById('deactivateUserName').textContent = userData[userId].nama;
                                    form.style.display = 'block';
                                } else {
                                    form.style.display = 'none';
                                }
                            }

                            function nonaktifkanPengguna() {
                                const userId = document.getElementById('deactivateUserId').value;
                                userData[userId].status = 'nonaktif';
                                alert('Pengguna berhasil dinonaktifkan!');
                                toggleDeactivateForm();
                            }
                        </script>
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
                datasets: [
                    {
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
