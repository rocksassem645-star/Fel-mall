/**
 * FEL MALL - Main JavaScript File
 * Edit anything here freely
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {

        // ===== FEATURE CARD INTERACTIONS =====
        const featureCards = document.querySelectorAll('.feature-card');
        
        featureCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = 'scale(1.05)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = 'scale(1)';
                }
            });
        });

        // ===== SMOOTH SCROLL FOR ANCHOR LINKS =====
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const target = this.getAttribute('href');
                if (target === '#') return;
                
                const targetElement = document.querySelector(target);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // ===== NAVBAR SCROLL EFFECT =====
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-sm');
                    navbar.style.padding = '0.5rem 0';
                } else {
                    navbar.classList.remove('shadow-sm');
                    navbar.style.padding = '1rem 0';
                }
            });
        }

        // ===== BACK TO TOP BUTTON (will add dynamically) =====
        const addBackToTopButton = () => {
            const btn = document.createElement('button');
            btn.innerHTML = '<i class="fas fa-arrow-up"></i>';
            btn.className = 'back-to-top';
            btn.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
                border-radius: 50%;
                background: #2e7d32;
                color: white;
                border: none;
                cursor: pointer;
                display: none;
                z-index: 1000;
                transition: all 0.3s;
            `;
            document.body.appendChild(btn);
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    btn.style.display = 'block';
                } else {
                    btn.style.display = 'none';
                }
            });
            
            btn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        };
        
        // Uncomment if you want back to top button
        // addBackToTopButton();

        // ===== LOGOUT CONFIRMATION =====
        const logoutButtons = document.querySelectorAll('form[action*="logout"] button');
        logoutButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to logout?')) {
                    e.preventDefault();
                }
            });
        });

        // ===== DARK MODE TOGGLE (Override system preference) =====
        // Uncomment if you want a manual dark mode toggle button
        /*
        const createDarkModeToggle = () => {
            const toggle = document.createElement('button');
            toggle.innerHTML = '<i class="fas fa-moon"></i>';
            toggle.className = 'dark-mode-toggle';
            toggle.style.cssText = `
                position: fixed;
                bottom: 20px;
                left: 20px;
                width: 45px;
                height: 45px;
                border-radius: 50%;
                background: #2e7d32;
                color: white;
                border: none;
                cursor: pointer;
                z-index: 1000;
            `;
            document.body.appendChild(toggle);
            
            toggle.addEventListener('click', () => {
                document.body.classList.toggle('dark-mode');
            });
        };
        createDarkModeToggle();
        */

        // ===== CONSOLE WELCOME =====
        console.log('%c✨ FEL MALL — Ready to shop! ✨', 'color: #2e7d32; font-size: 14px; font-weight: bold;');

    }); // End DOMContentLoaded

})();