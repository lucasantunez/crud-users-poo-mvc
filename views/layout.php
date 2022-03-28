<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CURD Usuario</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/css/adminlte.min.css">
</head>

<body class="layout-top-nav" style="height: auto;">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <span class="brand-text font-weight-light">CRUD USUARIOS</span>
                </a>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <?php if($_SESSION['login']): ?>
                                <?= $_SESSION['user_name'] ?>
                            <?php endif; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item">
                                Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>        

        <?= $content ?>

        <footer class="main-footer">
            <strong>Lucas Antunez - Desarrollador Web</strong>
        </footer>
    </div>

    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminlte.min.js"></script>

</body>