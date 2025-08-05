<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Daftar Siswa</h2>
                <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa Baru</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($siswas as $siswa)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $siswa->nama_lengkap }}</td>
        <td>{{ $siswa->nis }}</td>
        <td>{{ $siswa->kelas }}</td>
        <td>
            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
@empty
    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>