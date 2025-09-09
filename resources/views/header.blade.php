

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
            <li><a class="nav-link" href="{{ route('vue_example') }}">Vue Example</a></li>
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
