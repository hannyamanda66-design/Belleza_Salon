<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belleza Salon | Customer Management</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-container {
            padding: 120px 0 60px;
            min-height: 100vh;
            background: linear-gradient(rgba(255, 240, 245, 0.8), rgba(255, 240, 245, 0.8)), 
                        url('https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?q=80&w=2070&auto=format&fit=crop') center/cover fixed;
        }
        .management-card {
            background: white;
            border-radius: 50px;
            padding: 50px;
            box-shadow: 0 30px 60px rgba(183, 110, 121, 0.15);
            border: 1px solid rgba(183, 110, 121, 0.1);
        }
        .management-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }
        .management-header h1 {
            font-size: 2.5rem;
            color: var(--rose-gold);
            margin: 0;
        }
        .customer-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }
        .customer-table th {
            text-align: left;
            padding: 15px 25px;
            color: var(--text-muted);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
        }
        .customer-table tr td {
            background: var(--bg-soft-pink);
            padding: 20px 25px;
            color: var(--text-main);
            transition: var(--transition);
        }
        .customer-table tr td:first-child {
            border-radius: 20px 0 0 20px;
            font-weight: 700;
            color: var(--rose-gold);
        }
        .customer-table tr td:last-child {
            border-radius: 0 20px 20px 0;
        }
        .customer-table tr:hover td {
            background: #ffe4ea;
            transform: scale(1.01);
        }
        .btn-delete-luxury {
            color: #ff7675;
            background: white;
            padding: 8px 15px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid #ff7675;
            transition: var(--transition);
        }
        .btn-delete-luxury:hover {
            background: #ff7675;
            color: white;
        }
        .id-badge {
            background: var(--accent-pink);
            color: white;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 0.75rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="container">
            <a href="web.php" class="logo">Belleza Salon</a>
            <ul class="nav-links">
                <li><a href="web.php#services">Services</a></li>
                <li><a href="web.php#stylists">Stylists</a></li>
                <li><a href="index.php" style="color: var(--accent-pink);">Customers</a></li>
            </ul>
            <div class="nav-actions">
                <a href="web.php#booking" class="btn-primary">Go to Website</a>
            </div>
        </div>
    </nav>

    <div class="admin-container">
        <div class="container">
            <div class="management-card">
                <div class="management-header">
                    <div>
                        <h1>Queen's Customer List 👑</h1>
                        <p style="color: var(--text-muted); margin-top: 5px;">Manage your loyal sanctuary visitors</p>
                    </div>
                    <a href="tambah.php" class="btn-primary">
                        <i class="fas fa-plus"></i> Add New Queen
                    </a>
                </div>
                
                <div style="overflow-x: auto;">
                    <table class="customer-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Email Sanctuary</th>
                                <th style="text-align: right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM Customer ORDER BY CustomerID DESC");
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_array($query)) {
                                    echo "<tr>";
                                    echo "<td><span class='id-badge'>#".$row['CustomerID']."</span></td>";
                                    echo "<td style='font-weight: 600;'>".$row['Name']."</td>";
                                    echo "<td><i class='fas fa-phone' style='font-size: 0.8rem; color: var(--accent-pink); margin-right: 8px;'></i>".$row['Phone']."</td>";
                                    echo "<td><i class='fas fa-envelope' style='font-size: 0.8rem; color: var(--accent-pink); margin-right: 8px;'></i>".$row['Email']."</td>";
                                    echo "<td style='text-align: right;'>
                                            <a href='hapus.php?id=".$row['CustomerID']."' class='btn-delete-luxury' onclick='return confirm(\"Are you sure you want to remove this Queen from the sanctuary?\")'>
                                                <i class='fas fa-trash-alt'></i> Remove
                                            </a>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' style='text-align: center; padding: 40px; color: var(--text-muted);'>No Queens have joined the sanctuary yet.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple scroll effect for navbar
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.style.padding = '0.8rem 0';
                nav.style.boxShadow = '0 10px 30px rgba(0,0,0,0.05)';
            } else {
                nav.style.padding = '1.2rem 0';
                nav.style.boxShadow = 'none';
            }
        });
    </script>
</body>
</html>

