<?php $result = $_GET['result'] ?? null; ?>

<div class="content-wrapper" style="min-height: 222px;">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 mb-2"> Usuarios</h1>
                </div>
                <div class="col-md-12">
                <?php 
                    $msg = showMessage(intval($result));
                    if($msg) { ?>
                        <div class="alert alert-success text-center" role="alert">
                            <strong><?= s($msg); ?></strong>
                        </div>
                    <?php } 
                ?>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Usuarios </h3>
                            <a class="float-right btn btn-primary btn-sm" href="/users/create">Nuevo</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $user->id ?></td>
                                            <td><?= $user->name ?></td>
                                            <td><?= $user->last_name ?></td>
                                            <td><?= $user->email ?></td>
                                            <td class="text-center">
                                                <form action="/users/delete?id=<?= $user->id ?>" method="POST">
                                                    <a class="btn btn-warning btn-sm" href="/users/update?id=<?= $user->id ?>"><i class="fas fa-pencil-alt"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>