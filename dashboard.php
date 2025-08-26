<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Queen's</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root{
            --primary:#0d6efd;       /* azul bootstrap */
            --accent:#ff2f40;        /* fucsia/rosado del empaque */
            --dark:#111111;          /* negro */
            --soft-pink:#ffe3f0;     /* fondo suave */
            }

        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background: linear-gradient(135deg, var(--primary), var(--accent)); 
            color: white;
            padding: 1rem;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.5rem;
        }
        .sidebar a:hover {
            background: linear-gradient(135deg, var(--primary), var(--accent)); 
        }
        .content {
            padding: 2rem;
        }
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--accent)); 
            color: white;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <h4>Queen's Dashboard</h4>
            <a href="#">Inicio</a>
            <a href="#">Usuarios</a>
            <a href="#">Configuración</a>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
        <div class="flex-grow-1">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#">Bienvenido, <?php echo $_SESSION['username']; ?></a>
                </div>
            </nav>
            <div class="content">
                <h2>Panel Principal</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h5>Estadísticas</h5>
                            <p>Usuarios activos: 100</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h5>Noticias</h5>
                            <p>Última actualización: Hoy</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h5>Tareas</h5>
                            <p>Pendientes: 5</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>