<?php
include '../api/get_adminUser.php';
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
            <a href="adminUser.php">
                <button type="button" class="btn btn-primary mb-3 me-2" data-bs-toggle="modal" data-bs-target="#addPengunjung">
                    <i class="fas fa-person"></i> Jumlah Pengguna
                </button>
            </a>
            <a href="admin.php">
                <button type="button" class="btn btn-primary mb-3 me-2" data-bs-toggle="modal" data-bs-target="#addPengunjung">
                    <i class="fas fa-plus"></i> Tiket
                </button>
            </a>
            <a href="adminGrafik.php">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPengunjung">
                    <i class="fas fa-plus"></i> Grafik Penjualan
                </button>
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
        <h2 class="mb-4">Manajemen User</h2>

        <!-- Tombol Tambah Tiket -->



        <!-- Tabel Tiket -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pengunjung</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $users): ?>
                            <tr>
                                <td><?= htmlspecialchars($users['id'] ?? '') ?></td>
                                <td><?= htmlspecialchars($users['name'] ?? '') ?></td>
                                <td><?= htmlspecialchars($users['email'] ?? '') ?></td>
                                <td><?= htmlspecialchars($users['role'] ?? '') ?></td>
                                <td> <?= htmlspecialchars($users['image'] ?? '') ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="editUsers(<?= $users['id'] ?>)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteUsers(<?= $users['id'] ?>)">
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
   
    <div class="modal fade" id="editUsersModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id">
                        <div class="mb-3">
                            <label class="form-label">Nama Pengunjung baru</label>
                            <input type="text" class="form-control" name="nama_pengunjung" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email_pengunjung" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" name="role_pengunjung" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="number" class="form-control" name="gambar_pengunjung" required>
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



    <!-- Modal Tambah Pengunjung -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk mendapatkan data tiket untuk diedit
        function editUser(id) {
            fetch(`../api/get_adminUser.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    const form = document.getElementById('editUserForm');
                    form.id.value = data.id;
                    form.nama_pengunjung.value = data.name;
                    form.email_pengunjung.value = data.email;
                    form.role_pengunjung.value = data.role;
                    form.gambar_pengunjung.value = data.image;
                    form.action = `../api/get_adminUser.php?id=${id}`;

                    new bootstrap.Modal(document.getElementById('editUserModal')).show();
                });
        }

        // Fungsi untuk menghapus tiket
        function deleteUsers(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pengunjung ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `../api/get_adminUser.php?id=${id}`;

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


