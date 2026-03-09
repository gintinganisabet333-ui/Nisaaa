<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Calon Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Data Calon Mahasiswa</h2>
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>nis</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>File Pendukung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $query = mysqli_query($koneksi, "SELECT * FROM calon_mhs");
            while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $data['nis']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['jk']; ?></td>
                <td><?= $data['telepon']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td><img src="uploads/<?= $data['foto']; ?>" alt="Foto" width="100"></td>
                <td><a href="uploads/<?= $data['file_pendukung']; ?>" target="_blank" class="btn btn-primary btn-sm">Download</a></td>
                <td>
                    <button class="btn btn-warning btn-sm btn-edit" 
                        data-nis="<?= $data['nis']; ?>" 
                        data-nama="<?= $data['nama']; ?>" 
                        data-jk="<?= $data['jk']; ?>" 
                        data-telepon="<?= $data['telepon']; ?>" 
                        data-alamat="<?= $data['alamat']; ?>" 
                        data-foto="<?= $data['foto']; ?>" 
                        data-file_pendukung="<?= $data['file_pendukung']; ?>">Edit</button>
                    <a href="hapus.php?nis=<?= $data['nis']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="tambah.php" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jk" name="jk" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                    <div class="mb-3">
                        <label for="file_pendukung" class="form-label">File Pendukung</label>
                        <input type="file" class="form-control" id="file_pendukung" name="file_pendukung" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="ubah.php" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editNis" name="nis">
                    <div class="mb-3">
                        <label for="editNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJk" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="editJk" name="jk" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editTelepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="editTelepon" name="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAlamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="editAlamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini</label><br>
                        <img id="editFotoPreview" src="" alt="Foto" width="150" class="mb-3 border rounded">
                        <label for="editFoto" class="form-label">Ganti Foto</label>
                        <input type="file" class="form-control" id="editFoto" name="foto">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File Pendukung Saat Ini</label><br>
                        <a id="editFilePreview" href="#" target="_blank" class="btn btn-primary mb-3">Lihat File</a><br>
                        <label for="editFilePendukung" class="form-label">Ganti File Pendukung</label>
                        <input type="file" class="form-control" id="editFilePendukung" name="file_pendukung">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        document.getElementById('editNis').value = this.dataset.nis;
        document.getElementById('editNama').value = this.dataset.nama;
        document.getElementById('editJk').value = this.dataset.jk;
        document.getElementById('editTelepon').value = this.dataset.telepon;
        document.getElementById('editAlamat').value = this.dataset.alamat;

        const fotoPath = 'uploads/' + this.dataset.foto;
        const fotoPreview = document.getElementById('editFotoPreview');
        fotoPreview.src = fotoPath;

        const filePath = 'uploads/' + this.dataset.file_pendukung;
        const filePreview = document.getElementById('editFilePreview');
        filePreview.href = filePath;

        new bootstrap.Modal(document.getElementById('editModal')).show();
    });
});
</script>
</body>
</html>