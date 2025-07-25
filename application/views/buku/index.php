<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku | Perpustakaan Buku Digital</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Daftar Buku</h2>
    <form class="form-inline mb-3" method="get" action="<?= site_url('buku') ?>">
        <input type="text" name="q" class="form-control mr-2" placeholder="Cari judul/pengarang" value="<?= htmlspecialchars($search ?? '') ?>">
        <button class="btn btn-primary" type="submit">Cari</button>
        <a href="<?= site_url('buku/tambah') ?>" class="btn btn-success ml-2">Tambah Buku</a>
        <a href="<?= site_url('logout') ?>" class="btn btn-secondary ml-2">Logout</a>
    </form>
    <?php if (!empty($buku)): ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Deskripsi</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($buku as $i => $b): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= htmlspecialchars($b['judul']) ?></td>
                <td><?= htmlspecialchars($b['pengarang']) ?></td>
                <td><?= htmlspecialchars($b['tahun_terbit']) ?></td>
                <td><?= htmlspecialchars($b['deskripsi']) ?></td>
                <td>
                    <?php if ($b['file_buku']): ?>
                        <a href="<?= base_url('uploads/'.$b['file_buku']) ?>" target="_blank">Download</a>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= site_url('buku/edit/'.$b['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= site_url('buku/hapus/'.$b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pagination ?>
    <?php else: ?>
        <div class="alert alert-info">Tidak ada data buku.</div>
    <?php endif; ?>
</div>
</body>
</html> 