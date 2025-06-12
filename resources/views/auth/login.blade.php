<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epic 3D Dragon Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #533d4d);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 2000px;
            overflow: hidden;
            animation: gradientShift 15s ease infinite;
            background-size: 400% 400%;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            position: relative;
            width: 100%;
            max-width: 480px;
            transform-style: preserve-3d;
            z-index: 10;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2),
                        0 0 100px rgba(78, 204, 163, 0.1);
            padding: 40px;
            transform-style: preserve-3d;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotateX(0deg) rotateY(0deg); }
            50% { transform: translateY(-20px) rotateX(5deg) rotateY(5deg); }
        }

        .form-group {
            position: relative;
            margin-bottom: 30px;
            transform-style: preserve-3d;
        }

        .form-label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 12px;
            font-size: 16px;
            transform: translateZ(30px);
        }

        .form-control {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: white;
            font-size: 16px;
            transition: all 0.4s;
            transform: translateZ(20px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            outline: none;
            border-color: #4ecca3;
            box-shadow: 0 0 20px rgba(78, 204, 163, 0.4);
            transform: translateZ(30px);
            background: rgba(255, 255, 255, 0.15);
        }

        .form-control.is-invalid {
            border-color: #ff4757;
            box-shadow: 0 0 20px rgba(255, 71, 87, 0.4);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%) translateZ(25px);
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: all 0.3s;
        }

        .password-toggle:hover {
            color: #4ecca3;
            transform: translateY(-50%) translateZ(30px) scale(1.2);
        }

        .btn-3d {
            position: relative;
            display: inline-block;
            padding: 16px 32px;
            background: linear-gradient(45deg, #4ecca3, #2e8b57);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transform-style: preserve-3d;
            transform: translateZ(25px);
            transition: all 0.3s;
            box-shadow: 0 10px 25px rgba(78, 204, 163, 0.4),
                        inset 0 -3px 0 rgba(0, 0, 0, 0.2);
            width: 100%;
            overflow: hidden;
        }

        .btn-3d:hover {
            transform: translateZ(35px);
            box-shadow: 0 15px 35px rgba(78, 204, 163, 0.6),
                        inset 0 -3px 0 rgba(0, 0, 0, 0.2);
        }

        .btn-3d:active {
            transform: translateZ(20px);
            box-shadow: 0 5px 15px rgba(78, 204, 163, 0.4),
                        inset 0 2px 0 rgba(255, 255, 255, 0.1);
        }

        .btn-3d:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: translateX(-100%);
            transition: all 0.5s;
        }

        .btn-3d:hover:after {
            transform: translateX(100%);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
            transform-style: preserve-3d;
        }

        .logo-3d {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(78, 204, 163, 0.5);
            transform: translateZ(40px);
            box-shadow: 0 0 30px rgba(78, 204, 163, 0.3);
            transition: all 0.5s;
        }

        .logo-3d i {
            font-size: 36px;
            color: #4ecca3;
        }

        .login-header h1 {
            color: white;
            font-size: 28px;
            margin-bottom: 10px;
            transform: translateZ(30px);
            text-shadow: 0 0 15px rgba(78, 204, 163, 0.5);
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
            transform: translateZ(25px);
        }

        .floating-element {
            position: absolute;
            background: rgba(78, 204, 163, 0.1);
            border: 1px solid rgba(78, 204, 163, 0.3);
            border-radius: 20px;
            z-index: -1;
            animation: floatElement 15s ease-in-out infinite;
        }

        @keyframes floatElement {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(50px, 30px) rotate(10deg); }
            50% { transform: translate(0, 60px) rotate(0deg); }
            75% { transform: translate(-50px, 30px) rotate(-10deg); }
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .audio-controls {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .login-feedback {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) translateZ(100px);
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            padding: 30px 50px;
            border-radius: 15px;
            color: white;
            font-size: 24px;
            text-align: center;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s;
            box-shadow: 0 0 50px rgba(78, 204, 163, 0.5);
            border: 2px solid #4ecca3;
        }

        .login-feedback.show {
            opacity: 1;
            visibility: visible;
        }

        .login-feedback.error {
            border-color: #ff4757;
            box-shadow: 0 0 50px rgba(255, 71, 87, 0.5);
        }

        .login-feedback i {
            font-size: 50px;
            margin-bottom: 20px;
            display: block;
        }

        .login-feedback.success i {
            color: #4ecca3;
        }

        .login-feedback.error i {
            color: #ff4757;
        }

        /* Dragon Animation Styles */
        .dragon-canvas {
            position: absolute;
            top: -180px;
            left: 50%;
            transform: translateX(-50%) translateZ(-50px);
            z-index: -1;
            pointer-events: none;
        }

        /* New Floating Crystal Elements */
        .crystal {
            position: absolute;
            background: rgba(78, 204, 163, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            z-index: -1;
            clip-path: polygon(
                50% 0%,
                80% 10%,
                100% 35%,
                90% 70%,
                50% 100%,
                10% 70%,
                0% 35%,
                20% 10%
            );
            animation: floatCrystal 25s linear infinite;
        }

        @keyframes floatCrystal {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); opacity: 0.3; }
            25% { transform: translate(50px, 30px) rotate(90deg) scale(1.1); opacity: 0.5; }
            50% { transform: translate(0, 60px) rotate(180deg) scale(0.9); opacity: 0.7; }
            75% { transform: translate(-50px, 30px) rotate(270deg) scale(1.05); opacity: 0.5; }
            100% { transform: translate(0, 0) rotate(360deg) scale(1); opacity: 0.3; }
        }

        /* Fire Glow Effect */
        .fire-glow {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(238, 88, 63, 0.6) 0%, rgba(238, 88, 63, 0) 70%);
            border-radius: 50%;
            filter: blur(30px);
            z-index: -2;
            animation: pulseGlow 4s ease infinite alternate;
        }

        @keyframes pulseGlow {
            0% { transform: scale(0.8); opacity: 0.3; }
            100% { transform: scale(1.2); opacity: 0.7; }
        }

        /* Confetti Canvas */
        #confetti-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -4;
            pointer-events: none;
        }

        /* Remember Me Checkbox */
        .remember-me {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transform: translateZ(20px);
        }

        .custom_check {
            position: relative;
            padding-left: 35px;
            margin-right: 15px;
        }

        .custom_check input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 22px;
            width: 22px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .custom_check:hover .checkmark {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .custom_check input:checked ~ .checkmark {
            background-color: #4ecca3;
            border-color: #4ecca3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom_check input:checked ~ .checkmark:after {
            display: block;
        }

        .custom_check .checkmark:after {
            left: 8px;
            top: 4px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }

        .forgot-link {
            color: #4ecca3;
            text-decoration: none;
            transition: all 0.3s;
            transform: translateZ(20px);
        }

        .forgot-link:hover {
            color: #fff;
            text-shadow: 0 0 12px #4ecca3;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            transform-style: preserve-3d;
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="floating-element" style="width: 120px; height: 120px; top: 15%; left: 10%;"></div>
    <div class="floating-element" style="width: 180px; height: 180px; bottom: 15%; right: 10%; animation-delay: 0.5s;"></div>
    <div class="floating-element" style="width: 100px; height: 100px; top: 50%; left: 20%; animation-delay: 1s;"></div>

    <!-- Crystal Elements -->
    <div class="crystal" style="width: 80px; height: 80px; top: 20%; right: 15%; animation-delay: 2s;"></div>
    <div class="crystal" style="width: 60px; height: 60px; bottom: 25%; left: 15%; animation-delay: 3s;"></div>

    <!-- Fire Glow -->
    <div class="fire-glow" style="top: 30%; left: 80%;"></div>

    <!-- Dragon Canvas -->
    <canvas id="dragonCanvas" class="dragon-canvas"></canvas>

    <!-- Particles -->
    <div id="particles-js"></div>

    <!-- Confetti Canvas -->
    <canvas id="confetti-canvas"></canvas>

    <!-- Audio Elements -->
    <audio id="successSound" class="audio-controls">
        <source src="https://assets.mixkit.co/sfx/preview/mixkit-correct-answer-tone-2870.mp3" type="audio/mpeg">
    </audio>
    <audio id="errorSound" class="audio-controls">
        <source src="https://assets.mixkit.co/sfx/preview/mixkit-wrong-answer-fail-notification-946.mp3" type="audio/mpeg">
    </audio>
    <audio id="hoverSound" class="audio-controls">
        <source src="https://assets.mixkit.co/sfx/preview/mixkit-select-click-1109.mp3" type="audio/mpeg">
    </audio>
    <audio id="backgroundMusic" loop class="audio-controls">
        <source src="https://assets.mixkit.co/music/preview/mixkit-tech-house-vibes-130.mp3" type="audio/mpeg">
    </audio>

    <!-- Feedback Messages -->
    <div class="login-feedback success">
        <i class="fas fa-check-circle"></i>
        <p>Successfully logged in!</p>
    </div>
    <div class="login-feedback error">
        <i class="fas fa-times-circle"></i>
        <p id="errorMessage">Incorrect credentials. Please try again.</p>
    </div>

    <!-- Main Login Form -->
    <div class="login-container">
        <div class="glass-card">
            <div class="login-header">
                <div class="logo-3d">
                    <i class="fas fa-dragon"></i>
                </div>
                <h1>Dragon Admin System</h1>
                <p>Enter your credentials to continue</p>
            </div>

            <form id="loginForm" class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Username or Email</label>
                    <input type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" placeholder="Enter your username or email" required>
                    <span class="password-toggle"><i class="fas fa-user"></i></span>
                </div>

                <div class="form-group" style="position: relative;">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="passwordInput" placeholder="Enter your password" required>
                    <span class="password-toggle" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <div class="form-footer">
                    <label class="remember-me custom_check"> Remember me
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                    </label>
                    {{-- <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a> --}}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-3d">
                        <i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i> Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        // Initialize particles
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 100, "density": { "enable": true, "value_area": 1000 } },
                "color": { "value": ["#4ecca3", "#ff4757", "#1da1f2"] },
                "shape": { "type": ["circle", "star"], "stroke": { "width": 0 } },
                "opacity": { "value": 0.6, "random": true, "anim": { "enable": true, "speed": 1, "opacity_min": 0.2 } },
                "size": { "value": 4, "random": true, "anim": { "enable": true, "speed": 20, "size_min": 0.2 } },
                "line_linked": { "enable": true, "distance": 150, "color": "#4ecca3", "opacity": 0.5, "width": 1.5 },
                "move": {
                    "enable": true,
                    "speed": 3,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": { "enable": true, "mode": "grab" },
                    "onclick": { "enable": true, "mode": "push" },
                    "resize": true
                },
                "modes": {
                    "grab": { "distance": 150, "line_linked": { "opacity": 1 } },
                    "bubble": { "distance": 300, "size": 50, "duration": 2, "opacity": 8 },
                    "repulse": { "distance": 200, "duration": 0.4 },
                    "push": { "particles_nb": 5 },
                    "remove": { "particles_nb": 2 }
                }
            },
            "retina_detect": true
        });

        // Dragon animation
        const dragonCanvas = document.getElementById('dragonCanvas');
        const dragonCtx = dragonCanvas.getContext('2d');
        dragonCanvas.width = 350;
        dragonCanvas.height = 250;

        let frameCount = 0;
        const dragonParts = [
            { x: 120, y: 120, size: 25, color: '#4ecca3' },
            { x: 150, y: 130, size: 35, color: '#3aa789' },
            { x: 190, y: 125, size: 40, color: '#2e8b57' },
            { x: 230, y: 130, size: 35, color: '#3aa789' },
            { x: 260, y: 120, size: 25, color: '#4ecca3' }
        ];

        function animateDragon() {
            dragonCtx.clearRect(0, 0, dragonCanvas.width, dragonCanvas.height);

            for (let i = 0; i < dragonParts.length; i++) {
                const part = dragonParts[i];
                const waveOffset = Math.sin(frameCount * 0.06 + i * 0.6) * 15;

                dragonCtx.beginPath();
                dragonCtx.arc(part.x, part.y + waveOffset, part.size, 0, Math.PI * 2);
                dragonCtx.fillStyle = part.color;
                dragonCtx.fill();
                dragonCtx.closePath();

                if (i > 0) {
                    dragonCtx.beginPath();
                    dragonCtx.moveTo(dragonParts[i-1].x, dragonParts[i-1].y + waveOffset);
                    dragonCtx.lineTo(part.x, part.y + waveOffset);
                    dragonCtx.strokeStyle = part.color;
                    dragonCtx.lineWidth = 12;
                    dragonCtx.stroke();
                    dragonCtx.closePath();
                }
            }

            const wingFlap = Math.sin(frameCount * 0.12) * 25;
            dragonCtx.beginPath();
            dragonCtx.moveTo(170, 120);
            dragonCtx.quadraticCurveTo(140, 90 - wingFlap, 110, 100);
            dragonCtx.quadraticCurveTo(140, 80 - wingFlap, 170, 120);
            dragonCtx.fillStyle = 'rgba(78, 204, 163, 0.7)';
            dragonCtx.fill();

            dragonCtx.beginPath();
            dragonCtx.moveTo(170, 120);
            dragonCtx.quadraticCurveTo(200, 90 - wingFlap, 230, 100);
            dragonCtx.quadraticCurveTo(200, 80 - wingFlap, 170, 120);
            dragonCtx.fill();

            dragonCtx.beginPath();
            dragonCtx.arc(110, 110, 6, 0, Math.PI * 2);
            dragonCtx.fillStyle = '#fff';
            dragonCtx.fill();

            frameCount++;
            requestAnimationFrame(animateDragon);
        }

        animateDragon();

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('passwordInput');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
            playHoverSound();
        });

        // Audio elements
        const successSound = document.getElementById('successSound');
        const errorSound = document.getElementById('errorSound');
        const hoverSound = document.getElementById('hoverSound');
        const backgroundMusic = document.getElementById('backgroundMusic');

        // Play sounds
        function playSuccessSound() {
            successSound.currentTime = 0;
            successSound.play();
        }

        function playErrorSound() {
            errorSound.currentTime = 0;
            errorSound.play();
        }

        function playHoverSound() {
            hoverSound.currentTime = 0;
            hoverSound.volume = 0.3;
            hoverSound.play();
        }

        // Start background music (muted by default)
        backgroundMusic.volume = 0.2;
        // backgroundMusic.play().catch(e => console.log("Auto-play prevented:", e));

        // Show feedback message
        function showFeedback(isSuccess, message = null) {
            const successElement = document.querySelector('.login-feedback.success');
            const errorElement = document.querySelector('.login-feedback.error');
            const errorMessageElement = document.getElementById('errorMessage');

            if (isSuccess) {
                playSuccessSound();
                successElement.classList.add('show');
                setTimeout(() => {
                    successElement.classList.remove('show');
                }, 2000);
            } else {
                playErrorSound();
                if (message) {
                    errorMessageElement.textContent = message;
                }
                errorElement.classList.add('show');
                setTimeout(() => {
                    errorElement.classList.remove('show');
                }, 2000);
            }
        }

        // Check for Laravel validation errors
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', () => {
                showFeedback(false, "{{ implode(' ', $errors->all()) }}");
            });
        @endif

        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = this.querySelector('[name="identity"]').value;
            const password = this.querySelector('[name="password"]').value;

            // Basic client-side validation
            if (username.length === 0 || password.length === 0) {
                e.preventDefault();
                showFeedback(false, "Please fill in all fields.");
            } else {
                // Show success feedback (assuming server will handle actual validation)
                showFeedback(true);

                // Confetti effect
                const duration = 3 * 1000;
                const animationEnd = Date.now() + duration;
                const colors = ['#4ecca3', '#2e8b57', '#ff4757', '#ffffff', '#1da1f2'];

                function frame() {
                    confetti({
                        particleCount: 100,
                        angle: randomInRange(55, 125),
                        spread: randomInRange(50, 70),
                        origin: { x: randomInRange(0.1, 0.9), y: randomInRange(0.1, 0.9) },
                        colors: colors,
                        zIndex: 1000
                    });

                    if (Date.now() < animationEnd) {
                        requestAnimationFrame(frame);
                    }
                }

                function randomInRange(min, max) {
                    return Math.random() * (max - min) + min;
                }

                frame();
            }
        });

        // Interactive hover effects
        const interactiveElements = document.querySelectorAll('.btn-3d, .password-toggle, a, input, .logo-3d, .custom_check');
        interactiveElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                playHoverSound();
            });
        });

        // 3D tilt effect
        const card = document.querySelector('.glass-card');
        document.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        // Reset position when mouse leaves
        document.addEventListener('mouseleave', () => {
            card.style.transform = 'rotateY(0deg) rotateX(0deg)';
        });




    </script>
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epic 3D Dragon Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #533d4d);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 2000px;
            overflow: hidden;
            animation: gradientShift 15s ease infinite;
            background-size: 400% 400%;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            position: relative;
            width: 100%;
            max-width: 480px;
            transform-style: preserve-3d;
            z-index: 10;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2),
                        0 0 100px rgba(78, 204, 163, 0.1);
            padding: 40px;
            transform-style: preserve-3d;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotateX(0deg) rotateY(0deg); }
            50% { transform: translateY(-20px) rotateX(5deg) rotateY(5deg); }
        }

        .form-group {
            position: relative;
            margin-bottom: 30px;
            transform-style: preserve-3d;
        }

        .form-label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 12px;
            font-size: 16px;
            transform: translateZ(30px);
        }

        .form-control {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: white;
            font-size: 16px;
            transition: all 0.4s;
            transform: translateZ(20px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            outline: none;
            border-color: #4ecca3;
            box-shadow: 0 0 20px rgba(78, 204, 163, 0.4);
            transform: translateZ(30px);
            background: rgba(255, 255, 255, 0.15);
        }

        .form-control.is-invalid {
            border-color: #ff4757;
            box-shadow: 0 0 20px rgba(255, 71, 87, 0.4);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%) translateZ(25px);
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: all 0.3s;
        }

        .password-toggle:hover {
            color: #4ecca3;
            transform: translateY(-50%) translateZ(30px) scale(1.2);
        }

        .btn-3d {
            position: relative;
            display: inline-block;
            padding: 16px 32px;
            background: linear-gradient(45deg, #4ecca3, #2e8b57);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transform-style: preserve-3d;
            transform: translateZ(25px);
            transition: all 0.3s;
            box-shadow: 0 10px 25px rgba(78, 204, 163, 0.4),
                        inset 0 -3px 0 rgba(0, 0, 0, 0.2);
            width: 100%;
            overflow: hidden;
        }

        .btn-3d:hover {
            transform: translateZ(35px);
            box-shadow: 0 15px 35px rgba(78, 204, 163, 0.6),
                        inset 0 -3px 0 rgba(0, 0, 0, 0.2);
        }

        .btn-3d:active {
            transform: translateZ(20px);
            box-shadow: 0 5px 15px rgba(78, 204, 163, 0.4),
                        inset 0 2px 0 rgba(255, 255, 255, 0.1);
        }

        .btn-3d:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: translateX(-100%);
            transition: all 0.5s;
        }

        .btn-3d:hover:after {
            transform: translateX(100%);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
            transform-style: preserve-3d;
        }

        .logo-3d {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(78, 204, 163, 0.5);
            transform: translateZ(40px);
            box-shadow: 0 0 30px rgba(78, 204, 163, 0.3);
            transition: all 0.5s;
        }

        .logo-3d i {
            font-size: 36px;
            color: #4ecca3;
        }

        .login-header h1 {
            color: white;
            font-size: 28px;
            margin-bottom: 10px;
            transform: translateZ(30px);
            text-shadow: 0 0 15px rgba(78, 204, 163, 0.5);
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
            transform: translateZ(25px);
        }

        .floating-element {
            position: absolute;
            background: rgba(78, 204, 163, 0.1);
            border: 1px solid rgba(78, 204, 163, 0.3);
            border-radius: 20px;
            z-index: -1;
            animation: floatElement 15s ease-in-out infinite;
        }

        @keyframes floatElement {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(50px, 30px) rotate(10deg); }
            50% { transform: translate(0, 60px) rotate(0deg); }
            75% { transform: translate(-50px, 30px) rotate(-10deg); }
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .audio-controls {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .login-feedback {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) translateZ(100px);
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            padding: 30px 50px;
            border-radius: 15px;
            color: white;
            font-size: 24px;
            text-align: center;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s;
            box-shadow: 0 0 50px rgba(78, 204, 163, 0.5);
            border: 2px solid #4ecca3;
        }

        .login-feedback.show {
            opacity: 1;
            visibility: visible;
        }

        .login-feedback.error {
            border-color: #ff4757;
            box-shadow: 0 0 50px rgba(255, 71, 87, 0.5);
        }

        .login-feedback i {
            font-size: 50px;
            margin-bottom: 20px;
            display: block;
        }

        .login-feedback.success i {
            color: #4ecca3;
        }

        .login-feedback.error i {
            color: #ff4757;
        }

        /* Dragon Animation Styles */
        .dragon-canvas {
            position: absolute;
            top: -180px;
            left: 50%;
            transform: translateX(-50%) translateZ(-50px);
            z-index: -1;
            pointer-events: none;
        }

        /* New Floating Crystal Elements */
        .crystal {
            position: absolute;
            background: rgba(78, 204, 163, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            z-index: -1;
            clip-path: polygon(
                50% 0%,
                80% 10%,
                100% 35%,
                90% 70%,
                50% 100%,
                10% 70%,
                0% 35%,
                20% 10%
            );
            animation: floatCrystal 25s linear infinite;
        }

        @keyframes floatCrystal {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); opacity: 0.3; }
            25% { transform: translate(50px, 30px) rotate(90deg) scale(1.1); opacity: 0.5; }
            50% { transform: translate(0, 60px) rotate(180deg) scale(0.9); opacity: 0.7; }
            75% { transform: translate(-50px, 30px) rotate(270deg) scale(1.05); opacity: 0.5; }
            100% { transform: translate(0, 0) rotate(360deg) scale(1); opacity: 0.3; }
        }

        /* Fire Glow Effect */
        .fire-glow {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(238, 88, 63, 0.6) 0%, rgba(238, 88, 63, 0) 70%);
            border-radius: 50%;
            filter: blur(30px);
            z-index: -2;
            animation: pulseGlow 4s ease infinite alternate;
        }

        @keyframes pulseGlow {
            0% { transform: scale(0.8); opacity: 0.3; }
            100% { transform: scale(1.2); opacity: 0.7; }
        }

        /* Confetti Canvas */
        #confetti-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -4;
            pointer-events: none;
        }

        /* Remember Me Checkbox */
        .remember-me {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transform: translateZ(20px);
        }

        .custom_check {
            position: relative;
            padding-left: 35px;
            margin-right: 15px;
        }

        .custom_check input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 22px;
            width: 22px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .custom_check:hover .checkmark {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .custom_check input:checked ~ .checkmark {
            background-color: #4ecca3;
            border-color: #4ecca3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom_check input:checked ~ .checkmark:after {
            display: block;
        }

        .custom_check .checkmark:after {
            left: 8px;
            top: 4px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }

        .forgot-link {
            color: #4ecca3;
            text-decoration: none;
            transition: all 0.3s;
            transform: translateZ(20px);
        }

        .forgot-link:hover {
            color: #fff;
            text-shadow: 0 0 12px #4ecca3;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            transform-style: preserve-3d;
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="floating-element" style="width: 120px; height: 120px; top: 15%; left: 10%;"></div>
    <div class="floating-element" style="width: 180px; height: 180px; bottom: 15%; right: 10%; animation-delay: 0.5s;"></div>
    <div class="floating-element" style="width: 100px; height: 100px; top: 50%; left: 20%; animation-delay: 1s;"></div>

    <!-- Crystal Elements -->
    <div class="crystal" style="width: 80px; height: 80px; top: 20%; right: 15%; animation-delay: 2s;"></div>
    <div class="crystal" style="width: 60px; height: 60px; bottom: 25%; left: 15%; animation-delay: 3s;"></div>

    <!-- Fire Glow -->
    <div class="fire-glow" style="top: 30%; left: 80%;"></div>

    <!-- Dragon Canvas -->
    <canvas id="dragonCanvas" class="dragon-canvas"></canvas>

    <!-- Particles -->
    <div id="particles-js"></div>

    <!-- Confetti Canvas -->
    <canvas id="confetti-canvas"></canvas>

    <!-- Audio Elements -->
    <audio id="successSound" class="audio-controls">
        <source src="https://assets.mixkit.co/sfx/preview/mixkit-correct-answer-tone-2870.mp3" type="audio/mpeg">
    </audio>
    <audio id="errorSound" class="audio-controls">
        <source src="https://assets.mixkit.co/sfx/preview/mixkit-wrong-answer-fail-notification-946.mp3" type="audio/mpeg">
    </audio>
    <audio id="hoverSound" class="audio-controls">
        <source src="https://assets.mixkit.co/sfx/preview/mixkit-select-click-1109.mp3" type="audio/mpeg">
    </audio>
    <audio id="backgroundMusic" loop class="audio-controls">
        <source src="https://assets.mixkit.co/music/preview/mixkit-tech-house-vibes-130.mp3" type="audio/mpeg">
    </audio>
    <audio id="welcomeSound" class="audio-controls">
        <source src="https://assets.mixkit.co/sfx/preview/mixkit-achievement-bell-600.mp3" type="audio/mpeg">
    </audio>

    <!-- Feedback Messages -->
    <div class="login-feedback success">
        <i class="fas fa-check-circle"></i>
        <p>Login Successful! Welcome!</p>
    </div>
    <div class="login-feedback error">
        <i class="fas fa-times-circle"></i>
        <p id="errorMessage">Incorrect credentials. Please try again.</p>
    </div>

    <!-- Main Login Form -->
    <div class="login-container">
        <div class="glass-card">
            <div class="login-header">
                <div class="logo-3d">
                    <i class="fas fa-dragon"></i>
                </div>
                <h1>Dragon Admin Portal</h1>
                <p>Enter your credentials to continue</p>
            </div>

            <form id="loginForm" class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Username or Email</label>
                    <input type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" placeholder="Enter your username or email" required>
                    <span class="password-toggle"><i class="fas fa-user"></i></span>
                </div>

                <div class="form-group" style="position: relative;">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="passwordInput" placeholder="Enter your password" required>
                    <span class="password-toggle" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <div class="form-footer">
                    <label class="remember-me custom_check"> Remember me
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                    </label>
                    <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-3d">
                        <i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i> Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        // Initialize particles
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 100, "density": { "enable": true, "value_area": 1000 } },
                "color": { "value": ["#4ecca3", "#ff4757", "#1da1f2"] },
                "shape": { "type": ["circle", "star"], "stroke": { "width": 0 } },
                "opacity": { "value": 0.6, "random": true, "anim": { "enable": true, "speed": 1, "opacity_min": 0.2 } },
                "size": { "value": 4, "random": true, "anim": { "enable": true, "speed": 20, "size_min": 0.2 } },
                "line_linked": { "enable": true, "distance": 150, "color": "#4ecca3", "opacity": 0.5, "width": 1.5 },
                "move": {
                    "enable": true,
                    "speed": 3,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": { "enable": true, "mode": "grab" },
                    "onclick": { "enable": true, "mode": "push" },
                    "resize": true
                },
                "modes": {
                    "grab": { "distance": 150, "line_linked": { "opacity": 1 } },
                    "bubble": { "distance": 300, "size": 50, "duration": 2, "opacity": 8 },
                    "repulse": { "distance": 200, "duration": 0.4 },
                    "push": { "particles_nb": 5 },
                    "remove": { "particles_nb": 2 }
                }
            },
            "retina_detect": true
        });

        // Dragon animation
        const dragonCanvas = document.getElementById('dragonCanvas');
        const dragonCtx = dragonCanvas.getContext('2d');
        dragonCanvas.width = 350;
        dragonCanvas.height = 250;

        let frameCount = 0;
        const dragonParts = [
            { x: 120, y: 120, size: 25, color: '#4ecca3' },
            { x: 150, y: 130, size: 35, color: '#3aa789' },
            { x: 190, y: 125, size: 40, color: '#2e8b57' },
            { x: 230, y: 130, size: 35, color: '#3aa789' },
            { x: 260, y: 120, size: 25, color: '#4ecca3' }
        ];

        function animateDragon() {
            dragonCtx.clearRect(0, 0, dragonCanvas.width, dragonCanvas.height);

            for (let i = 0; i < dragonParts.length; i++) {
                const part = dragonParts[i];
                const waveOffset = Math.sin(frameCount * 0.06 + i * 0.6) * 15;

                dragonCtx.beginPath();
                dragonCtx.arc(part.x, part.y + waveOffset, part.size, 0, Math.PI * 2);
                dragonCtx.fillStyle = part.color;
                dragonCtx.fill();
                dragonCtx.closePath();

                if (i > 0) {
                    dragonCtx.beginPath();
                    dragonCtx.moveTo(dragonParts[i-1].x, dragonParts[i-1].y + waveOffset);
                    dragonCtx.lineTo(part.x, part.y + waveOffset);
                    dragonCtx.strokeStyle = part.color;
                    dragonCtx.lineWidth = 12;
                    dragonCtx.stroke();
                    dragonCtx.closePath();
                }
            }

            const wingFlap = Math.sin(frameCount * 0.12) * 25;
            dragonCtx.beginPath();
            dragonCtx.moveTo(170, 120);
            dragonCtx.quadraticCurveTo(140, 90 - wingFlap, 110, 100);
            dragonCtx.quadraticCurveTo(140, 80 - wingFlap, 170, 120);
            dragonCtx.fillStyle = 'rgba(78, 204, 163, 0.7)';
            dragonCtx.fill();

            dragonCtx.beginPath();
            dragonCtx.moveTo(170, 120);
            dragonCtx.quadraticCurveTo(200, 90 - wingFlap, 230, 100);
            dragonCtx.quadraticCurveTo(200, 80 - wingFlap, 170, 120);
            dragonCtx.fill();

            dragonCtx.beginPath();
            dragonCtx.arc(110, 110, 6, 0, Math.PI * 2);
            dragonCtx.fillStyle = '#fff';
            dragonCtx.fill();

            frameCount++;
            requestAnimationFrame(animateDragon);
        }

        animateDragon();

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('passwordInput');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
            playHoverSound();
        });

        // Audio elements
        const successSound = document.getElementById('successSound');
        const errorSound = document.getElementById('errorSound');
        const hoverSound = document.getElementById('hoverSound');
        const backgroundMusic = document.getElementById('backgroundMusic');
        const welcomeSound = document.getElementById('welcomeSound');

        // Play sounds
        function playSuccessSound() {
            successSound.currentTime = 0;
            successSound.play();
        }

        function playWelcomeSound() {
            welcomeSound.currentTime = 0;
            welcomeSound.play();
            // Speak welcome message
            if ('speechSynthesis' in window) {
                const speech = new SpeechSynthesisUtterance();
                speech.text = "Welcome! Login successful.";
                speech.volume = 1;
                speech.rate = 0.9;
                speech.pitch = 1;
                window.speechSynthesis.speak(speech);
            }
        }

        function playErrorSound() {
            errorSound.currentTime = 0;
            errorSound.play();
        }

        function playHoverSound() {
            hoverSound.currentTime = 0;
            hoverSound.volume = 0.3;
            hoverSound.play();
        }

        // Start background music (muted by default)
        backgroundMusic.volume = 0.2;
        // backgroundMusic.play().catch(e => console.log("Auto-play prevented:", e));

        // Show feedback message
        function showFeedback(isSuccess, message = null) {
            const successElement = document.querySelector('.login-feedback.success');
            const errorElement = document.querySelector('.login-feedback.error');
            const errorMessageElement = document.getElementById('errorMessage');

            if (isSuccess) {
                playSuccessSound();
                setTimeout(playWelcomeSound, 800); // Play welcome sound after a slight delay
                successElement.classList.add('show');
                setTimeout(() => {
                    successElement.classList.remove('show');
                }, 2000);

                // Confetti effect
                const duration = 3 * 1000;
                const animationEnd = Date.now() + duration;
                const colors = ['#4ecca3', '#2e8b57', '#ff4757', '#ffffff', '#1da1f2'];

                function frame() {
                    confetti({
                        particleCount: 100,
                        angle: randomInRange(55, 125),
                        spread: randomInRange(50, 70),
                        origin: { x: randomInRange(0.1, 0.9), y: randomInRange(0.1, 0.9) },
                        colors: colors,
                        zIndex: 1000
                    });

                    if (Date.now() < animationEnd) {
                        requestAnimationFrame(frame);
                    }
                }

                function randomInRange(min, max) {
                    return Math.random() * (max - min) + min;
                }

                frame();
            } else {
                playErrorSound();
                if (message) {
                    errorMessageElement.textContent = message;
                }
                errorElement.classList.add('show');
                setTimeout(() => {
                    errorElement.classList.remove('show');
                }, 2000);
            }
        }

        // Check for Laravel validation errors
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', () => {
                showFeedback(false, "{{ implode(' ', $errors->all()) }}");
            });
        @endif

        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = this.querySelector('[name="identity"]').value;
            const password = this.querySelector('[name="password"]').value;

            // Basic client-side validation
            if (username.length === 0 || password.length === 0) {
                e.preventDefault();
                showFeedback(false, "Please fill in all fields.");
            }
            // Note: Actual login validation happens on the server side
            // The success feedback will be shown after server validation
        });

        // This would typically be in your Laravel view after successful login
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', () => {
                showFeedback(true);
            });
        @endif

        // Interactive hover effects
        const interactiveElements = document.querySelectorAll('.btn-3d, .password-toggle, a, input, .logo-3d, .custom_check');
        interactiveElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                playHoverSound();
            });
        });

        // 3D tilt effect
        const card = document.querySelector('.glass-card');
        document.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        // Reset position when mouse leaves
        document.addEventListener('mouseleave', () => {
            card.style.transform = 'rotateY(0deg) rotateX(0deg)';
        });
    </script>
</body>
</html> --}}



