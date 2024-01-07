<!-- resources/views/dashboard/tambah_mobil.blade.php -->

@extends('layouts.dashboard')

@section('title', 'Tambah Mobil')

@section('content')

<div class="page-heading">
    <h3>Tambah Mobil</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Formulir Tambah Mobil -->
                    <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Field Nama Mobil -->
                        <div class="form-group">
                            <label for="nama_mobil">Merk Mobil</label>
                            <input type="text" name="nama_mobil" id="nama_mobil" class="form-control" required>
                        </div>

                        <!-- Field Merk Mobil -->
                        <div class="form-group">
                            <label for="merk_mobil">Nama Mobil</label>
                            <input type="text" name="merk_mobil" id="merk_mobil" class="form-control" required>
                        </div>

                        <!-- Field No Polisi -->
                        <div class="form-group">
                            <label for="no_polisi">No Polisi</label>
                            <input type="text" name="no_polisi" id="no_polisi" class="form-control" required>
                        </div>

                        <!-- Field Gambar Mobil (Gunakan input type file untuk upload gambar) -->
                        <div class="form-group">
                            <label for="gambar_mobil">Gambar Mobil</label>
                            <input type="file" name="gambar_mobil" id="gambar_mobil" class="form-control" accept="image/*" required>
                        </div>

                        <!-- Field Harga Sewa -->
                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa</label>
                            <input type="number" name="harga_sewa" id="harga_sewa" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="bahan_bakar">Bahan Bakar</label>
                            <input type="text" name="bahan_bakar" id="bahan_bakar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="bahan_bakar">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="warna_mobil">Warna Mobil</label>
                            <input type="text" name="warna_mobil" id="warna_mobil" class="form-control" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
