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
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="stylesheet" href="styles.css">

    <style>
       
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#destinations">Destinasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>

                    <!-- Login/Profile Section -->
                    <?php if (!isset($_COOKIE['logus135'])): ?>
                        <li class="nav-item ms-3">
                            <a href="auth/login.php" class="btn btn-primary login-btn rounded-pill">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle user-profile d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="images/user/default-photo.jpg" alt="User Profile" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                <span class="d-none d-lg-inline fw-medium"><?php echo $_COOKIE['logusname']; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end slideIn" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="auth/profile.php">
                                        <i class="fas fa-user me-2 text-primary"></i>Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="auth/settings.php">
                                        <i class="fas fa-cog me-2 text-primary"></i>Pengaturan
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="logic/logout.php">
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

    <div class="container">
        <h1 class="mb-4">Cari dan Beli Tiket</h1>
        
        <!-- Search Form -->
        <form id="ticketForm" class="mb-5">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="from">Dari:</label>
                        <select id="from" name="from" class="form-control" required>
                            <option value="">Pilih kota keberangkatan</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Semarang">Semarang</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="to">Ke:</label>
                        <select id="to" name="to" class="form-control" required>
                            <option value="">Pilih kota tujuan</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Semarang">Semarang</option>
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
                <button type="submit" class="btn btn-primary w-100">Beli Tiket</button>
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
            </div>
        </div>
    </div>

    <script>
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
