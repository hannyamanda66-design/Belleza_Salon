const services = [
    // Hair Treatment
    { id: 1, name: "Haircut", category: "Hair", price: 25, time: "45 mins", image: "images/haircut.jpg", description: "Professional cut and style with modern techniques." },
    { id: 2, name: "Hair Spa", category: "Hair", price: 40, time: "60 mins", image: "images/hairspa.jpg", description: "Deep conditioning treatment for healthy, shiny hair." },
    { id: 3, name: "Smoothing", category: "Hair", price: 80, time: "120 mins", image: "images/smoothing.jpg", description: "Advanced silk-smooth treatment for frizz-free hair." },
    { id: 4, name: "Coloring", category: "Hair", price: 65, time: "90 mins", image: "images/coloring.jpg", description: "Vibrant, long-lasting color tailored to your tone." },
    { id: 5, name: "Keratin Treatment", category: "Hair", price: 120, time: "180 mins", image: "images/keratin.jpg", description: "Premium protein infusion for strength and shine." },
    
    // Nails
    { id: 6, name: "Manicure", category: "Nails", price: 20, time: "30 mins", image: "https://images.unsplash.com/photo-1632345031435-8727f6897d53?q=80&w=2070&auto=format&fit=crop", description: "Elegant nail shaping and premium polish." },
    { id: 7, name: "Pedicure", category: "Nails", price: 25, time: "45 mins", image: "images/pedicure.jpg", description: "Relaxing spa treatment for your feet." },
    { id: 8, name: "Gel Polish", category: "Nails", price: 30, time: "60 mins", image: "https://images.unsplash.com/photo-1604654894610-df63bc536371?q=80&w=1974&auto=format&fit=crop", description: "High-gloss, chip-resistant gel finish." },
    { id: 9, name: "Nail Art", category: "Nails", price: 45, time: "90 mins", image: "images/nail_art.jpg", description: "Creative hand-painted designs by our artists." },
    { id: 10, name: "Acrylic Extension", category: "Nails", price: 55, time: "120 mins", image: "images/acrylic.jpg", description: "Strong, beautiful extensions for any look." },

    // Eyelash
    { id: 11, name: "Classic Lash", category: "Eyelash", price: 50, time: "90 mins", image: "images/classic_lash.jpg", description: "Natural-looking 1:1 lash enhancements." },
    { id: 12, name: "Volume Lash", category: "Eyelash", price: 75, time: "120 mins", image: "images/volume_lash.jpg", description: "Full, dramatic volume for a bold look." },
    { id: 13, name: "Lash Lift", category: "Eyelash", price: 45, time: "60 mins", image: "images/lash_lift.jpg", description: "Perfect curl for your natural lashes." },
    { id: 14, name: "Eyelash Removal", category: "Eyelash", price: 15, time: "30 mins", image: "images/lash_removal.jpg", description: "Safe and gentle removal of extensions." },
    { id: 15, name: "Eyebrow Threading", category: "Eyelash", price: 10, time: "20 mins", image: "images/threading.jpg", description: "Precise shaping for the perfect arch." },
];

const stylists = [
    { id: 1, name: "Clara Rose", specialty: "Hair Specialist", experience: "8 years", rating: 4.9, image: "images/clara.jpg" },
    { id: 2, name: "Sophia Blush", specialty: "Nail Artist", experience: "5 years", rating: 4.8, image: "images/sophia.jpg" },
    { id: 3, name: "Isabella Gold", specialty: "Skin Expert", experience: "10 years", rating: 5.0, image: "images/isabella.jpg" }
];

// Mock User Database
const users = [
    { 
        email: "hanny@example.com", 
        password: "password123", 
        name: "Hanny Amanda", 
        status: "Gold Member", 
        phone: "+62 812-3456-7890", 
        image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1974&auto=format&fit=crop" 
    }
];

// Mock Transaction Data
const transactions = [
    { service: "Hair Spa & Blowout", date: "April 28, 2024", amount: "$40", status: "Paid" },
    { service: "Gel Manicure", date: "April 15, 2024", amount: "$30", status: "Paid" },
    { service: "Eyelash Extension Volume", date: "May 02, 2024", amount: "$75", status: "Pending" }
];

// State Management
let currentUser = users[0];
let cart = [];
let activeTab = 'Hair';
let selectedStylist = null; 
let bookingDetails = {
    date: '',
    time: '',
    paymentMethod: 'BCA'
};
let bookingState = {
    date: '',
    time: '',
    stylistId: null,
    services: []
};

