<?php
    include 'Blog.php';

    $blog = new Blog();
    $show = $blog->select();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blogs</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    </head>

    <body>
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="container">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Blog List</h4>
                    </div>

                    <div class="panel-body">
                        <a href="crud/tambah.php" class="btn btn-success">
                          <span class="glyphicon glyphicon-folder-open"></span> &nbsp;Tambah Data
                        </a>
                        <hr>
                        <?php
                            while ($data = $show->fetch(PDO::FETCH_OBJ)) {
                        ?>
                                <a href="crud/tampil.php?id=<?= $data->id ?>"><h2><?= $data->judul ?></h2></a>
                                <p><?= substr($data->deskripsi, 0, 600) ?>...</p>
                                <a href="crud/tampil.php?id=<?= $data->id ?>" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-log-in"></span> Lihat Selengkapnya
                                </a>
                                <a href="crud/edit.php?id=<?= $data->id ?>" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                </a>
                                <a href="crud/hapus.php?id=<?= $data->id ?>" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Hapus
                                </a>
                                <hr>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
