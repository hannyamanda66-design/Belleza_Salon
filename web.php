<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belleza Salon | Premium Appointment Management</title>
    <meta name="description" content="Chic and elegant salon appointment booking system for the ultimate beauty experience.">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Login Overlay -->
    <div id="loginOverlay" class="login-overlay">
        <div class="login-card">
            <div class="login-left">
                <div class="quote-container">
                    <p class="quote">"True elegance is the only beauty that never fades"</p>
                </div>
            </div>
            <div class="login-right">
                <div class="login-form-container">
                    <h1>Hi Queen 👑</h1>
                    <p class="login-subtitle">Step into the world of luxury</p>
                    <form id="loginForm">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" id="loginEmail" placeholder="yourname@luxury.com" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="loginPassword" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn-primary" style="width: 100%; margin-top: 20px;">Step Into Luxury</button>
                    </form>
                    <p class="registration-text">Belum memiliki akun? Silakan buat akun Anda terlebih dahulu untuk menikmati layanan eksklusif kami.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Wrapper (Blurred by default) -->
    <div id="mainWrapper" class="blurred">

    <!-- Navigation -->
    <nav>
        <div class="container">
            <a href="#" class="logo">Belleza Salon</a>
            <ul class="nav-links">
                <li><a href="#services">Services</a></li>
                <li><a href="#stylists">Stylists</a></li>
                <li><a href="#dashboard">My Dashboard</a></li>
            </ul>
            <div class="nav-actions">
                <div class="cart-icon" id="cartToggle">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-count">0</span>
                </div>
                <div class="user-profile-nav" id="profileToggle">
                    <span id="navUserName">Guest</span>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1974&auto=format&fit=crop" alt="Profile" id="navUserImg">
                </div>
                <a href="#booking" class="btn-primary" id="bookNowBtn">Book Now</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <h1>Elevate Your Natural Beauty</h1>
            <p>Experience the perfect blend of luxury and expertise at Belleza Salon. Your journey to radiance begins here.</p>
            <a href="#services" class="btn-primary">Explore Services</a>
        </div>
    </header>
    <!-- Why Choose Belleza? -->
    <section class="features-section">
        <div class="container">
            <div class="section-header">
                <h2>Why Choose Belleza?</h2>
                <div class="underline"></div>
            </div>
            <div class="feature-grid">
                <div class="feature-card">
                    <span class="feature-icon">💎</span>
                    <h3>Premium Products</h3>
                    <p>We only use the finest international products to ensure your crown stays healthy and vibrant.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">✂️</span>
                    <h3>Expert Hands</h3>
                    <p>Our internationally certified stylists bring over 10 years of professional expertise to your unique look.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🍵</span>
                    <h3>Luxury Vibe</h3>
                    <p>Enjoy your treatments in a calm, fragrant, and luxurious environment designed for your ultimate comfort.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Overview -->
    <section class="stats-strip">
        <div class="container">
            <div class="stats-row">
                <div class="stat-item">
                    <span class="stat-number">1500+</span>
                    <span class="stat-label">Happy Queens</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">12+</span>
                    <span class="stat-label">Years Experience</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Beauty Experts</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">4.9</span>
                    <span class="stat-label">Star Ratings</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="testimonial-container">
                <div class="testimonial-left">
                    <h2 class="serif">Hear it from<br><span class=" Queens-text">Our Loyal Queens</span></h2>
                    <div class="quote-card">
                        <p class="quote-text">
                            "Every visit to Belleza feels like a luxury retreat. The attention to detail and professional care is unmatched. A diva deserves nothing but the best, and this is truly it!"
                        </p>
                        <div class="beyonce-profile">
                            <img src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?q=80&w=1964&auto=format&fit=crop" alt="Beyoncé" class="beyonce-img">
                            <div class="beyonce-info">
                                <h4>Beyoncé Knowles-Carter</h4>
                                <p>Global Music Icon & Regular Member</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-right">
                    <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?q=80&w=2074&auto=format&fit=crop" alt="Salon Interior 1" class="interior-img" style="width: 45%; height: 400px; object-fit: cover;">
                    <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?q=80&w=2070&auto=format&fit=crop" alt="Salon Interior 2" class="interior-img" style="width: 45%; height: 400px; object-fit: cover; margin-top: 60px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Service Menu -->
    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2>Digital Service Menu</h2>
                <p>Select from our curated range of premium treatments</p>
            </div>

            <!-- Tab Navigation -->
            <div class="tab-navigation">
                <button class="tab-btn active" data-tab="Hair" onclick="switchTab('Hair')">Hair Treatment</button>
                <button class="tab-btn" data-tab="Nails" onclick="switchTab('Nails')">Nails</button>
                <button class="tab-btn" data-tab="Eyelash" onclick="switchTab('Eyelash')">Eyelash</button>
            </div>

            <div class="service-grid" id="serviceGrid">
                <!-- Services will be injected by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Stylist Selection -->
    <section id="stylists">
        <div class="container">
            <div class="section-header">
                <h2>Meet Our Experts</h2>
                <p>Choose the stylist that matches your vision</p>
            </div>
            <div class="stylist-grid" id="stylistGrid">
                <!-- Stylists will be injected by JavaScript -->
            </div>
        </div>
    </section>

    <!-- User Dashboard (Premium) -->
    <section id="dashboard" class="bg-white">
        <div class="container">
            <div class="section-header">
                <h2>My Personal Dashboard</h2>
                <p>Your sanctuary for beauty management</p>
            </div>

            <!-- Stats Overview -->
            <div class="stats-overview">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-magic"></i></div>
                    <div class="stat-info">
                        <h4>12</h4>
                        <p>Total Treatments</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-gem"></i></div>
                    <div class="stat-info">
                        <h4>450 Pts</h4>
                        <p>Loyalty Points</p>
                    </div>
                </div>
                <div class="stat-card gold">
                    <div class="stat-icon"><i class="fas fa-crown"></i></div>
                    <div class="stat-info">
                        <h4>Gold Tier</h4>
                        <p>Membership Status</p>
                    </div>
                </div>
            </div>

            <div class="dashboard-grid">
                <!-- Main Area -->
                <div class="dashboard-main">
                    <!-- Profile Header Card -->
                    <div class="profile-header-card">
                        <div class="interactive-avatar" id="avatarClick">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1974&auto=format&fit=crop" alt="Profile" id="dashboardUserImg">
                            <div class="camera-btn"><i class="fas fa-camera"></i></div>
                            <input type="file" id="profileUpload" hidden accept="image/*">
                        </div>
                        <div class="profile-info-main">
                            <h3>Hanny Amanda <span class="verified-badge"><i class="fas fa-check-circle"></i> Verified</span></h3>
                            <p class="user-meta"><i class="fas fa-envelope"></i> hanny@example.com | <i class="fas fa-phone"></i> +62 812-3456-7890</p>
                        </div>
                    </div>

                    <!-- Upcoming Appointment Card -->
                    <div class="upcoming-appointment-section">
                        <h4 class="section-subtitle">Upcoming Appointment</h4>
                        <div class="appointment-card-premium">
                            <div class="appointment-stylist-img">
                                <img src="images/clara.jpg" alt="Clara Rose">
                            </div>
                            <div class="appointment-details">
                                <div class="service-name">Keratin Hair Treatment</div>
                                <div class="stylist-name">with Clara Rose</div>
                                <div class="appointment-time-meta">
                                    <span><i class="far fa-calendar-alt"></i> May 15, 2024</span>
                                    <span><i class="far fa-clock"></i> 10:30 AM</span>
                                </div>
                            </div>
                            <div class="appointment-actions">
                                <button class="btn-reschedule">Reschedule</button>
                                <span class="btn-cancel">Cancel Appointment</span>
                            </div>
                        </div>
                        <div id="appointmentList">
                            <!-- Dynamic bookings will appear here -->
                        </div>
                    </div>
                </div>

                <!-- Sidebar Actions -->
                <div class="dashboard-sidebar">
                    <h4 class="section-subtitle">Quick Actions</h4>
                    <div class="quick-action-btns">
                        <a href="#services" class="action-btn">
                            <i class="fas fa-calendar-plus"></i> Book New Service
                        </a>
                        <button class="action-btn" id="historyBtn">
                            <i class="fas fa-history"></i> Transaction History
                        </button>
                        <a href="https://wa.me/6282210767368?text=Hi%20Lily,%20I%20need%20help%20with%20my%20Belleza%20booking" target="_blank" class="action-btn" id="helpCenterBtn">
                            <i class="fab fa-whatsapp"></i> Help Center (Lily)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stylist Confirmation Modal -->
    <div class="modal" id="stylistConfirmModal">
        <div class="modal-content" style="max-width: 400px; text-align: center; border-radius: 40px; padding: 40px;">
            <div style="font-size: 3rem; margin-bottom: 20px;">👑</div>
            <h3 class="serif" style="color: var(--rose-gold); margin-bottom: 15px;">Confirm Your Expert</h3>
            <p id="stylistConfirmText" style="color: var(--text-muted); line-height: 1.6; margin-bottom: 30px;">You have selected Clara Rose to handle your treatment. Ready to set your schedule?</p>
            <div style="display: flex; gap: 15px;">
                <button class="btn-secondary" id="changeStylistBtn" style="flex: 1; border-radius: 15px;">Change</button>
                <button class="btn-primary" id="confirmPayBtn" style="flex: 1; border-radius: 15px;">Confirm & Pay</button>
            </div>
        </div>
    </div>

    <!-- Schedule Selection Modal -->
    <div class="modal" id="scheduleModal">
        <div class="modal-content" style="max-width: 450px; border-radius: 40px; padding: 40px;">
            <h3 class="serif" style="color: var(--rose-gold); margin-bottom: 20px; text-align: center;">Set Your Sanctuary Time</h3>
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:10px; font-weight:600; color:var(--text-muted);">Select Date</label>
                <input type="date" id="bookingDateInput" style="width:100%; padding:15px; border-radius:15px; border:1px solid var(--primary-pink); font-family:inherit;">
            </div>
            <div style="margin-bottom: 30px;">
                <label style="display:block; margin-bottom:10px; font-weight:600; color:var(--text-muted);">Select Hour</label>
                <select id="bookingTimeInput" style="width:100%; padding:15px; border-radius:15px; border:1px solid var(--primary-pink); font-family:inherit;">
                    <option value="09:00 AM">09:00 AM</option>
                    <option value="10:30 AM">10:30 AM</option>
                    <option value="01:00 PM">01:00 PM</option>
                    <option value="02:30 PM">02:30 PM</option>
                    <option value="04:00 PM">04:00 PM</option>
                </select>
            </div>
            <button class="btn-primary" id="confirmScheduleBtn" style="width: 100%;">Confirm Schedule</button>
        </div>
    </div>

    <!-- Digital Invoice Modal -->
    <div class="modal" id="invoiceModal">
        <div class="modal-content invoice-container printable-area">
            <div class="invoice-header">
                <div class="invoice-brand">
                    <h2 class="serif">Belleza Salon</h2>
                    <p>Queen's Sanctuary & Spa</p>
                </div>
                <div class="invoice-meta">
                    <h3 id="invoiceNumber">#BLZ-2026001</h3>
                    <p id="invoiceDate">May 06, 2026</p>
                </div>
            </div>

            <div class="invoice-body">
                <h4 class="serif invoice-title">Digital Payment Invoice</h4>
                <div class="invoice-info-grid">
                    <div id="invoiceAttendedBy"><strong>Expert:</strong> Clara Rose</div>
                    <div id="invoiceSchedule"><strong>Schedule:</strong> 06 May 2026, 10:30 AM</div>
                </div>
                <table class="invoice-table">
                    <thead>
                        <tr>
                            <th>Service Description</th>
                            <th>Duration</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="invoiceItems"></tbody>
                </table>

                <div class="invoice-summary">
                    <div class="summary-row total">
                        <span>Grand Total</span>
                        <span id="invoiceTotal">$0.00</span>
                    </div>
                </div>

                <div class="payment-selection-section no-print">
                    <h4 class="serif" style="margin-bottom: 15px; color: var(--rose-gold);">Select Payment Method</h4>
                    <div class="payment-methods-grid">
                        <div class="payment-method-card active" data-method="BCA">
                            <i class="fas fa-university"></i>
                            <span>BCA VA</span>
                        </div>
                        <div class="payment-method-card" data-method="Mandiri">
                            <i class="fas fa-landmark"></i>
                            <span>Mandiri VA</span>
                        </div>
                        <div class="payment-method-card" data-method="Tunai">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Tunai</span>
                        </div>
                        <div class="payment-method-card" data-method="QRIS">
                            <i class="fas fa-qrcode"></i>
                            <span>QRIS</span>
                        </div>
                    </div>
                    <div class="payment-detail-box">
                        <p id="paymentDetailText">VA Number: 8830 0822 1076 7368</p>
                    </div>
                </div>
            </div>

            <div class="invoice-footer no-print">
                <button class="btn-secondary" onclick="window.print()"><i class="fas fa-print"></i> Print Receipt</button>
                <button class="btn-primary" id="iHavePaidBtn">I Have Paid</button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal" id="successModal">
        <div class="modal-content" style="max-width: 500px; text-align: center; border-radius: 40px; padding: 60px; position: relative;">
            <i class="fas fa-times" onclick="document.getElementById('successModal').classList.remove('active')" style="position: absolute; top: 30px; right: 30px; cursor: pointer; color: var(--text-muted); font-size: 1.2rem;"></i>
            <div class="success-checkmark">
                <div class="check-icon">
                    <span class="icon-line line-tip"></span>
                    <span class="icon-line line-long"></span>
                    <div class="icon-circle"></div>
                    <div class="icon-fix"></div>
                </div>
            </div>
            <h2 class="serif" style="color: var(--rose-gold); margin: 30px 0 15px;">Payment Successful! 👑</h2>
            <p id="successMessage" style="color: var(--text-muted); line-height: 1.6; margin-bottom: 40px;"></p>
            <button class="btn-primary" onclick="document.getElementById('successModal').classList.remove('active')" style="width: 100%;">Back to Sanctuary</button>
        </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal" id="bookingModal">
        <div class="modal-content">
            <i class="fas fa-times close-modal" id="closeModal"></i>
            <h2 style="color: var(--rose-gold); margin-bottom: 30px;">Book Your Appointment</h2>
            
            <div class="booking-steps">
                <div class="step-indicator active"></div>
                <div class="step-indicator"></div>
                <div class="step-indicator"></div>
            </div>

            <form id="bookingForm">
                <div id="step1">
                    <div class="form-group">
                        <label>Select Date</label>
                        <input type="date" id="bookDate" required>
                    </div>
                    <div class="form-group">
                        <label>Available Time Slots</label>
                        <div class="time-slots" id="timeSlots">
                            <div class="time-slot" data-time="09:00">09:00 AM</div>
                            <div class="time-slot" data-time="10:30">10:30 AM</div>
                            <div class="time-slot" data-time="13:00">01:00 PM</div>
                            <div class="time-slot" data-time="14:30">02:30 PM</div>
                            <div class="time-slot" data-time="16:00">04:00 PM</div>
                        </div>
                    </div>
                    <button type="button" class="btn-primary" id="nextToStylist" style="width: 100%;">Next: Choose Stylist</button>
                </div>

                <div id="step2" style="display: none;">
                    <div class="form-group">
                        <label>Select Stylist</label>
                        <select id="stylistSelect" required>
                            <option value="">Choose a stylist...</option>
                        </select>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="button" class="btn-primary" id="backToDate" style="flex: 1; background: var(--secondary-pink);">Back</button>
                        <button type="button" class="btn-primary" id="nextToPayment" style="flex: 1;">Next: Review & Payment</button>
                    </div>
                </div>

                <div id="step3" style="display: none;">
                    <div style="background: var(--bg-soft-pink); padding: 20px; border-radius: 16px; margin-bottom: 20px;">
                        <h4 style="margin-bottom: 10px;">Booking Summary</h4>
                        <div id="bookingSummary"></div>
                    </div>
                    <div class="form-group">
                        <label>Payment Method</label>
                        <select id="paymentMethod">
                            <option value="Cash">Cash</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="E-wallet">E-wallet (OVO/GoPay)</option>
                        </select>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="button" class="btn-primary" id="backToStylist" style="flex: 1; background: var(--secondary-pink);">Back</button>
                        <button type="submit" class="btn-primary" style="flex: 1;">Confirm Booking</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Cart Sidebar -->
    <div class="cart-panel" id="cartPanel">
        <div class="cart-header">
            <h2 style="color: var(--rose-gold);">Your Cart</h2>
            <i class="fas fa-times" id="closeCart" style="cursor: pointer;"></i>
        </div>
        <div class="cart-items" id="cartItems">
            <!-- Items like APPOINTMENT_SERVICE mapping -->
        </div>
        <div class="cart-footer">
            <div class="total-row">
                <span>Total</span>
                <span id="cartTotal">$0.00</span>
            </div>
            <button class="btn-primary" id="checkoutBtn" style="width: 100%;">Proceed to Checkout</button>
        </div>
    </div>

    </div> <!-- End Main Wrapper -->
    <script src="app.js"></script>
</body>
</html>
