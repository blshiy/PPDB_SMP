@extends('template.app')

@section('title', 'Data Pendaftaran')
@section('content')
<div class="page-title">
    <!-- Bagian lain dari halaman -->
</div>

<div class="input-group">
    <input type="text" id="searchInput" class="form-control" style="max-width: 200px;" placeholder="Cari...">
    <div class="input-group-append">
        <button class="btn btn-primary" id="searchButton">Cari</button>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Data Pendaftaran</h5>
            <div>
                <a href="{{ route('data.export') }}" class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Ekspor Data</a>
            </div>           
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">Nomor Pendaftaran</th>
                            <th class="text-center">Tanggal Daftar</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    @php
                            $counter = 1;
                    @endphp
                    <tbody>
                        @forelse ($verifikasi as $index => $data)
                            <tr>
                                <td>{{ $index + $verifikasi->firstItem() }}</td>
                                <td>{{ $data->siswa->name }}</td>
                                <td class="text-center">{{ $data->siswa->nisn }}</td>
                                <td class="text-center">{{ $data->nomor_pendaftaran }}</td>
                                <td class="text-center">{{ $data->tanggal_daftar }}</td>
                                <td class="text-center">
                                    @if ($data->status == 'proses')
                                        <div class="alert alert-light-warning color-warning"><i class="bi bi-check-circle"></i> Proses!</div>
                                    @elseif ($data->status == 'lulus')
                                        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Lulus!</div>
                                    @elseif ($data->status == 'tolak')
                                        <div class="alert alert-light-danger color-danger"><i class="bi bi-x-lg"></i> Ditolak!</div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i> Belum ada data pendaftaran.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Total Number of Pendaftar -->
<div class="text-end mt-2">
    <h6>Total Jumlah Pendaftar: {{ $verifikasi->total() }}</h6>
</div>
                                            <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $verifikasi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchButton').click(function() {
            var keyword = $('#searchInput').val().toLowerCase();

            $('tbody tr').each(function() {
                var rowText = $(this).text().toLowerCase();

                if (rowText.includes(keyword)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

@endsection
