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
            --primary: #000000;
            --secondary: #f8f8f8;
            --accent: #e0e0e0;
            --text: #333333;
        }
        
        body {
            background-color: <?= $bg_color ?? '#ffffff' ?>;
            color: <?= $text_color ?? 'var(--text)' ?>;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            letter-spacing: -0.3px;
            line-height: 1.6;
        }
        
        .navbar {
            background-color: white;
            box-shadow: none;
            border-bottom: 1px solid #eaeaea;
            padding: 1.2rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }
        
        .nav-link {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
        }
        
        .hero-container {
            position: relative;
            padding-top: 6rem;
            padding-bottom: 3rem;
        }
        
        .hero-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        
        .store-info {
            padding: 5rem 0;
            background-color: white;
        }
        
        .store-title {
            font-weight: 700;
            font-size: 2.5rem;
            letter-spacing: -1px;
            margin-bottom: 1.5rem;
        }
        
        .store-subtitle {
            font-weight: 400;
            color: #666;
            max-width: 600px;
            margin: 0 auto 2rem auto;
        }
        
        .explore-btn {
            background-color: var(--primary);
            color: white;
            border-radius: 0;
            padding: 0.8rem 2.5rem;
            font-size: 0.9rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }
        
        .explore-btn:hover {
            background-color: #333;
            color: white;
        }
        
        .contact-section {
            padding: 5rem 0;
            background-color: var(--secondary);
        }
        
        .contact-title {
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }
        
        .contact-info {
            font-size: 1rem;
            color: #666;
            line-height: 1.8;
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            margin: 0 0.3rem;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: #333;
            transform: translateY(-3px);
        }
        
        footer {
            padding: 2rem 0;
            background-color: white;
            border-top: 1px solid #eaeaea;
        }
        
        footer p {
            font-size: 0.9rem;
            color: #999;
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
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
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

<!-- Hero Image -->
<div class="hero-container">
    <?php if (!empty($banner)): ?>
        <img src="assets/uploads/<?= htmlspecialchars($banner) ?>" class="hero-image" alt="Store Banner">
    <?php else: ?>
        <img src="assets/uploads/minimal.jpg" class="hero-image" alt="Store Banner">
    <?php endif; ?>
</div>

<!-- Store Info -->
<section class="store-info text-center">
    <div class="container">
        <h1 class="store-title"><?= htmlspecialchars($store_name ?? 'My Store') ?></h1>
        <p class="store-subtitle"><?= htmlspecialchars($welcome_text ?? 'Welcome to our store. We focus on quality products with minimalist design.') ?></p>
        <a href="#" class="btn explore-btn">Explore</a>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container text-center">
        <h2 class="contact-title">Contact Us</h2>
        <p class="contact-info mb-4"><?= nl2br(htmlspecialchars($contact_info ?? 'No contact info provided')) ?></p>
        <div class="social-links mt-4">
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($store_name ?? 'My Store') ?>. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>