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
        .bbc-nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }
        .bbc-nav a:hover {
            text-decoration: underline;
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
    </style>
</head>
<body>
    <header class="bbc-header py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><i class="fas fa-globe-europe"></i> UBG News</h1>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="bbc-nav">
                        <a href="#">Home</a>
                        <a href="#">News</a>
                        <a href="#">Sport</a>
                        <a href="#">Business</a>
                        <a href="#">Innovation</a>
                        <a href="#">Culture</a>
                        <a href="#">Travel</a>
                        <a href="#">Earth</a>
                        <a href="#">Video</a>
                        <a href="#">Live</a>
                        <a href="#"><i class="fas fa-search"></i></a>
                    </div>
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
                    <h5>Explore the BBC</h5>
                    <p>We’ve updated our Terms of Use and encourage you to read them.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; 2026 BBC. The BBC is not responsible for the content of external sites.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
