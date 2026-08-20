// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    // ============================================
    // THEME SWITCHER
    // ============================================
    const themeButtons = document.querySelectorAll('.theme-btn');
    const htmlElement = document.documentElement;
    
    // Resolve initial theme: saved preference, else OS preference
    let savedTheme = null;
    try { savedTheme = localStorage.getItem('theme'); } catch (e) {}
    const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    const initialTheme = savedTheme || (prefersDark ? 'dark' : 'default');

    // Apply a theme to the document and the navbar buttons
    function applyTheme(theme) {
        htmlElement.setAttribute('data-theme', theme);
        updateActiveTheme(theme);
    }

    // Persist the choice, then apply it
    function setTheme(theme) {
        try { localStorage.setItem('theme', theme); } catch (e) {}
        applyTheme(theme);
    }

    // Keep all open pages/tabs in sync
    window.addEventListener('storage', function (event) {
        if (event.key === 'theme') {
            applyTheme(event.newValue || 'default');
        }
    });

    // Navbar theme button click handler
    themeButtons.forEach(button => {
        button.addEventListener('click', function() {
            setTheme(this.getAttribute('data-theme'));
        });
    });

    // Update active button indicator
    function updateActiveTheme(theme) {
        themeButtons.forEach(btn => {
            btn.classList.remove('active');
            if (btn.getAttribute('data-theme') === theme) {
                btn.classList.add('active');
            }
        });
    }

    // Apply the initial theme
    applyTheme(initialTheme);
    
    // ============================================
    // MOBILE MENU TOGGLE
    // ============================================
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
        });

        // Close menu when clicked
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Close menu 
    document.addEventListener('click', function(event) {
        const isClickInsideMenu = navMenu && navMenu.contains(event.target);
        const isClickOnToggle = menuToggle && menuToggle.contains(event.target);
        
        if (!isClickInsideMenu && !isClickOnToggle && navMenu && navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
            if (menuToggle) {
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        }
    });

    // ============================================
    // CERT TABS (lazy load images on first click)
    // ============================================
    const certTabs = document.querySelectorAll('.cert-tab');
    const certPanels = document.querySelectorAll('.cert-panel');

    certTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const target = this.getAttribute('data-cert');

            certTabs.forEach(t => t.classList.remove('cert-tab--active'));
            certPanels.forEach(p => p.classList.remove('cert-panel--active'));

            this.classList.add('cert-tab--active');
            const panel = document.getElementById('cert-' + target);
            if (panel) {
                panel.classList.add('cert-panel--active');
                panel.querySelectorAll('.lazy-img').forEach(loadLazyImg);
            }
        });
    });

    function loadLazyImg(img) {
        if (img.dataset.src) {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
            img.addEventListener('load', function() {
                this.classList.add('loaded');
            });
        }
    }

    // load images in the default active tab
    document.querySelectorAll('.cert-panel--active .lazy-img').forEach(loadLazyImg);
});


///IMPORTED FROM WEB3FORMS - Note my code 
// Form Handling
const contactForm = document.querySelector('.contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', async function(e) { // 1. Make function async
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);

        // Validate form data
        if (!data.name || !data.email || !data.country || !data.subject || !data.message) {
            showNotification('Please fill in all required fields', 'error');
            return;
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(data.email)) {
            showNotification('Please enter a valid email address', 'error');
            return;
        }

        // --- WEB3FORMS INTEGRATION STARTS HERE ---
        
        data.access_key = "d95eeed2-81bc-4bd7-b42d-57ea01e63dac"; 

        try {
            // 3. Send data to Web3Forms API
            const response = await fetch("https://api.web3forms.com/submit", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                // 4. Show success message ONLY if API confirms
                showNotification('Thank you for your message! I\'ll get back to you soon.', 'success');
                this.reset();
            } else {
                // 5. Handle API errors (e.g., invalid key)
                showNotification('Error: ' + result.message, 'error');
            }

        } catch (error) {
            // 6. Handle network errors
            showNotification('Something went wrong. Please try again.', 'error');
            console.error('Submission error:', error);
        }

        // --- WEB3FORMS INTEGRATION ENDS HERE ---
    });
}   
// Notification 
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.setAttribute('role', 'alert');
    notification.textContent = message;

    //  styles notification
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 1rem 1.5rem;
        border-radius: 0;
        font-weight: 500;
        z-index: 1000;
        animation: slideIn 0.3s ease;
        max-width: 400px;
    `;

    if (type === 'success') {
        notification.style.backgroundColor = '#27ae60';
        notification.style.color = 'white';
    } else if (type === 'error') {
        notification.style.backgroundColor = '#e74c3c';
        notification.style.color = 'white';
    } else {
        notification.style.backgroundColor = '#3498db';
        notification.style.color = 'white';
    }

    document.body.appendChild(notification);

    // Remove notification  4 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 4000);
}

// Smooth scroll 
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            const target = document.querySelector(href);
            const headerOffset = 80; // Adjust based on header height
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Add animation styles
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }

    /* Add focus indicators for keyboard navigation */
    button:focus-visible,
    input:focus-visible,
    textarea:focus-visible,
    a:focus-visible {
        outline: 2px solid #3498db;
        outline-offset: 2px;
    }
`;
document.head.appendChild(style);

// Log when page loads for debugging
console.log('Portfolio page loaded successfully');