// DOM Elements
const serviceGrid = document.getElementById('serviceGrid');
const stylistGrid = document.getElementById('stylistGrid');
const cartItems = document.getElementById('cartItems');
const cartCount = document.querySelector('.cart-count');
const cartTotal = document.getElementById('cartTotal');
const bookingModal = document.getElementById('bookingModal');
const loginOverlay = document.getElementById('loginOverlay');
const mainWrapper = document.getElementById('mainWrapper');
const loginForm = document.getElementById('loginForm');
const bookingForm = document.getElementById('bookingForm');
const stylistSelect = document.getElementById('stylistSelect');
const historyModal = document.getElementById('historyModal');
const paymentList = document.getElementById('paymentList');
const stylistConfirmModal = document.getElementById('stylistConfirmModal');
const stylistConfirmText = document.getElementById('stylistConfirmText');
const scheduleModal = document.getElementById('scheduleModal');
const successModal = document.getElementById('successModal');

// Initialize
function init() {
    checkAuthState();
    renderServices();
    renderStylists();
    setupEventListeners();
    updateCart();
    renderTransactions();
}

function renderTransactions() {
    if (!paymentList) return;
    paymentList.innerHTML = transactions.map(t => `
        <div class="history-item">
            <div class="history-item-info">
                <h4>${t.service}</h4>
                <p><i class="far fa-calendar-alt"></i> ${t.date} • <strong>${t.amount}</strong></p>
            </div>
            <span class="history-status status-${t.status.toLowerCase()}">${t.status}</span>
        </div>
    `).join('');
}

// Reschedule & Cancel Logic
function handleReschedule() {
    // For simplicity in this demo, rescheduling uses the same schedule modal
    scheduleModal.classList.add('active');
    
    // Override the confirm button behavior for reschedule
    const originalConfirm = document.getElementById('confirmScheduleBtn').onclick;
    document.getElementById('confirmScheduleBtn').onclick = () => {
        const dateInput = document.getElementById('bookingDateInput').value;
        const timeInput = document.getElementById('bookingTimeInput').value;
        
        if (!dateInput) {
            alert("Please select a date, Queen! 📅");
            return;
        }

        // Update the dashboard UI
        const dateMeta = document.querySelector('.appointment-time-meta span:first-child');
        const timeMeta = document.querySelector('.appointment-time-meta span:last-child');
        if (dateMeta) dateMeta.innerHTML = `<i class="far fa-calendar-alt"></i> ${dateInput}`;
        if (timeMeta) timeMeta.innerHTML = `<i class="far fa-clock"></i> ${timeInput}`;

        alert("Your appointment has been successfully rescheduled! ✨");
        scheduleModal.classList.remove('active');
        
        // Restore original behavior
        document.getElementById('confirmScheduleBtn').onclick = originalConfirm;
    };
}

function handleCancel() {
    const confirmCancel = confirm("Are you sure you want to cancel your appointment? This action cannot be undone.");
    if (confirmCancel) {
        const appointmentCard = document.querySelector('.appointment-card-premium');
        if (appointmentCard) {
            appointmentCard.style.opacity = '0';
            appointmentCard.style.transform = 'scale(0.9)';
            setTimeout(() => {
                appointmentCard.remove();
                const list = document.getElementById('appointmentList');
                if (list) list.innerHTML = '<p style="color: var(--text-muted); font-style: italic; text-align: center; padding: 20px;">No upcoming appointments. Ready for a new treatment? 👑</p>';
            }, 400);
        }
        alert("Your appointment has been cancelled successfully.");
    }
}

function checkAuthState() {
    const savedUser = localStorage.getItem('bellezaUser');
    if (savedUser) {
        currentUser = JSON.parse(savedUser);
        updateProfileUI();
    }
    // Strictly show the login gate on every refresh as per instructions
    lockApp();
}

function lockApp() {
    loginOverlay.classList.remove('hidden');
    loginOverlay.style.display = 'flex';
    mainWrapper.classList.add('blurred');
}

function unlockApp() {
    loginOverlay.classList.add('hidden');
    setTimeout(() => {
        loginOverlay.style.display = 'none';
    }, 800);
    mainWrapper.classList.remove('blurred');
    updateProfileUI();
}

function updateProfileUI() {
    if (!currentUser) return;
    
    // Navbar Identity (Indicator Only)
    const nameEl = document.getElementById('navUserName');
    if (nameEl) nameEl.innerText = currentUser.name.split(' ')[0];
    
    const imgEl = document.getElementById('navUserImg');
    if (imgEl) imgEl.src = currentUser.image;
    
    // Premium Dashboard Sync
    const dashboardName = document.querySelector('.profile-info-main h3');
    if (dashboardName) {
        dashboardName.innerHTML = `${currentUser.name} <span class="verified-badge"><i class="fas fa-check-circle"></i> Verified</span>`;
    }
    
    const dashboardImg = document.getElementById('dashboardUserImg');
    if (dashboardImg) dashboardImg.src = currentUser.image;
    
    const metaEl = document.querySelector('.user-meta');
    if (metaEl) {
        metaEl.innerHTML = `<i class="fas fa-envelope"></i> ${currentUser.email} | <i class="fas fa-phone"></i> ${currentUser.phone}`;
    }
}

