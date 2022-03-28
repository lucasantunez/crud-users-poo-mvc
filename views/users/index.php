<div class="content-wrapper" style="min-height: 398px;">

    <div class="content-header">
        <div class="container">
            <div class="row mb-4 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0"> Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
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
                                            <a class="btn btn-warning btn-sm" href="/users/update?id=<?= $user->id ?>">Editar</a>
                                            <input type="submit" class="btn btn-danger btn-sm" value="Borrar">
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