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
                <a href="{{ route('siswa.tambah') }}" class="btn btn-primary">Tambah Siswa Baru</a>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data siswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>