// Interactive Avatar Logic
document.addEventListener('click', (e) => {
    if (e.target.closest('#avatarClick')) {
        document.getElementById('profileUpload').click();
    }
});

document.addEventListener('change', (e) => {
    if (e.target.id === 'profileUpload') {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const newImg = event.target.result;
                currentUser.image = newImg;
                localStorage.setItem('bellezaUser', JSON.stringify(currentUser));
                updateProfileUI();
                alert("Profile photo updated instantly! ✨");
            };
            reader.readAsDataURL(file);
        }
    }
});

// Auth Handlers
loginForm.onsubmit = (e) => {
    e.preventDefault();
    const email = document.getElementById('loginEmail').value;
    const pass = document.getElementById('loginPassword').value;
    
    // Check if user exists in mock database
    let user = users.find(u => u.email === email && u.password === pass);
    
    // Universal access: if not in database, create a temporary "Queen" profile
    if (!user) {
        user = {
            email: email,
            password: pass,
            name: email.split('@')[0].charAt(0).toUpperCase() + email.split('@')[0].slice(1), // Capitalize name from email
            status: "New Member",
            phone: "+62 ---",
            image: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1976&auto=format&fit=crop"
        };
    }
    
    currentUser = user;
    localStorage.setItem('bellezaUser', JSON.stringify(user));
    unlockApp();
};

// Render Services
function renderServices() {
    const filteredServices = services.filter(s => s.category === activeTab);
    
    serviceGrid.innerHTML = filteredServices.map(service => {
        let specialtyTag = "";
        if (service.category === "Hair") specialtyTag = "Hair Specialist Available";
        if (service.category === "Nails") specialtyTag = "Nail Artist Available";
        if (service.category === "Eyelash") specialtyTag = "Lash Expert Available";

        return `
            <div class="service-card vertical">
                <div class="service-image-container">
                    <img src="${service.image}" alt="${service.name}" class="service-image-card">
                    <div class="stylist-tag overlay">${specialtyTag}</div>
                    <div class="wishlist-btn"><i class="far fa-heart"></i></div>
                </div>
                <div class="card-content">
                    <h3>${service.name}</h3>
                    <p class="service-info">${service.description}</p>
                    <div class="service-meta-main">
                        <span class="price">$${service.price}</span>
                        <span class="duration"><i class="far fa-clock"></i> ${service.time}</span>
                    </div>
                </div>
                <button class="btn-primary hot-pink" style="width: 100%;" onclick="addToCart(${service.id})">Book Now</button>
            </div>
        `;
    }).join('');
}

function switchTab(tab) {
    activeTab = tab;
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.toggle('active', btn.dataset.tab === tab);
    });
    renderServices();
}

function renderStylists() {
    stylistGrid.innerHTML = stylists.map(stylist => `
        <div class="stylist-card" id="stylist-card-${stylist.id}">
            <img src="${stylist.image}" alt="${stylist.name}" class="stylist-image">
            <h3>${stylist.name}</h3>
            <div class="stylist-specialty">${stylist.specialty}</div>
            <div class="stylist-meta">
                <span><i class="fas fa-history"></i> ${stylist.experience}</span>
                <span class="rating"><i class="fas fa-star"></i> ${stylist.rating}</span>
            </div>
            <button class="btn-primary" style="padding: 8px 20px;" onclick="handleStylistSelection(${stylist.id})">Select Expert</button>
        </div>
    `).join('');

    stylistSelect.innerHTML = '<option value="">Choose a stylist...</option>' + 
        stylists.map(s => `<option value="${s.id}">${s.name} - ${s.specialty}</option>`).join('');
}

// Checkout Flow
function handleCheckout() {
    if (cart.length === 0) {
        alert("Your cart is empty, Queen! 👑");
        return;
    }

    // Scroll to Experts Section
    document.getElementById('cartPanel').classList.remove('active');
    document.getElementById('stylists').scrollIntoView({ behavior: 'smooth' });
    alert("Please select your expert stylist to continue to scheduling. ✨");
}

