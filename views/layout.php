<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Usuarios</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <header>
            <nav class="main-header navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container">
                    <a href="/" class="navbar-brand">
                        <span class="brand-text font-weight-light">CRUD-POO-MVC</span>
                    </a>
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                Usuario
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="/logout" class="dropdown-item">
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <?= $content ?>

        <footer class="footer fixed-bottom navbar-dark bg-dark mt-auto py-3">
            <div class="container">
                <span class="text-muted">Lucas Antunez - Desarrollador Web</span>
            </div>
        </footer>
    </div>

    <script src="/js/jQuery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>