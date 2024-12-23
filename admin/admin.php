<?php
include '../api/get_admin.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - TravelKuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style1.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="adminindex.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
                TravelKuy<span class="text-primary">.</span>
            </a>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="btn btn-danger" href="../logic/logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i>Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Manajemen Tiket</h2>
        
        <!-- Tombol Tambah Tiket -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTicketModal">
            <i class="fas fa-plus"></i> Tambah Tiket
        </button>

        <!-- Tabel Tiket -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Tiket</th>
                        <th>Keberangkatan</th>
                        <th>Tujuan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tickets)): ?>
                        <?php foreach($tickets as $ticket): ?>
                        <tr>
                            <td><?= htmlspecialchars($ticket['id'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['name'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['departure'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['destination'] ?? '') ?></td>
                            <td>Rp <?= number_format($ticket['price'] ?? 0, 0, ',', '.') ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editTicket(<?= $ticket['id'] ?>)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteTicket(<?= $ticket['id'] ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Tiket -->
    <div class="modal fade" id="addTicketModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tiket Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addTicketForm" method="POST" action="../api/get_admin.php">
                        <div class="mb-3">
                            <label class="form-label">Nama Tiket</label>
                            <input type="text" class="form-control" name="ticket_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keberangkatan</label>
                            <input type="text" class="form-control" name="departure" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tujuan</label>
                            <input type="text" class="form-control" name="destination" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Tiket -->
    <div class="modal fade" id="editTicketModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editTicketForm" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id">
                        <div class="mb-3">
                            <label class="form-label">Nama Tiket</label>
                            <input type="text" class="form-control" name="ticket_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keberangkatan</label>
                            <input type="text" class="form-control" name="departure" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tujuan</label>
                            <input type="text" class="form-control" name="destination" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk mendapatkan data tiket untuk diedit
        function editTicket(id) {
            fetch(`../api/get_admin.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                const form = document.getElementById('editTicketForm');
                form.id.value = data.id;
                form.ticket_name.value = data.name;
                form.departure.value = data.departure;
                form.destination.value = data.destination;
                form.price.value = data.price;
                form.action = `../api/get_admin.php?id=${id}`;
                
                new bootstrap.Modal(document.getElementById('editTicketModal')).show();
            });
        }

        // Fungsi untuk menghapus tiket
        function deleteTicket(id) {
            if(confirm('Apakah Anda yakin ingin menghapus tiket ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `../api/get_admin.php?id=${id}`;
                
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                
                form.appendChild(methodInput);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>
