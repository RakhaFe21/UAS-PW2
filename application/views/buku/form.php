<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($buku) ? 'Edit' : 'Tambah' ?> Buku | Perpustakaan Buku Digital</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2><?= isset($buku) ? 'Edit' : 'Tambah' ?> Buku</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= isset($buku) ? htmlspecialchars($buku['judul']) : '' ?>" required>
        </div>
        <div class="form-group">
            <label>Pengarang</label>
            <input type="text" name="pengarang" class="form-control" value="<?= isset($buku) ? htmlspecialchars($buku['pengarang']) : '' ?>" required>
        </div>
        <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control" value="<?= isset($buku) ? htmlspecialchars($buku['tahun_terbit']) : '' ?>" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= isset($buku) ? htmlspecialchars($buku['deskripsi']) : '' ?></textarea>
        </div>
        <div class="form-group">
            <label>File Buku (PDF)</label>
            <input type="file" name="file_buku" class="form-control-file" <?= isset($buku) ? '' : 'required' ?>>
            <?php if (isset($buku) && $buku['file_buku']): ?>
                <small>File saat ini: <a href="<?= base_url('uploads/'.$buku['file_buku']) ?>" target="_blank">Download</a></small>
            <?php endif; ?>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="<?= site_url('buku') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html> 