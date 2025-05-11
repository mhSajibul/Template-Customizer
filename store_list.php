<?php
include 'header.php';

$sql = "SELECT store_id,  
               MAX(CASE WHEN field_name = 'store_name' THEN field_value END) AS store_name,
               MAX(CASE WHEN field_name = 'banner' THEN field_value END) AS banner
        FROM store_template_field_values
        GROUP BY store_id
        ORDER BY store_id DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Store Listing</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-hover: #3a56d4;
            --background: #f8f9fa;
            --card: #ffffff;
            --text: #333333;
            --text-light: #6c757d;
            --border: #e9ecef;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --radius: 12px;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--background);
            color: var(--text);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text);
            margin: 0;
        }
        
        .search-bar {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            background-color: var(--card);
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }
        
        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
            border-color: var(--primary);
        }
        
        .search-icon {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }
        
        .stores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        
        .store-card {
            background-color: var(--card);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
        }
        
        .store-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        .store-image {
            height: 140px;
            background: linear-gradient(135deg, #4361ee 0%, #805ad5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            overflow: hidden;
            position: relative;
        }
        
        .store-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        .store-icon {
            font-size: 3rem;
            color: white;
        }
        
        .store-content {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        
        .store-name {
            font-size: 1.125rem;
            font-weight: 600;
            margin: 0 0 0.5rem 0;
            color: var(--text);
        }
        
        .store-info {
            color: var(--text-light);
            font-size: 0.875rem;
            margin-bottom: 1rem;
            flex-grow: 1;
        }
        
        .store-actions {
            display: flex;
            gap: 0.75rem;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.875rem;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
            flex: 1;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
            width: 40px;
            padding: 0;
        }
        
        .btn-outline:hover {
            background-color: rgba(67, 97, 238, 0.1);
        }
        
        .empty-message {
            text-align: center;
            padding: 2rem;
            background-color: var(--card);
            border-radius: var(--radius);
            color: var(--text-light);
        }
        
        /* Navbar styles */
        .main-navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 0.5rem 0;
            height: 50px;
        }
        
        .navbar-container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 1rem;
            width: 100%;
            display: flex;
            align-items: center;
        }
        
        .navbar-nav {
            display: flex;
            flex-direction: row;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }
        
        .me-auto {
            margin-right: auto !important;
        }
        
        .nav-item {
            margin-right: 1rem;
        }
        
        .nav-link {
            color: #333;
            font-weight: 500;
            transition: color 0.2s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary);
            text: white;
        }
        
        .nav-link i {
            margin-right: 0.35rem;
            font-size: 0.9rem;
        }
        
        .fixed-top {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }
        
        /* Add padding to body to account for fixed navbar */
        body {
            padding-top: 50px;
        }

        @media (max-width: 768px) {
            .stores-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 576px) {
            .stores-grid {
                grid-template-columns: 1fr;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .navbar-nav {
                width: 100%;
                justify-content: space-between;
            }
            
            .nav-item {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <div class="page-header text-center">
        <div class="container">
            <h1>All Stores</h1>
        </div>
    </div>

    <div class="container">
        <div class="search-bar">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search stores...">
        </div>
        
        <?php if ($result->num_rows > 0): ?>
            <div class="stores-grid">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="store-card">
                        <div class="store-image">
                            <?php if (!empty($row['banner']) && file_exists("assets/uploads/" . $row['banner'])): ?>
                                <img src="assets/uploads/<?= htmlspecialchars($row['banner']) ?>" alt="<?= htmlspecialchars($row['store_name']) ?>">
                            <?php else: ?>
                                <div class="store-icon">
                                    <i class="fas fa-store"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="store-content">
                            <h3 class="store-name"><?= htmlspecialchars($row['store_name']) ?></h3>
                            <div class="store-info">
                                Store ID: <?= $row['store_id'] ?>
                            </div>
                            <div class="store-actions">
                                <a href="store.php?store_id=<?= $row['store_id'] ?>" class="btn btn-primary">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                                <a href="#" class="btn btn-outline">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="empty-message">
                <i class="fas fa-store-slash" style="font-size: 3rem; display: block; margin-bottom: 1rem; opacity: 0.6;"></i>
                <h3>No stores found</h3>
                <p>Start by adding your first store using the button above.</p>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search-input');
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const storeCards = document.querySelectorAll('.store-card');
                    
                    storeCards.forEach(card => {
                        const storeName = card.querySelector('.store-name').textContent.toLowerCase();
                        if (storeName.includes(searchTerm)) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>