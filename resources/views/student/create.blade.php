<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Siswa | Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <b>Tambah Siswa</b>
            <a href="/student" class="btn btn-danger btn-sm float-right">Kembali</a>
        </div>

        <form action="/student/add" method="POST">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>NIM <b class="text-danger">*</b></label>
                    <input type="text" name="nim"
                           placeholder="Masukkan NIM"
                           class="form-control @error('nim') is-invalid @enderror"
                           value="{{ old('nim') }}">
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama <b class="text-danger">*</b></label>
                    <input type="text" name="nama"
                           placeholder="Masukkan Nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>E-Mail <b class="text-danger">*</b></label>
                    <input type="email" name="email"
                           placeholder="Masukkan E-Mail"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Prodi <b class="text-danger">*</b></label>
                    <select name="prodi"
                            class="form-control @error('prodi') is-invalid @enderror">
                        <option value="">- Pilih Prodi -</option>
                        <option>Teknik Informatika</option>
                        <option>Teknik Rekayasa Keamanan Siber</option>
                        <option>Teknik Rekayasa Perangkat Lunak</option>
                    </select>
                    @error('prodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <a href="/student" class="btn btn-danger">Batal</a>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>

    </div>
</div>
</body>
</html>