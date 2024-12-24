<?php

include "../query-db/users.php";
include "../config/connection.php";

$userID = $_COOKIE["logusid"];

if(!isset($_COOKIE['logus135'])){
    echo <<<SCRIPT
               <script>
                   alert('Login terlebih dahulu!');
                   document.location.href = "../index.php";
               </script>
    SCRIPT;
}

$gambarUser = getImageUser(getConnection(), $userID);

if(count($gambarUser) > 0){
    $gambarUser = getImageUser(getConnection(), $userID)[0]['image'];
}else{
    $gambarUser = "default-photo.jpg";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/navbar.css">

    <link rel="stylesheet" href="../styles/style1.css">
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
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Tiket</a>
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
                                <img src="../images/user/<?= $gambarUser ?>" alt="User Profile" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                <span class="d-none d-lg-inline fw-medium"><?php echo $_COOKIE['logusname']; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end slideIn" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="../auth/profile.php">
                                        <i class="fas fa-user me-2 text-primary"></i>Profil Saya
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

    <!-- Content -->
    <div class="container mt-5 pt-5">
        <h1 class="text-center mt-5">Pemesanan Tiket</h1>
        <form id="ticketForm" class="mt-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="departure" class="form-label">Dari</label>
                    <select class="form-select" id="departure" name="departure" required>
                        <option value="" selected disabled>Pilih Kota Keberangkatan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="destination" class="form-label">Ke</label>
                    <select class="form-select" id="destination" name="destination" required>
                        <option value="" selected disabled>Pilih Kota Tujuan</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-between">
                <button type="button" id="searchTicket" class="btn btn-primary">Cari Tiket</button>
                <button type="button" id="viewTickets" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#allTicketsModal">Lihat Semua Tiket</button>
            </div>
        </form>

        <!-- Search Result -->
        <div class="mt-5">
            <h2>Hasil Pencarian</h2>
            <table class="table table-striped" id="resultTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dari</th>
                        <th>Ke</th>
                        <th>Harga</th>
                        <th>Kursi Tersedia</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>


        <!-- Modal for All Tickets -->
        <div class="modal fade" id="allTicketsModal" tabindex="-1" aria-labelledby="allTicketsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allTicketsModalLabel">Semua Tiket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped" id="allTicketsTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dari</th>
                                    <th>Ke</th>
                                    <th>Harga</th>
                                    <th>Kursi Tersedia</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="buyTicketModal" tabindex="-1" aria-labelledby="buyTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyTicketModalLabel">Beli Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="buyTicketForm">
                        <input type="hidden" id="ticketId" name="ticket_id">
                        <div class="mb-3">
                            <label for="buyerName" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="buyerName" name="buyer_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="ticketQuantity" class="form-label">Jumlah Tiket</label>
                            <input type="number" class="form-control" id="ticketQuantity" name="quantity" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Beli</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Populate select options for departure and destination
            $.get('api.php?action=getCities', function(data) {
                const cities = JSON.parse(data);
                $('#departure, #destination').empty().append('<option value="" disabled selected>Pilih Kota</option>');
                cities.forEach(city => {
                    $('#departure, #destination').append(`<option value="${city}">${city}</option>`);
                });
            });

            // Search Tickets
            $('#searchTicket').on('click', function() {
                const departure = $('#departure').val();
                const destination = $('#destination').val();
                if (departure && destination) {
                    $.get('api.php?action=searchTickets', {
                        departure,
                        destination
                    }, function(data) {
                        const tickets = JSON.parse(data);
                        let rows = '';
                        tickets.forEach(ticket => {
                            let jenis = '';
                            if (ticket.name.startsWith('PLANE')) {
                                jenis = 'Pesawat';
                            } else if (ticket.name.startsWith('SHIP')) {
                                jenis = 'Kapal';
                            } else if (ticket.name.startsWith('KA')) {
                                jenis = 'Kereta Api';
                            }
                            const lokasi = ticket.name.split(' ').slice(1).join(' ');

                            rows += `<tr>
                        <td>${ticket.id}</td>
                        <td>${ticket.departure}</td>
                        <td>${ticket.destination}</td>
                        <td>${ticket.price}</td>
                        <td>${ticket.seat_available}</td>
                        <td>${ticket.name}</td>
                        <td>${jenis}</td>
                        <td>${lokasi}</td>
                        <td><button class="btn btn-success btn-sm buy-ticket" data-id="${ticket.id}" data-bs-toggle="modal" data-bs-target="#buyTicketModal">Beli</button></td>
                    </tr>`;
                        });
                        $('#resultTable tbody').html(rows);
                    });
                } else {
                    alert('Silakan pilih kota keberangkatan dan tujuan!');
                }
            });

            // View All Tickets
            $('#viewTickets').on('click', function() {
                $.get('api.php?action=getAllTickets', function(data) {
                    const tickets = JSON.parse(data);
                    let rows = '';
                    tickets.forEach(ticket => {
                        let jenis = '';
                        if (ticket.name.startsWith('PLANE')) {
                            jenis = 'Pesawat';
                        } else if (ticket.name.startsWith('SHIP')) {
                            jenis = 'Kapal';
                        } else if (ticket.name.startsWith('KA')) {
                            jenis = 'Kereta Api';
                        }
                        const lokasi = ticket.name.split(' ').slice(1).join(' ');

                        rows += `<tr>
                    <td>${ticket.id}</td>
                    <td>${ticket.departure}</td>
                    <td>${ticket.destination}</td>
                    <td>${ticket.price}</td>
                    <td>${ticket.seat_available}</td>
                    <td>${ticket.name}</td>
                    <td>${jenis}</td>
                    <td>${lokasi}</td>
                </tr>`;
                    });
                    $('#allTicketsTable tbody').html(rows);
                });
            });

            // Open Buy Ticket Modal
            $(document).on('click', '.buy-ticket', function() {
                const ticketId = $(this).data('id');
                $('#ticketId').val(ticketId);
            });

            // Handle Buy Ticket
            $('#buyTicketForm').on('submit', function(e) {
                e.preventDefault();
                const formData = $(this).serialize();
                $.post('api.php?action=buyTicket', formData, function(response) {
                    alert(response.message);

                    // Explicitly hide the modal
                    const buyTicketModal = bootstrap.Modal.getInstance(document.getElementById('buyTicketModal'));
                    if (buyTicketModal) {
                        buyTicketModal.hide();
                    }

                    // Remove any remaining modal backdrop
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');

                    // Clear the form fields
                    $('#buyTicketForm')[0].reset();
                }, 'json');
            });
        });
    </script>

</body>

</html>