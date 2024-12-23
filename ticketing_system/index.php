<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelKuy - Pembelian Tiket</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style1.css">
    <link rel="stylesheet" href="../styles/navbar.css">

    <style>
        :root {
            --primary-color: #2196F3;
            --secondary-color: #FFC107;
            --success-color: #4CAF50;
            --danger-color: #F44336;
            --text-color: #333;
            --light-bg: #f8f9fa;
            --border-radius: 8px;
            --box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: #f5f5f5;
            line-height: 1.6;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: var(--box-shadow);
            padding: 1rem 0;
            transition: var(--transition);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .nav-link {
            color: var(--text-color);
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: var(--transition);
        }

        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .main-content {
            padding-top: 100px;
            min-height: 100vh;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: darken(var(--primary-color), 10%);
            transform: translateY(-2px);
        }

        .form-control {
            border-radius: var(--border-radius);
            padding: 0.75rem;
            border: 1px solid #ddd;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
        }

        .card {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
            margin-bottom: 2rem;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .table {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .table th {
            background-color: var(--light-bg);
            font-weight: 600;
            border: none;
        }

        .table td {
            vertical-align: middle;
            border-color: #eee;
        }

        /* Modal Kustom */
        .modal-custom {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: 0 0 25px rgba(0,0,0,0.15);
            z-index: 1000;
            width: 90%;
            max-width: 800px;
            max-height: 85vh;
            overflow-y: auto;
        }

        .modal-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(3px);
            z-index: 999;
        }

        .close-modal {
            position: absolute;
            right: 1.5rem;
            top: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
            transition: var(--transition);
        }

        .close-modal:hover {
            color: var(--danger-color);
            transform: rotate(90deg);
        }

        .clickable-row {
            cursor: pointer;
            transition: var(--transition);
        }

        .clickable-row:hover {
            background-color: var(--light-bg);
            transform: scale(1.01);
        }

        /* Warna untuk jenis transportasi */
        .ka-row {
            background-color: rgba(33, 150, 243, 0.1) !important;
        }
        
        .ship-row {
            background-color: rgba(76, 175, 80, 0.1) !important;  
        }
        
        .plane-row {
            background-color: rgba(255, 193, 7, 0.1) !important;
        }

        .transport-icon {
            margin-right: 0.5rem;
            font-size: 1rem;
            transition: var(--transition);
        }

        .ka-icon {
            color: var(--primary-color);
        }

        .ship-icon {
            color: var(--success-color);
        }

        .plane-icon {
            color: var(--secondary-color);
        }

        /* Animasi */
        @keyframes slideIn {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .slideIn {
            animation: slideIn 0.3s ease forwards;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }

            .main-content {
                padding-top: 80px;
            }

            .modal-custom {
                width: 95%;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php
        include "../config/connection.php";
        include "../query-db/users.php";
        
        $userID = $_COOKIE["logusid"];
        $gambarUser = getImageUser(getConnection(), $userID)[0]['image'];
    ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="../index.php">
                TravelKuy<span class="text-primary">.</span>
            </a>

            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <!-- Menu Items -->
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../destinasi.php">Destinasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.php">Tentang</a>
                    </li>

                    <!-- Login/Profile Section -->
                    <?php if (!isset($_COOKIE['logus135'])): ?>
                        <li class="nav-item ms-3">
                            <a href="../auth/login.php" class="btn btn-primary login-btn rounded-pill">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle user-profile d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../images/user/<?php echo $gambarUser; ?>" alt="User Profile" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                <span class="d-none d-lg-inline fw-medium"><?php echo $_COOKIE['logusname']; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end slideIn" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="../auth/profile.php">
                                        <i class="fas fa-user me-2 text-primary"></i>Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../auth/settings.php">
                                        <i class="fas fa-cog me-2 text-primary"></i>Pengaturan
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="../logic/logout.php">
                                        <i class="fas fa-sign-out-alt me-2"></i>Keluar
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        <h1 class="mb-4">Cari dan Beli Tiket</h1>

        <!-- Tombol untuk melihat daftar tiket -->
        <button class="btn btn-info mb-4" onclick="showTicketList()">
            <i class="fas fa-list me-2"></i>Lihat Daftar Tiket Tersedia
        </button>

        <!-- Modal Daftar Tiket -->
        <div id="ticketListModal" class="modal-custom">
            <span class="close-modal" onclick="closeTicketList()">&times;</span>
            <h3 class="mb-4">Daftar Tiket Tersedia</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Keberangkatan</th>
                            <th>Tujuan</th>
                            <th>Harga</th>
                            <th>Kursi Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $conn = getConnection();
                        $query = "SELECT * FROM tickets";
                        $stmt = $conn->query($query);
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
                            $transportClass = '';
                            $transportIcon = '';
                            
                            if (stripos($row['name'], 'KA') !== false) {
                                $transportClass = 'ka-row';
                                $transportIcon = '<i class="fas fa-train transport-icon ka-icon"></i>';
                            } elseif (stripos($row['name'], 'SHIP') !== false) {
                                $transportClass = 'ship-row';
                                $transportIcon = '<i class="fas fa-ship transport-icon ship-icon"></i>';
                            } elseif (stripos($row['name'], 'PLANE') !== false) {
                                $transportClass = 'plane-row';
                                $transportIcon = '<i class="fas fa-plane transport-icon plane-icon"></i>';
                            }
                        ?>
                        <tr class="clickable-row <?php echo $transportClass; ?>" onclick="fillSearchForm('<?php echo $row['departure']; ?>', '<?php echo $row['destination']; ?>')">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $transportIcon . $row['name']; ?></td>
                            <td><?php echo $row['departure']; ?></td>
                            <td><?php echo $row['destination']; ?></td>
                            <td>Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                            <td><?php echo $row['seat_available']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="modalBackdrop" class="modal-backdrop"></div>
        
        <!-- Search Form -->
        <form id="ticketForm" class="mb-5">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="from">Dari:</label>
                        <select id="from" name="from" class="form-control" required>
                            <option value="">Pilih kota keberangkatan</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Semarang">Semarang</option>
                            <option value="Surakarta">Surakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bali">Bali</option>
                            <option value="Raja Ampat">Raja Ampat</option>
                            <option value="Nusa Penida">Nusa Penida</option>
                            <option value="Komodo Island">Komodo Island</option>
                            <option value="Belitung">Belitung</option>
                            <option value="Derawan">Derawan</option>
                            <option value="Bunaken">Bunaken</option>
                            <option value="Gili Trawangan">Gili Trawangan</option>
                            <option value="Karimunjawa">Karimunjawa</option>
                            <option value="Wakatobi">Wakatobi</option>
                            <option value="Togean Islands">Togean Islands</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="to">Ke:</label>
                        <select id="to" name="to" class="form-control" required>
                            <option value="">Pilih kota tujuan</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Semarang">Semarang</option>
                            <option value="Surakarta">Surakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bali">Bali</option>
                            <option value="Raja Ampat">Raja Ampat</option>
                            <option value="Nusa Penida">Nusa Penida</option>
                            <option value="Komodo Island">Komodo Island</option>
                            <option value="Belitung">Belitung</option>
                            <option value="Derawan">Derawan</option>
                            <option value="Bunaken">Bunaken</option>
                            <option value="Gili Trawangan">Gili Trawangan</option>
                            <option value="Karimunjawa">Karimunjawa</option>
                            <option value="Wakatobi">Wakatobi</option>
                            <option value="Togean Islands">Togean Islands</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </div>
        </form>

        <!-- Tickets Table -->
        <h2>Tiket Tersedia</h2>
        <div class="table-responsive">
            <table id="ticketTable" class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Keberangkatan</th>
                        <th>Tujuan</th>
                        <th>Harga</th>
                        <th>Kursi Tersedia</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="no-data" colspan="6">Tidak ada tiket ditemukan. Silakan cari.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Purchase Section -->
        <div id="purchaseSection" style="display: none;" class="card p-4 mb-4">
            <h2 class="text-center mb-4">Pembelian Tiket</h2>
            <form id="purchaseForm">
                <div class="form-group mb-3">
                    <label for="userName">Nama Anda:</label>
                    <input type="text" id="userName" name="userName" class="form-control" required placeholder="Masukkan nama anda">
                </div>
                <div class="form-group mb-4">
                    <label for="ticketSelect">Pilih Tiket:</label>
                    <select id="ticketSelect" name="ticketSelect" class="form-control" required>
                        <option value="">-- Pilih Tiket --</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="buyButton">Beli Tiket</button>
            </form>
        </div>

        <!-- Receipt Section -->
        <div id="receipt" style="display: none;" class="card">
            <h2 class="text-center mb-4">Bukti Pembelian</h2>
            <div class="card-body">
                <p><strong>Tiket Dibeli:</strong> <span id="ticketName"></span></p>
                <p><strong>Dari:</strong> <span id="departureCity"></span></p>
                <p><strong>Ke:</strong> <span id="destinationCity"></span></p>
                <p><strong>Harga:</strong> <span id="ticketPrice"></span></p>
                <p><strong>Sisa Kursi:</strong> <span id="remainingSeats"></span></p>
                <a href="../auth/profile.php" class="btn btn-primary w-100">Lihat Detail</a>
            </div>
        </div>
    </div>

    <script>
        function showTicketList() {
            document.getElementById('ticketListModal').style.display = 'block';
            document.getElementById('modalBackdrop').style.display = 'block';
        }

        function closeTicketList() {
            document.getElementById('ticketListModal').style.display = 'none';
            document.getElementById('modalBackdrop').style.display = 'none';
        }

        function fillSearchForm(departure, destination) {
            document.getElementById('from').value = departure;
            document.getElementById('to').value = destination;
            closeTicketList();
            document.getElementById('ticketForm').dispatchEvent(new Event('submit'));
        }

        document.getElementById('ticketForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const from = document.getElementById('from').value.trim();
            const to = document.getElementById('to').value.trim();

            if (from === '' || to === '') {
                alert('Mohon isi kedua field!');
                return;
            }

            fetch(`api.php?from=${from}&to=${to}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.querySelector('#ticketTable tbody');
                    const ticketSelect = document.getElementById('ticketSelect');
                    tableBody.innerHTML = '';

                    ticketSelect.innerHTML = '<option value="">-- Pilih Tiket --</option>';
                    data.forEach(ticket => {
                        const row = `
                            <tr>
                                <td>${ticket.name}</td>
                                <td>${ticket.departure}</td>
                                <td>${ticket.destination}</td>
                                <td>Rp ${ticket.price.toLocaleString()}</td>
                                <td>${ticket.seat_available}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" 
                                        onclick="selectTicket(${ticket.id}, '${ticket.name}', '${ticket.departure}', '${ticket.destination}', ${ticket.price}, ${ticket.seat_available})">
                                        Beli
                                    </button>
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;

                        const option = document.createElement('option');
                        option.value = ticket.id;
                        option.textContent = `${ticket.name} (${ticket.departure} ke ${ticket.destination}) - Rp ${ticket.price.toLocaleString()}`;
                        ticketSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    alert('Terjadi kesalahan saat mengambil data. Silakan coba lagi.');
                });
        });

        function selectTicket(id, name, departure, destination, price, seatAvailable) {
            document.getElementById('ticketName').textContent = name;
            document.getElementById('departureCity').textContent = departure;
            document.getElementById('destinationCity').textContent = destination;
            document.getElementById('ticketPrice').textContent = `Rp ${price.toLocaleString()}`;
            document.getElementById('remainingSeats').textContent = seatAvailable;
            document.getElementById('purchaseSection').style.display = 'block';

            document.getElementById('purchaseForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const userName = document.getElementById('userName').value.trim();
                if (userName === '') {
                    alert('Mohon masukkan nama anda!');
                    return;
                }

                fetch('api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `ticket_id=${id}&user_name=${encodeURIComponent(userName)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById('receipt').style.display = 'block';
                        document.getElementById('buyButton').disabled = true;
                        document.getElementById('receipt').scrollIntoView({ behavior: 'smooth' });
                        alert('Tiket berhasil dibeli!');
                    } else {
                        alert('Terjadi kesalahan saat membeli tiket.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat membeli tiket.');
                });
            });
        }
    </script>
</body>
</html>
