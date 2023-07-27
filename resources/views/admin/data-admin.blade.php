@extends('template.app')

@section('title', 'Data Admin')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-12 order-md-1 order-last">
            <h3>Data Admin</h3>
            <p class="text-subtitle text-muted">Isi Informasi Lainnya disini</p>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Data Admin</h5>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah User</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    @foreach ($user as $data )

                    <tbody>
                        <tr>
                            <td> {{$data->name}} </td>
                            <td class="text-center">
                                <img src="{{ asset('storage/admin/profil/' . $data->foto) }}" alt="Foto Admin" class="rounded" height="50" width="50">
                            </td>

                            <td class="text-center"> {{$data->jabatan}} </td>
                            <td class="text-center"> {{$data->email}} </td>
                            <td class="text-center">
                                <form action="{{ route('admin.hapusUser', $data->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn icon btn-danger delete-btn"><i class="bi bi-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.tambahUser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Tambahkan form input untuk data user yang ingin ditambahkan -->
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Nama Lengkap</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="name" id="first-name-icon" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="email-id-icon">Email</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="email" id="email-id-icon" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="foto-id-icon">Foto</label>
                            <div class="position-relative">
                                <input type="file" class="form-control" name="foto" id="foto-id-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-camera"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">Jabatan</label>
                            <div class="position-relative">
                                <select class="form-control" name="jabatan" required>
                                    <option value="Kepala Sekolah"> Kepala Sekolah </option>
                                    <option value="Guru"> Guru </option>
                                    <option value="Staf"> Staf </option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="password-id-icon">Password <small class="text-info"> <em> *kosongkan jika ingin merubah password! </em> </small></label>
                            <div class="position-relative">
                                <input type="password" class="form-control" placeholder="******" id="password-id-icon" name="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


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

@endsection