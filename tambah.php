<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belleza Salon | Add New Queen</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            padding: 120px 0;
            min-height: 100vh;
            background: linear-gradient(rgba(255, 240, 245, 0.8), rgba(255, 240, 245, 0.8)), 
                        url('https://images.unsplash.com/photo-1560066984-138dadb4c035?q=80&w=2074&auto=format&fit=crop') center/cover fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-card {
            background: white;
            border-radius: 50px;
            padding: 60px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 30px 60px rgba(183, 110, 121, 0.15);
            border: 1px solid rgba(183, 110, 121, 0.1);
            text-align: center;
        }
        .form-card h2 {
            font-size: 2.5rem;
            color: var(--rose-gold);
            margin-bottom: 10px;
        }
        .subtitle {
            color: var(--text-muted);
            margin-bottom: 40px;
        }
        .form-group {
            text-align: left;
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--rose-gold);
            font-size: 0.9rem;
        }
        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid var(--bg-soft-pink);
            border-radius: 20px;
            font-family: inherit;
            transition: var(--transition);
            outline: none;
        }
        .form-group input:focus {
            border-color: var(--accent-pink);
            box-shadow: 0 0 0 4px rgba(255, 105, 180, 0.1);
        }
        .actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        .btn-back {
            flex: 1;
            padding: 15px;
            border-radius: 50px;
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 600;
            background: var(--bg-soft-pink);
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }
        .btn-back:hover {
            background: #ffe4ea;
        }
    </style>
</head>
<body>
    <nav>
        <div class="container">
            <a href="web.php" class="logo">Belleza Salon</a>
        </div>
    </nav>

    <div class="form-container">
        <div class="form-card">
            <h2>New Queen 👑</h2>
            <p class="subtitle">Welcome a new visitor to the sanctuary</p>
            
            <form method="POST">
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Full Name</label>
                    <input type="text" name="nama" placeholder="e.g. Hanny Amanda" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-phone"></i> Phone Number</label>
                    <input type="text" name="hp" placeholder="e.g. +62 812 3456 789">
                </div>
                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Email Address</label>
                    <input type="email" name="email" placeholder="e.g. queen@luxury.com">
                </div>
                
                <div class="actions">
                    <a href="index.php" class="btn-back">Cancel</a>
                    <button type="submit" name="submit" class="btn-primary" style="flex: 2;">Save Sanctuary Profile</button>
                </div>
            </form>

            <?php
            if(isset($_POST['submit'])){
                $nama = mysqli_real_escape_string($conn, $_POST['nama']);
                $hp = mysqli_real_escape_string($conn, $_POST['hp']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                
                $sql = "INSERT INTO Customer (Name, Phone, Email) VALUES ('$nama', '$hp', '$email')";
                if(mysqli_query($conn, $sql)){
                    echo "<script>window.location.href='index.php';</script>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>