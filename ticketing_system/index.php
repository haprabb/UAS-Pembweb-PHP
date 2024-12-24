<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">TravelKuy<span class="text-primary">.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php">Tiket</a></li>
                    <li class="nav-item"><a class="nav-link" href="../about.php">Tentang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5 pt-5">
        <h1 class="text-center">Pemesanan Tiket</h1>
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
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Populate select options
            $.get('api.php?action=getCities', function (data) {
                const cities = JSON.parse(data);
                cities.forEach(city => {
                    $('#departure, #destination').append(`<option value="${city}">${city}</option>`);
                });
            });

            // Search Tickets
            $('#searchTicket').on('click', function () {
                const departure = $('#departure').val();
                const destination = $('#destination').val();
                if (departure && destination) {
                    $.get('api.php?action=searchTickets', { departure, destination }, function (data) {
                        const tickets = JSON.parse(data);
                        let rows = '';
                        tickets.forEach(ticket => {
                            rows += `<tr>
                                <td>${ticket.id}</td>
                                <td>${ticket.departure}</td>
                                <td>${ticket.destination}</td>
                                <td>${ticket.price}</td>
                                <td>${ticket.seat_available}</td>
                                <td>${ticket.name}</td>
                            </tr>`;
                        });
                        $('#resultTable tbody').html(rows);
                    });
                } else {
                    alert('Silakan pilih kota keberangkatan dan tujuan!');
                }
            });

            // View All Tickets
            $('#viewTickets').on('click', function () {
                $.get('api.php?action=getAllTickets', function (data) {
                    const tickets = JSON.parse(data);
                    let rows = '';
                    tickets.forEach(ticket => {
                        rows += `<tr>
                            <td>${ticket.id}</td>
                            <td>${ticket.departure}</td>
                            <td>${ticket.destination}</td>
                            <td>${ticket.price}</td>
                            <td>${ticket.seat_available}</td>
                            <td>${ticket.name}</td>
                        </tr>`;
                    });
                    $('#allTicketsTable tbody').html(rows);
                });
            });
        });
    </script>
</body>

</html>
