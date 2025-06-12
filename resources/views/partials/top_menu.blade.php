<div class="navbar navbar-expand-md navbar-dark">
    <!-- Visual Effect Elements -->
    <canvas id="particle-network"></canvas>
    <canvas id="confetti-canvas"></canvas>

    <div class="mt-2 mr-5">
        <a href="{{ route('dashboard') }}" class="d-inline-block">
            <h4 class="text-bold text-white">{{ Qs::getSystemName() }}</h4>
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="navbar-text ml-md-3 mr-md-auto"></span>

        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown" id="user-dropdown" aria-haspopup="true" aria-expanded="false">
                    <img style="width: 38px; height:38px;" src="{{ Auth::user()->photo }}" class="rounded-circle" alt="photo">
                    <span>{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-dropdown">
                    <a href="{{ Qs::userIsStudent() ? route('students.show', Qs::hash(Qs::findStudentRecord(Auth::user()->id)->id)) : route('users.show', Qs::hash(Auth::user()->id)) }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('my_account') }}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); triggerConfetti(); setTimeout(() => { document.getElementById('logout-form').submit(); }, 1500);" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>

<style>
    /* Base Navbar Styles */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        padding: 0.8rem 2rem;
        height: 80px; /* Fixed height for consistent spacing */
    }

    /* Add this to ensure content doesn't hide behind navbar */
    body {
        padding-top: 80px; /* Should match navbar height + any additional spacing */
    }

    /* Holographic Effect */
    .navbar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg,
            rgba(255, 0, 255, 0.1) 0%,
            rgba(0, 255, 255, 0.1) 20%,
            rgba(255, 255, 0, 0.1) 40%,
            rgba(0, 255, 0, 0.1) 60%,
            rgba(0, 0, 255, 0.1) 80%,
            rgba(255, 0, 0, 0.1) 100%);
        background-size: 200% 200%;
        animation: holographic 8s ease infinite;
        pointer-events: none;
        z-index: -1;
    }

    @keyframes holographic {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Enhanced Dropdown Styling */
    .dropdown-menu {
        border: none;
        min-width: 200px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(10px);
        transition: all 0.3s ease;
        opacity: 0;
        display: block;
        visibility: hidden;
        pointer-events: none;
    }

    .show.dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        pointer-events: auto;
    }

    .dropdown-item {
        padding: 0.7rem 1.5rem;
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        color: #333;
    }

    .dropdown-item:last-child {
        border-bottom: none;
    }

    .dropdown-item:hover {
        background: #f8f9fa;
        color: #6e48aa;
        padding-left: 1.7rem;
    }

    .dropdown-item i {
        margin-right: 0.7rem;
        color: #6e48aa;
    }

    /* Particle Network Canvas */
    #particle-network {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 0.3;
    }

    /* Confetti Canvas */
    #confetti-canvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1002;
        display: none;
    }

    /* Profile Image Effects */
    .rounded-circle {
        transition: transform 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .rounded-circle:hover {
        transform: scale(1.1);
    }

    /* Navbar Brand Styling */
    .text-bold.text-white {
        font-weight: 700;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    /* Mobile Toggle Buttons */
    .navbar-toggler {
        border: none;
        background: transparent;
        color: white;
        font-size: 1.5rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .navbar {
            padding: 0.8rem 1rem;
        }

        .dropdown-menu {
            position: static;
            transform: none;
            box-shadow: none;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        body {
            padding-top: 70px; /* Adjust for mobile if needed */
        }
    }
</style>

<script>
    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        initParticleNetwork();
        adjustBodyPadding();
    });

    // Adjust body padding based on navbar height
    function adjustBodyPadding() {
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            const navbarHeight = navbar.offsetHeight;
            document.body.style.paddingTop = navbarHeight + 'px';
        }
    }

    /* Particle Network Animation */
    function initParticleNetwork() {
        const canvas = document.getElementById('particle-network');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');

        // Set canvas size
        function resizeCanvas() {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
        }
        resizeCanvas();

        // Create particles
        const particles = [];
        const particleCount = Math.floor(canvas.width * canvas.height / 5000);

        for (let i = 0; i < particleCount; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                size: Math.random() * 2 + 1,
                speedX: Math.random() * 1 - 0.5,
                speedY: Math.random() * 1 - 0.5
            });
        }

        // Animation loop
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = 0; i < particles.length; i++) {
                const p = particles[i];

                p.x += p.speedX;
                p.y += p.speedY;

                if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
                if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;

                ctx.fillStyle = 'rgba(255, 255, 255, 0.5)';
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                ctx.fill();

                for (let j = i + 1; j < particles.length; j++) {
                    const p2 = particles[j];
                    const distance = Math.sqrt(Math.pow(p.x - p2.x, 2) + Math.pow(p.y - p2.y, 2));

                    if (distance < 100) {
                        ctx.strokeStyle = `rgba(255, 255, 255, ${1 - distance/100})`;
                        ctx.lineWidth = 0.5;
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(p2.x, p2.y);
                        ctx.stroke();
                    }
                }
            }

            requestAnimationFrame(animate);
        }

        animate();

        window.addEventListener('resize', function() {
            resizeCanvas();
            adjustBodyPadding();
        });
    }

    /* Confetti Effect */
    function triggerConfetti() {
        const canvas = document.getElementById('confetti-canvas');
        if (!canvas) return;

        canvas.style.display = 'block';
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;

        const ctx = canvas.getContext('2d');
        const pieces = [];
        const pieceCount = 150;

        for (let i = 0; i < pieceCount; i++) {
            pieces.push({
                x: Math.random() * canvas.width,
                y: -10,
                size: Math.random() * 10 + 5,
                speed: Math.random() * 3 + 2,
                rotation: Math.random() * 360,
                rotationSpeed: Math.random() * 10 - 5,
                color: `hsl(${Math.random() * 360}, 100%, 50%)`,
                shape: Math.random() > 0.5 ? 'square' : 'circle'
            });
        }

        let animationId;
        let startTime = null;

        function animateConfetti(timestamp) {
            if (!startTime) startTime = timestamp;
            const progress = timestamp - startTime;

            ctx.clearRect(0, 0, canvas.width, canvas.height);

            let stillActive = false;

            for (let i = 0; i < pieces.length; i++) {
                const p = pieces[i];

                p.y += p.speed;
                p.rotation += p.rotationSpeed;

                ctx.fillStyle = p.color;
                ctx.save();
                ctx.translate(p.x, p.y);
                ctx.rotate(p.rotation * Math.PI / 180);

                if (p.shape === 'square') {
                    ctx.fillRect(-p.size/2, -p.size/2, p.size, p.size);
                } else {
                    ctx.beginPath();
                    ctx.arc(0, 0, p.size/2, 0, Math.PI * 2);
                    ctx.fill();
                }

                ctx.restore();

                if (p.y < canvas.height) stillActive = true;
            }

            if (stillActive && progress < 1500) {
                animationId = requestAnimationFrame(animateConfetti);
            } else {
                cancelAnimationFrame(animationId);
                canvas.style.display = 'none';
            }
        }

        animationId = requestAnimationFrame(animateConfetti);
    }
</script>
