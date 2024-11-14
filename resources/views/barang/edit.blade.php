<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Edit Barang</title>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center mb-4">Edit Barang</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('data-barang.update', $barang->idbarang) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="idbarang">Id</label>
                                <input type="text" name="idbarang" id="idbarang" class="form-control" value="{{ old('idbarang', $barang->idbarang )}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control"  value="{{ old('nama_barang', $barang->nama_barang )}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $barang->harga )}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok', $barang->stok )}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto">foto</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                            @if($barang->foto)
                                <p class="mt-2">Foto Lama: <img src="{{ asset('storage/' . $barang->foto) }}" alt="Foto Barang" style="max-width: 200px;"></p>
                            @endif
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('data-barang.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>