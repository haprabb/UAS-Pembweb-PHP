<?php

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Travel</title>
    <link rel="stylesheet" href="styles/destinasi.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            background: linear-gradient(135deg, #f4f4f4, #eaeaea);
            color: #333;
            overflow-x: hidden;
        }

        header {
            background: linear-gradient(135deg, #1d3557, #457b9d);
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-weight: 600;
            font-size: 2.5em;
            letter-spacing: 1px;
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #a8dadc;
        }

        #destinasi {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 40px 20px;
            gap: 30px;
        }

        .destinasi-card {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            margin: 15px;
            width: 300px;
            text-align: center;
            overflow: hidden;
            transform: scale(1);
            transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
            position: relative;
        }

        .destinasi-card:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .destinasi-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 5px solid #457b9d;
            transition: transform 0.3s ease;
        }

        .destinasi-card:hover img {
            transform: scale(1.1);
        }

        .destinasi-card h2 {
            margin: 15px 0;
            font-size: 1.8em;
            color: #1d3557;
        }

        .destinasi-card p {
            padding: 0 20px;
            margin-bottom: 15px;
            color: #666;
            font-size: 0.95em;
        }

        .destinasi-card button {
            background: linear-gradient(135deg, #1d3557, #457b9d);
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s, transform 0.2s;
            position: relative;
            overflow: hidden;
        }

        .destinasi-card button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
            z-index: 1;
        }

        .destinasi-card button:hover::before {
            transform: scaleX(1);
        }

        .destinasi-card button:hover {
            background: linear-gradient(135deg, #457b9d, #1d3557);
            transform: translateY(-2px);
        }

        footer {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #1d3557, #457b9d);
            color: #ffffff;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
        }

        @media (max-width: 768px) {
            nav ul li {
                display: block;
                text-align: center;
                margin: 10px 0;
            }

            .destinasi-card {
                width: 90%;
            }

            header h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#destinasi">Destinasi</a></li>
                <li><a href="#features">Fitur</a></li>
                <li><a href="#about">Tentang</a></li>
            </ul>
        </nav>
    </header>

    <section id="destinasi">
        <div class="destinasi-card">
            <img src="https://source.unsplash.com/600x400/?beach" alt="Pantai">
            <h2>Pantai Indah</h2>
            <p>Temukan keindahan pantai dengan pasir putih dan air jernih. Nikmati berbagai aktivitas seperti snorkeling dan bersantai di tepi pantai.</p>
            <button>Pesan Sekarang</button>
        </div>

        <div class="destinasi-card">
            <img src="https://source.unsplash.com/600x400/?mountain" alt="Gunung">
            <h2>Gunung Menawan</h2>
            <p>Jelajahi keindahan alam pegunungan dengan trekking yang menantang. Rasakan udara segar dan pemandangan yang menakjubkan.</p>
            <button>Pesan Sekarang</button>
        </div>

        <div class="destinasi-card">
            <img src="https://source.unsplash.com/600x400/?city" alt="Kota">
            <h2>Kota Bersejarah</h2>
            <p>Rasakan pesona kota bersejarah dengan arsitektur yang menakjubkan dan budaya yang kaya. Kunjungi museum dan tempat-tempat ikonik.</p>
            <button>Pesan Sekarang</button>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Travel Destinasi. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
