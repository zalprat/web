@extends('layouts.dashboard')
@section('title', 'Riwayat Pesanan')

@section('content')

<div class="page-heading">
    <h3>Riwayat Pesanan</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merk Mobil</th>
                                    <th>Nama Mobil</th>
                                    <th>No Pesanan</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jaminan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Status Peminjaman</th>
                                    <th>Aksi</th> {{-- Tambah kolom aksi --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                <tr>
                                    <td class="text-bold-500">{{ $key + 1 }}</td>
                                    <td>{{ $item->cars->merk_mobil }}</td>
                                    <td class="text-bold-500">{{ $item->cars->nama_mobil }}</td>
                                    <td>{{ $item->no_pesanan }}</td>
                                    <td>{{ $item->tgl_sewa }}</td>
                                    <td>{{ $item->tgl_selesai }}</td>
                                    <td>{{ $item->jaminan }}</td>
                                    <td>{{ $item->status_pembayaran == 0 ? 'Belum Dibayar' : 'Lunas' }}</td>
                                    <td>{{ ( $item->status_peminjaman == 0 ) ? "Menunggu Dibayar" : (( $item->status_peminjaman == 1 )  ? "Sedang Proses Peminjaman" : "Selesai") }}</td>
                                    <td>
                                        <a href="{{ route('riwayat-pesanan.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('riwayat-pesanan.destroy', $item->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $data->links() }}

                </div>
            </div>
        </div>
    </section>
</div>

@endsection