// Stylist Selection & Confirmation Logic
function handleStylistSelection(id) {
    const stylist = stylists.find(s => s.id === id);
    if (!stylist) return;

    selectedStylist = stylist;

    // Visual Feedback (Active State)
    document.querySelectorAll('.stylist-card').forEach(card => card.classList.remove('active'));
    document.getElementById(`stylist-card-${id}`).classList.add('active');

    // Show Confirmation Modal
    stylistConfirmText.innerText = `You have selected ${stylist.name} to handle your treatment. Ready to set your schedule?`;
    stylistConfirmModal.classList.add('active');
}

// Schedule Logic
function handleScheduleConfirmation() {
    const dateInput = document.getElementById('bookingDateInput').value;
    const timeInput = document.getElementById('bookingTimeInput').value;

    if (!dateInput) {
        alert("Please select a date for your sanctuary visit, Queen! 📅");
        return;
    }

    bookingDetails.date = dateInput;
    bookingDetails.time = timeInput;

    stylistConfirmModal.classList.remove('active'); // Close previous if open
    scheduleModal.classList.remove('active');
    renderInvoice();
}

// Invoice Logic
function renderInvoice() {
    const subtotal = cart.reduce((sum, item) => sum + item.price, 0);
    const tax = subtotal * 0.1;
    const total = subtotal + tax;

    // Set Meta Data
    const now = new Date();
    document.getElementById('invoiceDate').innerText = now.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
    document.getElementById('invoiceNumber').innerText = `#BLZ-${now.getFullYear()}${Math.floor(Math.random() * 1000).toString().padStart(3, '0')}`;
    
    // Set Info Grid
    document.getElementById('invoiceAttendedBy').innerHTML = `<strong>Expert:</strong> ${selectedStylist.name}`;
    document.getElementById('invoiceSchedule').innerHTML = `<strong>Schedule:</strong> ${bookingDetails.date}, ${bookingDetails.time}`;

    // Render Items
    const invoiceItems = document.getElementById('invoiceItems');
    invoiceItems.innerHTML = cart.map(item => `
        <tr>
            <td>${item.name}</td>
            <td>${item.time}</td>
            <td>$${item.price.toFixed(2)}</td>
        </tr>
    `).join('');

    document.getElementById('invoiceTotal').innerText = `$${total.toFixed(2)}`;

    // Show Invoice Modal
    document.getElementById('invoiceModal').classList.add('active');
}

// Payment Selection Logic
function setupPaymentSelection() {
    const cards = document.querySelectorAll('.payment-method-card');
    const detailText = document.getElementById('paymentDetailText');

    cards.forEach(card => {
        card.onclick = function() {
            cards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            const method = this.dataset.method;
            bookingDetails.paymentMethod = method;

            if (method === 'BCA') detailText.innerText = "VA Number: 8830 0822 1076 7368";
            else if (method === 'Mandiri') detailText.innerText = "VA Number: 7000 0812 3456 7890";
            else if (method === 'Tunai') detailText.innerText = "Please pay at the front desk upon arrival.";
            else if (method === 'QRIS') detailText.innerHTML = "Scan QRIS below:<br><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=BellezaSalon' style='margin-top:10px; border-radius:10px;'>";
        };
    });
}

// --- GLOBAL INITIALIZATION ---
function init() {
    checkAuthState();
    renderServices();
    renderStylists();
    setupEventListeners();
    updateCart(); // Ensure badge is sync on load
    renderTransactions();
}

// --- CORE FUNCTIONS (FULLY RESTORED & TESTED) ---

function addToCart(serviceId) {
    const service = services.find(s => s.id === serviceId);
    if (service) {
        cart.push(service);
        updateCart();
        // Visual feedback: slide in the cart
        document.getElementById('cartPanel').classList.add('active');
    }
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
}

function updateCart() {
    const cartCountEl = document.querySelector('.cart-count');
    const cartItemsEl = document.getElementById('cartItems');
    const cartTotalEl = document.getElementById('cartTotal');

    if (cartCountEl) {
        cartCountEl.innerText = cart.length;
        cartCountEl.style.display = cart.length > 0 ? 'flex' : 'none';
    }
    
    if (!cartItemsEl) return;

    if (cart.length === 0) {
        cartItemsEl.innerHTML = '<p style="text-align: center; color: var(--text-muted); margin-top: 20px;">Your cart is empty, Queen. 👑</p>';
        if (cartTotalEl) cartTotalEl.innerText = '$0.00';
    } else {
        cartItemsEl.innerHTML = cart.map((item, index) => `
            <div class="cart-item">
                <div class="cart-item-info">
                    <h4>${item.name}</h4>
                    <p>${item.category} • ${item.time}</p>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span style="font-weight: 600; color: var(--rose-gold);">$${item.price}</span>
                    <i class="fas fa-trash" style="color: #ff7675; cursor: pointer;" onclick="removeFromCart(${index})"></i>
                </div>
            </div>
        `).join('');
        
        const total = cart.reduce((sum, item) => sum + item.price, 0);
        if (cartTotalEl) cartTotalEl.innerText = `$${total.toFixed(2)}`;
    }
}

