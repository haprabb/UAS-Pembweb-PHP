<?php

function getConnection()
{
    $host = 'localhost';
    $dbname = 'uas_pemweb';
    $username = 'root';
    $password = '';

    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}

function getChartData()
{
    try {
        $conn = getConnection();
        $stmt = $conn->query("SELECT purchase_date, quantity FROM purchases");
        $data = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = [
                'purchase_date' => $row['purchase_date'],
                'quantity' => floatval($row['quantity'])
            ];
        }

        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

$chartData = getChartData();
$labels = json_encode(array_column($chartData, 'purchase_date'));
$data = json_encode(array_column($chartData, 'quantity'));
?>

<!DOCTYPE html>
<html lang="en">
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div style="width: 80%; margin: auto; padding-top: 20px;">
    <canvas id="purchasesChart" width="400" height="200"></canvas>
</div>

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

    <script>
        const labels = <?php echo $labels; ?>;
        const data = <?php echo $data; ?>;

        console.log('Labels:', labels); // Debugging
        console.log('Data:', data);     // Debugging

        const ctx = document.getElementById('purchasesChart').getContext('2d');
        const purchasesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Quantity Purchased',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Purchase Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Quantity'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
