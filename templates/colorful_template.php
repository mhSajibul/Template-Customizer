<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($store_name ?? 'My Store') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #ff6b6b;
            --secondary: #4ecdc4;
            --accent: #ffbe0b;
            --dark: #292f36;
            --light: #f7f7f7;
        }
        
        @keyframes gradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }
        
        body {
            background-color: <?= $bg_color ?? 'var(--light)' ?>;
            color: <?= $text_color ?? 'var(--dark)' ?>;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 800;
            color: var(--primary) !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 600;
            color: var(--dark) !important;
            margin: 0 10px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link:before {
            content: "";
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -5px;
            left: 0;
            background: var(--primary);
            transition: all 0.3s ease;
        }
        
        .nav-link:hover:before {
            width: 100%;
        }
        
        .hero-section {
            position: relative;
            padding-top: 5rem;
            overflow: hidden;
        }
        
        .wave-shape {
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            z-index: 1;
        }
        
        .hero-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            margin-bottom: 3rem;
        }
        
        .hero-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transform: scale(1.05);
            transition: transform 0.5s ease;
        }
        
        .hero-image-container:hover .hero-image {
            transform: scale(1);
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,107,107,0.7), rgba(78,205,196,0.7));
            opacity: 0.5;
            transition: opacity 0.5s ease;
        }
        
        .hero-image-container:hover .hero-overlay {
            opacity: 0.7;
        }
        
        .content-section {
            background: white;
            padding: 5rem 0;
            position: relative;
        }
        
        .content-section:before {
            content: "";
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: white;
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        }
        
        .store-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% 200%;
            animation: gradient 4s ease infinite;
        }
        
        .store-description {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 2.5rem;
            color: #666;
        }
        
        .btn-custom {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            font-weight: 700;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            color: white;
        }
        
        .contact-section {
            background-color: var(--dark);
            color: white;
            padding: 5rem 0;
            position: relative;
        }
        
        .contact-section:before {
            content: "";
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: var(--dark);
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        }
        
        .contact-title {
            font-weight: 800;
            color: var(--accent);
            margin-bottom: 2rem;
            font-size: 2.5rem;
        }
        
        .contact-box {
            background: rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 3rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        }
        
        .social-links {
            margin-top: 2rem;
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: white;
            color: var(--primary);
            border-radius: 50%;
            margin: 0 10px;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            transform: translateY(-8px) rotate(360deg);
            background: var(--accent);
            color: white;
        }
        
        footer {
            background: white;
            padding: 2rem 0;
            text-align: center;
            color: #666;
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        @media (max-width: 768px) {
            .store-title {
                font-size: 2.5rem;
            }
            
            .hero-image {
                height: 350px;
            }
            
            .contact-box {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><?= htmlspecialchars($store_name ?? 'My Store') ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item ml-8">
                    <a class="nav-link" href="index.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section container">
    <div class="hero-image-container">
        <div class="hero-overlay"></div>
        <?php if (!empty($banner)): ?>
            <img src="assets/uploads/<?= htmlspecialchars($banner) ?>" class="hero-image" alt="Store Banner">
        <?php else: ?>
            <img src="assets/uploads/colorful.jpg" class="hero-image" alt="Store Banner">
        <?php endif; ?>
    </div>
</section>

<!-- Content Section -->
<section class="content-section">
    <div class="container text-center">
        <h1 class="store-title"><?= htmlspecialchars($store_name ?? 'My Store') ?></h1>
        <p class="store-description"><?= htmlspecialchars($welcome_text ?? 'Welcome to our vibrant store! Discover a world of colorful products designed to bring joy to your everyday life.') ?></p>
        <a href="#" class="btn btn-custom floating">Discover Now</a>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container text-center">
        <h2 class="contact-title">Get In Touch</h2>
        <div class="contact-box">
            <p class="mb-4"><?= nl2br(htmlspecialchars($contact_info ?? 'No contact info provided')) ?></p>
            <div class="social-links">
                <a href="#" class="social-icon"><i class="fab fa-pinterest"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($store_name ?? 'My Store') ?>. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>