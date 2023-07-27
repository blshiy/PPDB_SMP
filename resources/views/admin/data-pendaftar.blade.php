@extends('template.app')

@section('title', 'Data Pendaftaran')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-12 order-md-1 order-last">
            <h3>Data Pendaftaran</h3> 
            <div class="input-group" >
                <input type="text" id="searchInput" class="form-control" style="max-width: 200px;" placeholder="Cari...">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="searchButton">Cari</button>
                </div>
            </div>
            {{-- <p class="text-subtitle text-muted">Isi Informasi Lainnya disini</p> --}}
            
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Pendaftaran</h5>
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
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        @forelse ($verifikasi as $index => $data )

                        <tbody>
                            <tr>
                                <td>{{ $index + $verifikasi->firstItem() }}</td>
                                <td> {{$data->siswa->name}} </td>
                                <td class="text-center"> {{$data->siswa->nisn}} </td>
                                <td class="text-center"> {{$data->nomor_pendaftaran}} </td>
                                <td class="text-center"> {{$data->tanggal_daftar}} </td>
                                <td class="text-center">
                                    @if ($data->status == 'proses')
                                    <div class="alert alert-light-warning color-warning"><i class="bi bi-check-circle"></i> Proses! </div>
                                    @elseif ($data->status == 'lulus')
                                    <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Lulus! </div>
                                    @elseif ($data->status == 'tolak')
                                    <div class="alert alert-light-danger color-danger"><i class="bi bi-x-lg"></i> Tidak Lulus ! </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn icon btn-success verifikasi-btn" style="margin-right: 8px;" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#verifikasiModal-{{ $data->id }}"><i class="bi bi-check-lg"></i></a>
                                        <a href="{{ route('pendaftar.detail', ['id' => $data->id]) }}" class="btn icon btn-info" style="margin-right: 8px;"><i class="bi bi-file-earmark-text"></i></a>
                                    <form action="{{ route('admin.hapusData', ['id' => $data->id]) }}" method="POST" class="delete-form" style="margin-right: 8px;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn icon btn-danger delete-btn"><i class="bi bi-trash"></i></button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @empty
                        <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i> Belum ada data pendaftaran.</div>
                        @endforelse
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
</div>

@forelse ($verifikasi as $data )

    <div class="modal fade" id="verifikasiModal-{{ $data->id }}" tabindex="-1" aria-labelledby="verifikasiModalLabel-{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifikasiModalLabel">Verifikasi Pendaftar</h5>
                <button type="button" class="btn-close tutup" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="verifikasiBerkas" method="POST" action="{{ route('verifikasi', ['id' => $data->id]) }}">
                @csrf
                <div class="modal-body">
                    <p>Anda akan melakukan verifikasi</p>
                    {{-- <ul>
                        <li><strong>Nama</strong> <span id="verifikasiModalNama"></span></li>
                        <li><strong>NISN</strong> <span id="verifikasiModalNisn"></span></li>
                        <li><strong>Nomor Pendaftaran</strong> <span id="verifikasiModalNomorPendaftaran"></span></li>
                    </ul> --}}
                    <select class="form-select" id="basicSelect" name="status">
                        <option value="lulus">Terima</option>
                        <option value="tolak">Tolak</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tutup" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.verifikasi-btn').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var namaPendaftar = $(this).closest('tr').find('td:eq(0)').text();
            var nisnPendaftar = $(this).closest('tr').find('td:eq(1)').text();
            var nomorPendaftaran = $(this).closest('tr').find('td:eq(2)').text();

            $('#verifikasiModalNama').text(namaPendaftar);
            $('#verifikasiModalNisn').text(nisnPendaftar);
            $('#verifikasiModalNomorPendaftaran').text(nomorPendaftaran);
            $('#verifikasiModal').modal('show');

            $('#verifikasiBerkas').attr('action', "{{ route('verifikasi', '') }}/" + id);

        });
    });
    $(document).on('click', '.tutup', function() {
        $('#verifikasiModal').modal('hide');
    });
</script>

@empty

@endforelse

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
