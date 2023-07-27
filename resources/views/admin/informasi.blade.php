@extends('template.app')

@section('title', 'Informasi PPDB')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-12 order-md-1 order-last">
            <h3>Informasi PPDB</h3>
            {{-- <p class="text-subtitle text-muted">Isi Informasi Lainnya disini</p> --}}
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Syarat Pendaftaran PPDB</h5>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahInformasi">
                        <i class="bi bi-card-list"></i> Tambah Informasi
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th class="text-center">Nomor</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informasi as $index => $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->deskripsi}}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a type="button" data-id="{{$data->id}}" class="btn icon btn-warning editInformasi-btn" data-bs-toggle="modal" data-bs-target="#editInformasi">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        &nbsp;
                                        <form action="{{ route('informasi.hapus', $data->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn icon btn-danger delete-btn"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>


                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Informasi -->
<div class="modal fade" id="modalTambahInformasi" tabindex="-1" role="dialog" aria-labelledby="modalTambahInformasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahInformasiLabel">Tambah Informasi Syarat Pendaftaran</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahInformasi" action="{{route('tambah.informasi')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="inputDeskripsi">Deskripsi</label>
                        <textarea class="form-control" id="inputDeskripsi" name="deskripsi" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // Ambil semua form dengan class delete-form
    const deleteForms = document.querySelectorAll('.delete-form');

    // Tambahkan event listener ke setiap form
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah submit form

            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data admin akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika konfirmasi diizinkan, submit form
                    this.submit();
                }
            });
        });
    });
</script>

@forelse($informasi as $data)


<!-- Modal Edit -->
<div class="modal fade" id="editInformasi" tabindex="-1" aria-labelledby="editInformasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInformasiLabel">Edit Data Informasi</h5>
                <button type="button" class="btn-close tutup" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editInformasiForm" method="POST" action="{{ route('informasi.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="inputDeskripsi">Deskripsi</label>
                        <textarea class="form-control" id="inputDeskripsi" name="deskripsi" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tutup" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.editInformasi-btn').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var namaInformasi = $(this).closest('tr').find('td:eq(1)').text();
            var deskripsi = $(this).closest('tr').find('td:eq(2)').text();

            $('#inputNama').val(namaInformasi);
            $('#inputDeskripsi').val(deskripsi);
            $('#editInformasi').modal('show');

            $('#editInformasiForm').attr('action', "{{ route('informasi.update', '') }}/" + id);
        });

        $(document).on('click', '.tutup', function() {
            $('#editInformasi').modal('hide');
        });

        // Perhatikan bagian ini
        $('#editInformasi').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var namaInformasi = button.closest('tr').find('td:eq(1)').text();
            var deskripsi = button.closest('tr').find('td:eq(2)').text();
            var modal = $(this);
            modal.find('#inputNama').val(namaInformasi);
            modal.find('#inputDeskripsi').val(deskripsi);
        });
    });
</script>

@empty
@endforelse


@endsection