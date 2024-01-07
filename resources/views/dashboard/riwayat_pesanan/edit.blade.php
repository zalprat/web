@extends('layouts.dashboard')

@section('title', 'Edit Riwayat Pesanan')

@section('content')

<div class="page-heading">
    <h3>Edit Riwayat Pesanan</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Your edit form goes here -->
                    <form method="POST" action="{{ route('riwayat-pesanan.update', $riwayatPesanan->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Your form fields go here -->
                        <div class="form-group">
                            <label for="nama_mobil">Nama Mobil</label>
                            <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ $riwayatPesanan->cars->nama_mobil }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="tgl_sewa">Tanggal Sewa</label>
                            <input type="date" class="form-control" id="tgl_sewa" name="tgl_sewa" value="{{ $riwayatPesanan->tgl_sewa }}">
                        </div>

                        <!-- Add more input fields based on your needs -->

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
