<?php
$rol = $_SESSION['user_rol'];
$admin = false;
if ($rol === 1) {
    $admin = true;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubsales</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <div class="contenedor">
        <div class="sidebar">
            <header class="sidebar_header">
                <div class="sidebar_image">
                    <img src="/build/img/logo_1.jpg" alt="sidebar image">
                </div>
            </header>
            <ul class="menu_links">
                <?php if ($admin) : ?>
                    <li class="menu_item">
                        <a class="menu_link" href="/general">
                            <span class="menu_text">General</span>
                            <i class="fa-solid fa-house menu_icon"></i>
                        </a>
                    </li>
                    <li class="menu_item">
                        <a class="menu_link" href="/usuarios">
                            <span class="menu_text">Usuarios</span>
                            <i class="fa-solid fa-user-group menu_icon"></i>
                        </a>
                    </li>
                <?php endif ?>
                <li class="menu_item">
                    <a class="menu_link" href="/productos">
                        <span class="menu_text">Productos</span>
                        <i class="fa-solid fa-cart-shopping menu_icon"></i>
                    </a>
                </li>
                <li class="menu_item">
                    <a class="menu_link" href="/clientes">
                        <span class="menu_text">Clientes</span>
                        <i class="fa-solid fa-user menu_icon"></i>
                    </a>
                </li>
                <li class="menu_item">
                    <a class="menu_link" href="/facturas">
                        <span class="menu_text">Facturas</span>
                        <i class="fa-solid fa-receipt menu_icon"></i>
                    </a>
                </li>
            </ul>
            <div class="sidebar_footer">
                <div class="user">
                    <a href="/logout">
                        <i class="fa-solid fa-right-from-bracket user_logout" id="user_logout"></i>
                    </a>
                    <p class="user_name">Sara Gonzales</p>
                </div>
            </div>
        </div>
        <div class="app .transition">
            <?php echo $contenido; ?>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/c36f3a940c.js" crossorigin="anonymous"></script>
    <script src="/build/js/app.js"></script>
</body>

</html>