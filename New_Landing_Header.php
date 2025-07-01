<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUKATE - Learn From Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header Styles */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            position: relative;
        }

        .logo {
            display: flex;
                margin: -125px;
            align-items: center;
            font-size: 1.4rem;
            font-weight: bold;
            color: #4285f4;
        }
        .logo img {
            width: 50px;
            height: auto;
            padding-right: 10px;
            }
        


        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-menu .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
            padding-top: 12px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease, transform 0.3s ease;
            position: relative;
        }

        .nav-menu a:hover {
            color: #4285f4;
            transform: translateY(-2px);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #4285f4;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .join-btn {
            background: #4285f4;
            color: white !important;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            margin-right: -76px;
        }

        .join-btn:hover {
            background: #3367d6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(66, 133, 244, 0.4);
        }

        /* Hero Section */
        .hero {
            background: 
                linear-gradient(135deg, rgba(66, 133, 244, 0.3) 0%, rgba(52, 168, 83, 0.3) 100%),
                url('./imgs/students.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,800 1000,1000"/></svg>');
            background-size: cover;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(1deg); }
        }

        .hero-content {
            max-width: 800px;
            padding: 2rem;
            z-index: 2;
        }

        .hero-subtitle {
            font-size: 1rem;
            animation: slideInUp 1s ease 0.3s forwards;
            margin: -164px 0 102px 0px;
        }

        .hero-subtitle img {
            width: 30px;
            height: auto;
            vertical-align: middle;
            margin-right: 10px;
        }


        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            line-height: 1.2;
            opacity: 0;
            color: white;
            animation: slideInUp 1s ease 0.6s forwards;
        }

        .hero-title .word {
            display: inline-block;
            opacity: 0;
            transform: translateY(50px) rotateX(90deg);
            animation: flipInWord 0.8s ease forwards;
        }

        .hero-title .word:nth-child(1) {
            animation-delay: 0.8s;
        }

        .hero-title .word:nth-child(2) {
            animation-delay: 1.2s;
        }

        @keyframes flipInWord {
            0% {
                opacity: 0;
                transform: translateY(50px) rotateX(90deg);
            }
            50% {
                opacity: 0.5;
                transform: translateY(0) rotateX(45deg);
            }
            100% {
                opacity: 1;
                transform: translateY(0) rotateX(0deg);
            }
        }

        /* Remove search-related styles */

        /* Wave Effect */
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 50px;
        }

        .wave .shape-fill {
            fill: #FFFFFF;
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-container {
                padding: 1rem;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: white;
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                gap: 1rem;
                transform: none;
            }

            .nav-menu .nav-links {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-menu.active {
                display: flex;
                animation: slideDown 0.3s ease;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .search-container {
                border-radius: 15px;
                max-width: 90%;
            }

            .hero-content {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem;
            }

            .nav-container {
                padding: 0.5rem 1rem;
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Remove search-related hover effects */

        /* Additional smooth transitions */
        * {
            transition: color 0.3s ease, background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav-container">
            <div class="logo">
                  <img src="./imgs/logo.jpg" alt="Lucena South II Elementary School Logo" />
                  Lucena South II Elementary School
            </div>
            
            <ul class="nav-menu" id="navMenu">
                <div class="nav-links">
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./About_Page.php">About</a></li>
                    <li><a href="./Learn_More_Page.php">Learn More </a></li>
                    <li><a href="./client_Side/login_form.php">Log In</a></li>
                </div>
            </ul>
            
            <button class="join-btn" onclick="location.href='./client_side/Registration.php'">Sign Up</button>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <p class="hero-subtitle" style="text-align: center; right: 10px;">
                    <img src="./imgs/deped_logo.png" alt="DepEd Logo" />
                    Republic of the Philippines Department of Education
            </p>
            <br>
            <h1 class="hero-title">
                <span class="word">Timog Dos,</span> <span class="word">Dunong ay Lubos</span>
            </h1>
            

        </div>
        
        <!-- Wave SVG -->
        <div class="wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navMenu = document.getElementById('navMenu');

        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            mobileMenuBtn.textContent = navMenu.classList.contains('active') ? '✕' : '☰';
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                navMenu.classList.remove('active');
                mobileMenuBtn.textContent = '☰';
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll effect to header
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'white';
                header.style.backdropFilter = 'none';
            }
        });

        // Remove search functionality
    </script>
</body>
</html>