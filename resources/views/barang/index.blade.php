<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Barang</title>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center mb-4">List Barang</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-barang.tambah')}}" class="btn btn-primary">Create Barang</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hovered table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barangData as $barang)
                                    <tr>
                                        <td>{{ $barang->idbarang }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>Rp {{number_format($barang->harga, 0, ',', '.') }}</td>
                                        <td>{{ $barang->stok }}</td>
                                        <td>
                                            @if($barang->foto)
                                                <img src="{{ asset('storage/' . $barang->foto) }}" alt="Foto Barang" width="100">
                                            @else
                                                <span>No Foto</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('data-barang.edit', $barang->idbarang)}}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('data-barang.detail', $barang->idbarang)}}" class="btn btn-primary btn-sm">Detail</a>
                                            <form action="{{ route('data-barang.hapus', $barang->idbarang) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>