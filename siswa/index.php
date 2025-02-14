<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/DataTables/datatables.min.css">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/siswa">Siswa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/biodata">Biodata</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container" style="padding-top:20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Siswa
                        <a href="/siswa/create.php" class="btn btn-sm btn-info float-md-right">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <th>No</th>
                                    <th>Nomor Induk Siswa</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../database.php';
                                    $siswa = new Siswa();
                                    $no = 1;
                                    foreach ($siswa->index() as $data) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nis']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td>
                                                <a href="show.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Show</a> |
                                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-success">Edit</a> |
                                                <a href="proses.php?id=<?php echo $data['id']; ?>&aksi=delete" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>