// --- FLOW HANDLERS ---

function handleScheduleConfirmation() {
    const dateInput = document.getElementById('bookingDateInput').value;
    const timeInput = document.getElementById('bookingTimeInput').value;

    if (!dateInput || !timeInput) {
        alert("Please select both Date and Time for your sanctuary visit, Queen! 📅");
        return;
    }

    // Format date for invoice (e.g., 15 May 2024)
    const dateObj = new Date(dateInput);
    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    bookingDetails.date = dateObj.toLocaleDateString('en-US', options);
    bookingDetails.time = timeInput;

    scheduleModal.classList.remove('active');
    renderInvoice();
}

function handlePaymentSuccess() {
    document.getElementById('invoiceModal').classList.remove('active');
    
    const appointmentList = document.getElementById('appointmentList');
    if (appointmentList) {
        if (appointmentList.innerHTML.includes('No upcoming')) appointmentList.innerHTML = '';
        
        const bookingId = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
        const newCard = document.createElement('div');
        newCard.className = 'appointment-card-premium';
        newCard.style.marginTop = '15px';
        newCard.innerHTML = `
            <div class="appointment-stylist-img">
                <img src="${selectedStylist.image}" alt="${selectedStylist.name}">
            </div>
            <div class="appointment-details">
                <div class="service-name">${cart.map(i => i.name).join(' & ')}</div>
                <div class="stylist-name">with ${selectedStylist.name}</div>
                <div class="appointment-time-meta">
                    <span><i class="far fa-calendar-alt"></i> ${bookingDetails.date}</span>
                    <span><i class="far fa-clock"></i> ${bookingDetails.time}</span>
                </div>
            </div>
            <div class="appointment-actions">
                <button class="btn-reschedule">Reschedule</button>
                <span class="btn-cancel">Cancel Appointment</span>
            </div>
        `;
        appointmentList.prepend(newCard);
        
        newCard.querySelector('.btn-reschedule').onclick = handleReschedule;
        newCard.querySelector('.btn-cancel').onclick = handleCancel;
    }

    const successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.innerHTML = `Thank you, Queen! Your appointment with <strong>${selectedStylist.name}</strong> on <strong>${bookingDetails.date}</strong> at <strong>${bookingDetails.time}</strong> has been confirmed.<br><br>See you at Belleza Salon!`;
    }
    
    cart = [];
    updateCart();
    successModal.classList.add('active');
}

function setupEventListeners() {
    // Navigation & Cart Toggle
    document.getElementById('cartToggle')?.addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('cartPanel').classList.toggle('active');
    });
    
    document.getElementById('closeCart')?.addEventListener('click', () => {
        document.getElementById('cartPanel').classList.remove('active');
    });

    // Payment Flow Start
    document.getElementById('checkoutBtn')?.addEventListener('click', handleCheckout);
    document.getElementById('changeStylistBtn')?.addEventListener('click', () => stylistConfirmModal.classList.remove('active'));
    document.getElementById('confirmPayBtn')?.addEventListener('click', () => {
        stylistConfirmModal.classList.remove('active');
        scheduleModal.classList.add('active');
    });

    // Schedule & Final Payment
    document.getElementById('confirmScheduleBtn')?.addEventListener('click', handleScheduleConfirmation);
    document.getElementById('iHavePaidBtn')?.addEventListener('click', handlePaymentSuccess);

    setupPaymentSelection();

    // Secondary Actions
    document.getElementById('invoiceBackDashboard')?.addEventListener('click', () => {
        document.getElementById('invoiceModal').classList.remove('active');
        document.getElementById('dashboard').scrollIntoView({ behavior: 'smooth' });
    });

    document.getElementById('bookNowBtn')?.addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('services').scrollIntoView({ behavior: 'smooth' });
    });

    // Dashboard Actions
    document.querySelectorAll('.btn-reschedule').forEach(btn => btn.onclick = handleReschedule);
    document.querySelectorAll('.btn-cancel').forEach(btn => btn.onclick = handleCancel);
    
    document.getElementById('historyBtn')?.addEventListener('click', () => historyModal.classList.add('active'));
    document.getElementById('closeHistory')?.addEventListener('click', () => historyModal.classList.remove('active'));
}

window.onload = init;
