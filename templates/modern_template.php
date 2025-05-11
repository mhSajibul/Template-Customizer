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
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/google-fonts/1.0.0/google-fonts.css">
    <style>
        :root {
            --primary-color: #3a86ff;
            --accent-color: #8338ec;
            --text-color: <?= $text_color ?? '#2b2d42' ?>;
            --light-bg: #f8f9fa;
            --dark-bg: #212529;
            --white: #ffffff;
            --transition: all 0.3s ease;
        }
        
        body {
            background-color: <?= $bg_color ?? 'var(--light-bg)' ?>;
            color: <?= $text_color ?? 'var(--text-color)' ?>;
            font-family: 'Inter', sans-serif;
            line-height: 1.7;
        }
        
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
        }
        
        .navbar.scrolled {
            padding: 0.7rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-color) !important;
            margin: 0 0.6rem;
            position: relative;
            transition: var(--transition);
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            bottom: -3px;
            left: 0;
            transition: var(--transition);
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .hero-section {
            padding-top: 7rem;
            position: relative;
            overflow: hidden;
        }
        
        .hero-image {
            width: 100%;
            height: 70vh;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .content-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 3rem;
            margin-top: -5rem;
            background: var(--white);
            position: relative;
            z-index: 10;
            transition: var(--transition);
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .store-title {
            font-weight: 800;
            background: linear-gradient(135deg, <?= $text_color ?? '#3a86ff' ?>);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }
        
        .store-tagline {
            font-weight: 400;
            color: #6c757d;
            margin-bottom: 2rem;
        }
        
        .contact-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 16px;
            padding: 3rem;
            color: var(--white);
            margin-top: 5rem;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .contact-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .btn-custom {
            background: var(--white);
            color: var(--primary-color);
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
        }
        
        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .social-icons a {
            margin: 0 10px;
            color: var(--white);
            font-size: 1.5rem;
            transition: var(--transition);
        }
        
        .social-icons a:hover {
            transform: translateY(-5px);
        }
        
        footer {
            padding: 3rem 0 2rem;
            color: #6c757d;
        }
        
        @media (max-width: 768px) {
            .hero-image {
                height: 50vh;
            }
            
            .content-card {
                margin-top: -3rem;
                padding: 2rem;
            }
            
            .contact-section {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#"><?= htmlspecialchars($store_name ?? 'My Store') ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
<section class="hero-section container">
    <?php if (!empty($banner)): ?>
        <img src="assets/uploads/<?= htmlspecialchars($banner) ?>" class="hero-image" alt="Store Banner">
    <?php else: ?>
        <img src="assets/uploads/modern.jpg" class="hero-image" alt="Store Banner">
    <?php endif; ?>
</section>

<!-- Main Content -->
<section class="container">
    <div class="content-card text-center">
        <h1 class="store-title display-4"><?= htmlspecialchars($store_name ?? 'My Store') ?></h1>
        <p class="store-tagline lead"><?= htmlspecialchars($welcome_text ?? 'Welcome to our amazing store! Discover unique products that match your style.') ?></p>
        <a href="#" class="btn btn-custom">Explore Products</a>
    </div>
</section>

<!-- Contact Section -->
<section class="container">
    <div class="contact-section text-center">
        <i class="fas fa-envelope contact-icon"></i>
        <h3 class="mb-4">Get In Touch</h3>
        <p class="mb-4"><?= nl2br(htmlspecialchars($contact_info ?? 'No contact info provided')) ?></p>
        <div class="social-icons mt-4">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($store_name ?? 'My Store') ?>. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>