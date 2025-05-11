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
    <!-- Google Fonts - Playfair Display and Lato -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/google-fonts/1.0.0/google-fonts.css">
    <style>
        :root {
            --primary-color: <?= $text_color ??' #8b0000'?>;
            --secondary-color: #d4af37;
            --dark-color: #2c2c2c;
            --light-color: #f9f5eb;
            --bg-color: #fffef9;
            --text-color: #333333;
            --border-color: #e0e0e0;
        }
        
        body {
            background-color: <?= $bg_color ?? 'var(--bg-color)' ?>;
            color: <?= $text_color ?? 'var(--text-color)' ?>;
            font-family: 'Lato', serif;
            line-height: 1.7;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.75rem;
            color: <?= $text_color ?> !important;
        }
        
        .nav-link {
            color: var(--dark-color) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
            padding: 0.5rem 1rem !important;
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
        }
        
        .navbar-toggler {
            border-color: var(--border-color);
        }
        
        .hero-section {
            padding-top: 6rem;
            padding-bottom: 3rem;
            position: relative;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.4));
            z-index: 1;
        }
        
        .hero-image {
            width: 100%;
            height: 70vh;
            object-fit: cover;
            border-radius: 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .content-wrapper {
            position: relative;
            margin-top: -80px;
            z-index: 10;
        }
        
        .content-card {
            background-color: white;
            border-radius: 0;
            border: 1px solid var(--border-color);
            padding: 3rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .store-title {
            color: <?= $text_color ?>;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }
        
        .store-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        .store-description {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
        }
        
        .btn-classic {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            border-radius: 0;
            padding: 0.8rem 2.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-classic:hover {
            background-color: #6b0000;
            border-color: #6b0000;
            color: white;
        }
        
        .contact-section {
            background-color: var(--light-color);
            border: 1px solid var(--border-color);
            padding: 3rem;
            margin-top: 4rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .contact-title {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }
        
        .contact-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 2px;
            background-color: var(--secondary-color);
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: white;
            color: var(--primary-color);
            border-radius: 50%;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }
        
        .social-icon:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        footer {
            padding: 2rem 0;
            color: #777;
            border-top: 1px solid var(--border-color);
            margin-top: 4rem;
            background-color: #f9f9f9;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #999;
        }
        
        /* Decorative elements */
        .decorative-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 2rem 0;
        }
        
        .decorative-line {
            height: 1px;
            width: 100px;
            background-color: var(--border-color);
        }
        
        .decorative-icon {
            margin: 0 1rem;
            color: var(--secondary-color);
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
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

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <?php if (!empty($banner)): ?>
        <img src="assets/uploads/<?= htmlspecialchars($banner) ?>" class="hero-image" alt="Store Banner">
    <?php else: ?>
        <img src="assets/uploads/classic.jpg" class="hero-image" alt="Store Banner">
    <?php endif; ?>
</section>

<!-- Content Section -->
<div class="container content-wrapper">
    <div class="content-card text-center">
        <h1 class="store-title"><?= htmlspecialchars($store_name ?? 'My Store') ?></h1>
        <p class="store-description"><?= htmlspecialchars($welcome_text ?? 'Welcome to our distinguished store. Discover our timeless collection of high-quality products.') ?></p>
        
        <div class="decorative-divider">
            <div class="decorative-line"></div>
            <div class="decorative-icon"><i class="fas fa-star"></i></div>
            <div class="decorative-line"></div>
        </div>
        
        <a href="#" class="btn btn-classic">View Collection</a>
    </div>
    
    <!-- Contact Section -->
    <div class="contact-section text-center">
        <h3 class="contact-title">Contact Us</h3>
        <p class="mb-4"><?= nl2br(htmlspecialchars($contact_info ?? 'No contact info provided')) ?></p>
        <div class="decorative-divider">
            <div class="decorative-line"></div>
            <div class="decorative-icon"><i class="fas fa-envelope"></i></div>
            <div class="decorative-line"></div>
        </div>
        <div class="social-links mt-4">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
        </div>
    </div>
</div>

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