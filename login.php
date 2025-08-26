<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Queen's</title>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root{
            --primary:#0d6efd;       /* azul bootstrap */
            --accent:#ff2f40;        /* fucsia/rosado del empaque */
            --dark:#111111;          /* negro */
            --soft-pink:#ffe3f0;     /* fondo suave */
            }
        .bg-gradient-primary{ background: linear-gradient(135deg, var(--primary), var(--accent)); }
        .bg-soft-pink{ background: var(--soft-pink); }
        .bg-body{ background: #f6f7fb; }
        .text-body{ color:#222; }
        .card.shortcut{ border:0; border-radius:1rem; box-shadow:0 8px 24px rgba(0,0,0,.08); }
        .card.shortcut .card-title{ color: var(--primary); }
        .btn-primary{ background-color: var(--primary); border-color: var(--primary); }
.btn-primary:hover{ filter: brightness(0.95); }
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: white;
        }
        .login-card h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-color: #ffffffff;
        }
        .form-control:focus {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.97);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Login Queen's</h2>
        <?php
        session_start();
        include 'config.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = $_POST['password'];

            // Validation: Check if fields are empty
            if (empty($username) || empty($password)) {
                echo '<div class="alert alert-danger">Por favor, completa todos los campos.</div>';
            } else {
                $sql = "SELECT * FROM users WHERE username = '$username'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $username;
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        echo '<div class="alert alert-danger">Contraseña incorrecta.</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Usuario no encontrado.</div>';
                }
            }
        }
        ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>

    
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>