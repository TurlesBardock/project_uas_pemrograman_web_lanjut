<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBC News - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .bbc-header {
            background-color: #0008a8;
            color: white;
        }
        .bbc-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 20px;
            margin-top: 10px;
        }
        .bbc-nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            white-space: nowrap;
            transition: all 0.3s ease;
            padding: 2px 0;
            position: relative;
        }
        .bbc-nav a:hover {
            color: #FFD700;
            text-decoration: none;
        }
        .bbc-nav a:hover::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #FFD700;
        }
        .news-card {
            border: none;
            border-radius: 0;
            margin-bottom: 20px;
        }
        .news-card img {
            border-radius: 0;
        }
        .news-card .card-title {
            font-weight: bold;
        }
        .news-card .card-text {
            color: #333;
        }
        .footer {
            background-color: #222;
            color: white;
            padding: 40px 0;
        }
        .header-title {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .search-icon {
            margin-left: auto;
            font-size: 16px;
        }
        @media (max-width: 768px) {
            .bbc-nav {
                gap: 8px 15px;
                margin-top: 15px;
            }
            .bbc-nav a {
                font-size: 13px;
            }
            .header-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <header class="bbc-header py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="header-title">
                        <i class="fas fa-globe-europe"></i>
                        <span>Bumigora News</span>
                        <a href="#" class="search-icon text-white ms-auto">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <nav class="bbc-nav">
                        <a href="#">Home</a>
                        <a href="#">Politik & Hukum</a>
                        <a href="#">Olahraga</a>
                        <a href="#">Ekonomi & Bisnis</a>
                        <a href="#">Lingkungan & Bencana</a>
                        <a href="#">Hiburan</a>
                        <a href="#">Kesehatan</a>
                        <a href="#">Budaya & Pariwisata</a>
                        <a href="#">Pendidikan</a>
                        <a href="#">Teknologi & Inovasi</a>
                        <a href="#">Nasional</a>
                        <a href="#">Internasional</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Explore the Bumigora News</h5>
                    <p>We've updated our Terms of Use and encourage you to read them.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; 2026 Bumigora News. The Bumigora News is not responsible for the content of external sites.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
