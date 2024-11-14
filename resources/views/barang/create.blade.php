<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Barang</title>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center mb-4">Tambah Barang</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('data-barang.simpan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label for="idbarang">Id</label>
                                <input type="text" name="idbarang" class="form-control" id="idbarang" placeholder="Masukan id di sini" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukan nama barang di sini" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukan harga di sini" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" class="form-control" id="stok" placeholder="Masukan stok di sini" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" class="form-control" id="idbarang" accept="image/*" required>
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

    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>