<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroStock | Sistema de Gestión Premium</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">
    <!-- Animate.css para animaciones fluidas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        :root {
            --primary-color: #059669; /* Verde Esmeralda */
            --primary-dark: #047857;
            --accent-color: #fbbf24; /* Ámbar */
            --accent-hover: #f59e0b;
            --text-main: #1e293b; /* Pizarra Oscuro */
            --text-muted: #64748b;
            --bg-light: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-main);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand {
            font-family: 'Outfit', sans-serif;
        }

        /* Glassmorphism Navbar */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            padding: 15px 0;
        }
        
        .navbar-custom.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 10px 0;
        }

        .navbar-brand {
            color: var(--primary-dark) !important;
            font-size: 1.6rem;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: var(--text-main) !important;
            font-weight: 500;
            margin: 0 12px;
            position: relative;
            transition: color 0.3s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 80%;
        }

        .btn-nav-login {
            background-color: var(--primary-color);
            color: white !important;
            border-radius: 50px;
            padding: 10px 28px;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
        }

        .btn-nav-login:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
        }

        /* Hero Section Moderno */
        .hero-section {
            position: relative;
            padding: 180px 0 120px;
            background: #ffffff;
            overflow: hidden;
            z-index: 1;
        }

        .hero-bg-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .shape-1 {
            position: absolute;
            top: -10%;
            right: -5%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(16,185,129,0.08) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        .shape-2 {
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(251,191,36,0.05) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            background: linear-gradient(135deg, var(--text-main) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1.5px;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin-bottom: 40px;
            line-height: 1.7;
        }

        .btn-primary-custom {
            background-color: var(--accent-color);
            color: #1e293b;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 16px 40px;
            border-radius: 50px;
            border: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            z-index: 1;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 0%; height: 100%;
            background-color: var(--accent-hover);
            transition: all 0.4s ease;
            z-index: -1;
        }

        .btn-primary-custom:hover::before {
            width: 100%;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(251, 191, 36, 0.4);
            color: #1e293b;
        }

        .hero-image-wrapper {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
            transition: transform 0.5s ease;
        }

        .hero-image-wrapper:hover {
            transform: perspective(1000px) rotateY(0) rotateX(0);
        }

        .hero-image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Features / Cards Interactivas */
        .features-section {
            padding: 100px 0;
            background-color: var(--bg-light);
            position: relative;
        }

        .section-tag {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(5, 150, 105, 0.1);
            color: var(--primary-dark);
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-main);
        }

        .feature-card {
            background: white;
            border-radius: 24px;
            padding: 45px 35px;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.03);
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.04);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .feature-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(5,150,105,0.03) 0%, rgba(255,255,255,0) 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .feature-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px -12px rgba(5, 150, 105, 0.15);
            border-color: rgba(5, 150, 105, 0.1);
        }

        .feature-card:hover::after {
            opacity: 1;
        }

        .icon-wrapper {
            width: 75px;
            height: 75px;
            background: rgba(5, 150, 105, 0.1);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            color: var(--primary-color);
            font-size: 2.2rem;
            transition: all 0.3s;
        }

        .feature-card:hover .icon-wrapper {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1) rotate(8deg);
        }

        .feature-card h4 {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--text-main);
        }

        .feature-card p {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Footer Elegante */
        .footer {
            background-color: #0f172a; /* Slate 900 */
            color: white;
            padding: 80px 0 30px;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        .footer-brand {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: white;
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            color: white;
            margin-right: 12px;
            transition: all 0.3s;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(5, 150, 105, 0.3);
        }

        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s, padding-left 0.3s;
            display: inline-block;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        @media (max-width: 991px) {
            .hero-title {
                font-size: 3rem;
            }
            .hero-section {
                padding: 130px 0 80px;
            }
            .hero-image-wrapper {
                margin-top: 50px;
                transform: none;
            }
            .navbar-custom {
                background: rgba(255, 255, 255, 0.98);
            }
        }
    </style>
</head>
<body>

    <!-- Navegación Glassmorphism -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <i class="bi bi-box-seam-fill me-2 text-success"></i> AgroStock<span class="text-success">.</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-1 text-dark"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#soluciones">Soluciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#beneficios">Beneficios</a>
                    </li>
                </ul>
                <div class="d-flex mt-3 mt-lg-0 align-items-center justify-content-center">
                    <a href="../views/auth/login.php" class="btn btn-nav-login shadow-sm">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Hero Moderno -->
    <header class="hero-section">
        <div class="hero-bg-shapes">
            <div class="shape-1 animate__animated animate__pulse animate__infinite animate__slower"></div>
            <div class="shape-2 animate__animated animate__pulse animate__infinite animate__slower"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <!-- Textos -->
                <div class="col-lg-6 mb-5 mb-lg-0 animate__animated animate__fadeInLeft">
                    <span class="section-tag mb-3">Software Premium 2024</span>
                    <h1 class="hero-title">El futuro de tu gestión agrícola</h1>
                    <p class="hero-subtitle">Transforma la manera en que administras tus inventarios de insumos y ventas. Precisión, velocidad y control total en una plataforma SaaS diseñada a tu medida.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="../views/auth/login.php" class="btn btn-primary-custom">
                            Comenzar ahora <i class="bi bi-arrow-right ms-2 fw-bold"></i>
                        </a>
                    </div>
                    <div class="mt-5 d-flex flex-wrap align-items-center gap-4 text-muted fw-medium">
                        <div><i class="bi bi-shield-check text-success me-2 fs-5 align-middle"></i>Datos Seguros</div>
                        <div><i class="bi bi-lightning-charge-fill text-warning me-2 fs-5 align-middle"></i>Rápido</div>
                        <div><i class="bi bi-phone text-success me-2 fs-5 align-middle"></i>Responsivo</div>
                    </div>
                </div>
                <!-- Imagen -->
                <div class="col-lg-6 animate__animated animate__fadeInRight animate__delay-1s">
                    <div class="hero-image-wrapper">
                        <!-- Imagen abstracta premium relacionada con agricultura/tecnología -->
                        <img src="img/dashboard-mockup.png" alt="Dashboard Agrícola" class="img-fluid rounded shadow-sm">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sección de Soluciones (Cards Glass & Shadows) -->
    <section id="soluciones" class="features-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-lg-8 text-center animate__animated animate__fadeInUp">
                    <span class="section-tag">Nuestras Soluciones</span>
                    <h2 class="section-title">Diseñado para la eficiencia total</h2>
                    <p class="text-muted fs-5">Cada módulo de AgroStock está pensado cuidadosamente para simplificar tu trabajo diario, reducir errores y potenciar el crecimiento de tu negocio.</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Tarjeta 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper shadow-sm">
                            <i class="bi bi-boxes"></i>
                        </div>
                        <h4>Inventario Inteligente</h4>
                        <p>Control exacto de existencias. Recibe alertas tempranas de stock mínimo, caducidad y gestiona lotes de semillas, fertilizantes y químicos con seguridad.</p>
                    </div>
                </div>
                <!-- Tarjeta 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper shadow-sm">
                            <i class="bi bi-cart-check-fill"></i>
                        </div>
                        <h4>Punto de Venta Ágil</h4>
                        <p>Procesa transacciones en segundos. Interfaz totalmente optimizada para ventas rápidas, facturación detallada y manejo fluido de clientes.</p>
                    </div>
                </div>
                <!-- Tarjeta 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper shadow-sm">
                            <i class="bi bi-pie-chart-fill"></i>
                        </div>
                        <h4>Analítica Avanzada</h4>
                        <p>Toma decisiones basadas en datos. Visualiza gráficos de rendimiento, productos estrella y reportes financieros en tiempo real desde cualquier lugar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Elegante Dark Mode -->
    <footer class="footer">
        <div class="container">
            <div class="row gy-5 mb-5">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand">
                        <i class="bi bi-box-seam-fill me-2 text-success"></i> AgroStock<span class="text-success">.</span>
                    </div>
                    <p class="text-light opacity-75 pe-lg-4 lh-lg">
                        Elevando el estándar en la administración de negocios de insumos agrícolas con tecnología de vanguardia y diseño excepcional.
                    </p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 offset-lg-1">
                    <h5 class="fw-bold mb-4 text-white">Plataforma</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-3"><a href="#">Inicio</a></li>
                        <li class="mb-3"><a href="#soluciones">Soluciones</a></li>
                        <li class="mb-3"><a href="#">Beneficios</a></li>
                        <li class="mb-3"><a href="../views/auth/login.php">Iniciar Sesión</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-1">
                    <h5 class="fw-bold mb-4 text-white">Contacto Directo</h5>
                    <ul class="list-unstyled text-light opacity-75">
                        <li class="mb-3 d-flex align-items-center">
                            <div class="bg-success bg-opacity-25 p-2 rounded me-3 text-success"><i class="bi bi-envelope-fill"></i></div>
                            soporte@agrostock.com
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <div class="bg-success bg-opacity-25 p-2 rounded me-3 text-success"><i class="bi bi-telephone-fill"></i></div>
                            +1 234 567 8900
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-25 p-2 rounded me-3 text-success"><i class="bi bi-geo-alt-fill"></i></div>
                            Av. Agricultura 123, Distrito Central
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-top border-secondary pt-4 mt-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="mb-2 mb-md-0 text-light opacity-50 small">&copy; 2024 AgroStock. Todos los derechos reservados.</p>
                <p class="mb-0 text-light opacity-50 small">Diseñado con <i class="bi bi-heart-fill text-danger mx-1"></i> para el agro.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para Navbar (Efecto Glassmorphism al hacer scroll) -->
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
