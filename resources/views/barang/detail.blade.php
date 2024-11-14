<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Detail barang</title>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center mb-4">Detail Barang</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header mb-3">
                            <span class="label">Id:</span>
                            <span class="value">{{ $barang->idbarang }}</span>
                        </div>
                        <div class="card-header mb-3">
                            <span class="label">Nama Barang:</span>
                            <span class="value">{{ $barang->nama_barang }}</span>
                        </div>
                        <div class="card-header mb-3">
                            <span class="label">Harga:</span>
                            <span class="value">Rp {{number_format($barang->harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="card-header mb-3">
                            <span class="label">Stok:</span>
                            <span class="value">{{ $barang->stok }}</span>
                        </div>
                    @if($barang->foto)
                        <div class="card-header mb-3">
                            <span class="label">Foto:</span>
                            <div>
                                <img src="{{ asset('storage/' . $barang->foto)}}" alt="Foto Barang" class="img-fluid" style="max-width: 300px">
                            </div>
                        </div>
                    @else
                        <div class="mb-3">
                            <span class="label">Foto:</span>
                            <span class="value">Tidak ada foto</span>
                        </div>
                    @endif
                    <div class="card-footer">
                        <a href="{{ route('data-barang.index') }}" class="btn btn-secondary">kembali ke list barang</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>