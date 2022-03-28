<div class="content-wrapper" style="min-height: 222px;">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Usuarios</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Actualizar Usuario </h3>
                        </div>
                        <div class="card-body">

                            <?php foreach ($errors as $error) : ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <strong><?= $error; ?></strong>
                                </div>
                            <?php endforeach; ?>

                            <form method="POST">
                                <?php include __DIR__ . '/form.php'; ?>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>