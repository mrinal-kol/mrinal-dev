<style>
    /* Global Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        padding-top: 80px; /* Prevent content from hiding behind the fixed header */
    }

    /* Header */
    header {
        background-color: #333;
        color: white;
        padding: 20px 0;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
    }

    /* Navigation Bar */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Logo */
    .logo a {
        color: white;
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
    }

    /* Navigation Links */
    .nav-links {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .nav-links li {
        font-size: 18px;
    }

    .nav-links a {
        text-decoration: none;
        color: white;
        transition: color 0.3s ease;
    }

    .nav-links a:hover {
        color: #f4f4f4;
    }

    /* Call to Action Button */
    .cta .cta-button {
        background-color: #f4a261;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .cta .cta-button:hover {
        background-color: #e76f51;
    }

    /* Hamburger Menu Button (hidden on desktop) */
    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        gap: 5px;
    }

    .hamburger span {
        width: 25px;
        height: 3px;
        background: white;
        border-radius: 2px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .navbar {
            flex-direction: row;
        }

        .nav-links {
            position: absolute;
            top: 70px;
            right: 0;
            background: #333;
            flex-direction: column;
            width: 100%;
            display: none;
            padding: 15px 0;
        }

        .nav-links.show {
            display: flex;
        }

        .cta {
            display: none; /* Hide CTA on small screens, can move into nav if needed */
        }

        .hamburger {
            display: flex;
        }
    }
</style>

<header>
    <nav class="navbar">
        <div class="logo">
            <a href="#">YourLogo</a>
        </div>

        <!-- Hamburger for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links" id="navLinks">
            <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li><a class="nav-link" href="{{ route('aboutus') }}">About</a></li>
            <li><a class="nav-link" href="{{ route('services') }}">Services</a></li>
            <li><a class="nav-link" href="{{ route('Portfolio') }}">Portfolio</a></li>
            <li><a class="nav-link" href="{{ route('contactus') }}">Contact</a></li>
        </ul>

        <div class="cta">
            <a href="#" class="cta-button">Get Started</a>
        </div>
    </nav>
</header>

<script>
    function toggleMenu() {
        document.getElementById("navLinks").classList.toggle("show");
    }
</script>
