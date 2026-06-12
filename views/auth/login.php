<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | AgroStock</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary-color: #059669;
            /* Verde Esmeralda */
            --primary-dark: #047857;
            --accent-color: #fbbf24;
            /* Ámbar */
            --text-main: #1e293b;
            /* Pizarra Oscuro */
            --text-muted: #64748b;
            --bg-light: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-main);
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .brand-logo {
            font-family: 'Outfit', sans-serif;
        }

        /* Background Shapes */
        .bg-shapes {
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
            top: -20%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
        }

        .shape-2 {
            position: absolute;
            bottom: -20%;
            right: -10%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            padding: 50px;
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-main);
            text-decoration: none;
            display: inline-block;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 12px;
            padding: 14px 20px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background-color: #f8fafc;
            font-size: 1rem;
            transition: all 0.1s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.15);
            border-color: var(--primary-color);
            background-color: #fff;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 14px 20px;
            border-radius: 12px;
            border: none;
            width: 100%;
            transition: all 0.1s;
            margin-top: 10px;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(5, 150, 105, 0.2);
            color: white;
        }

        .back-link {
            position: absolute;
            top: 30px;
            left: 30px;
            color: var(--text-main);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .back-link:hover {
            color: var(--primary-color);
            background: rgba(255, 255, 255, 1);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(5, 150, 105, 0.15);
        }

        .back-link i {
            transition: transform 0.3s ease;
        }

        .back-link:hover i {
            transform: translateX(-4px);
        }

        .text-accent {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .text-accent:hover {
            color: var(--primary-dark);
        }

        @media (max-width: 576px) {
            .auth-card {
                padding: 40px 25px;
                margin: 20px;
                border-radius: 20px;
            }

            .back-link {
                top: 20px;
                left: 20px;
            }
        }
    </style>
</head>

<body>

    <a href="../../public/index.php" class="back-link animate__animated animate__fadeIn">
        <i class="bi bi-arrow-left me-2"></i> Volver al Inicio
    </a>

    <div class="bg-shapes">
        <div class="shape-1 animate__animated animate__pulse animate__infinite animate__slower"></div>
        <div class="shape-2 animate__animated animate__pulse animate__infinite animate__slower"></div>
    </div>

    <div class="auth-card animate__animated animate__fadeInUp">
        <div class="text-center">
            <a href="../../public/index.php" class="brand-logo">
                <i class="bi bi-box-seam-fill me-2 text-success"></i> AgroStock<span class="text-success">.</span>
            </a>
            <h2 class="fw-bold mb-2">Bienvenido de nuevo</h2>
            <p class="text-muted mb-4">Ingresa tus credenciales para acceder a tu cuenta.</p>
        </div>

        <form action="#" method="POST">
            <div class="mb-4">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted"><i
                            class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control border-start-0 ps-0" id="email" name="email"
                        placeholder="tu@correo.com" required>
                </div>
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="password" class="form-label mb-0">Contraseña</label>
                    <a href="#" class="text-accent small fw-medium">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control border-start-0 ps-0" id="password" name="password"
                        placeholder="••••••••" required>
                </div>
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label text-muted" for="remember">Recordarme por 30 días</label>
            </div>

            <button type="submit" class="btn btn-primary-custom">
                Iniciar Sesión <i class="bi bi-box-arrow-in-right ms-2"></i>
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="text-muted mb-0">¿No tienes una cuenta? <a href="register.php" class="text-accent">Regístrate
                    aquí</a></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php if (isset($_SESSION['success'])): ?>
        <script>
            Swal.fire({
                title: "¡Éxito!",
                text: "<?= $_SESSION['success'] ?>",
                icon: "success",
                draggable: true
            });
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <script>
            Swal.fire({
                title: "Error",
                text: "<?= $_SESSION['error'] ?>",
                icon: "error",
                draggable: true
            });
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
</body>

</html>