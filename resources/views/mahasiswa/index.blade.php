<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-primary mb-0">📋 Daftar Mahasiswa</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('mahasiswa.exportExcel') }}" class="btn btn-success">
                    <i class="bi bi-file-earmark-excel"></i> Cetak Excel
                </a>
                <a href="{{ route('mahasiswa.cetakPDF') }}" target="_blank" class="btn btn-danger">
                    <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                </a>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Tambah Mahasiswa
                </a>
            </div>
        </div>

        <form action="{{ route('mahasiswa.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama, NIM, atau email..." value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>
                @if(request('search'))
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle"></i> Reset
                </a>
                @endif
            </div>
        </form>

        <div class="card shadow-sm">
            <div class="card-body">
                @if($mahasiswa->isEmpty())
                    <p class="text-center text-muted mb-0">Belum ada data mahasiswa.</p>
                @else
                <table class="table table-striped table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $m)
                        <tr>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->nim }}</td>
                            <td>{{ $m->email }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination di tengah -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $mahasiswa->links('pagination::bootstrap-5') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>