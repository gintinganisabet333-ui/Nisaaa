<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa | Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <b>Data Siswa</b>
            <a href="/student/add" class="btn btn-primary btn-sm float-right">+ Tambah</a>
        </div>
        <div class="card-body">

            @if(session('notifikasi'))
                <div class="alert alert-{{ session('type') }}">
                    {{ session('notifikasi') }}
                </div>
            @endif

            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <td>No.</td>
                        <td>NIM</td>
                        <td>Nama</td>
                        <td>Prodi</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->nim }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->prodi }}</td>
                            <td>
                                <a href="/student/edit/{{ $data->nim }}"
                                   class="btn btn-sm btn-warning">Edit</a>

                                <form method="POST"
                                      action="/student/delete/{{ $data->nim }}"
                                      style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Tidak ada data untuk ditampilkan!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>