@extends('template.app')

@section('title', 'Profil Admin')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-12 order-md-1 order-last">
            <h3>Profil Admin</h3>
            {{-- <p class="text-subtitle text-muted">Isi Informasi Lainnya disini</p> --}}
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Akun</h4>
        </div>
        <form class="form form-vertical" action="{{ route('admin.updateProfil') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4 mb-4">
                            @if (Auth::guard('user')->user()->foto)
                            <img id="uploadedAvatar" src="{{ asset('storage/admin/profil/' . Auth::guard('user')->user()->foto) }}" alt="Foto Profil" class="d-block rounded" height="250" width="250" />

                            @else
                            <img id="uploadedAvatar" src="{{ asset('assets/dashboard/assets/images/faces/1.jpg') }}" alt="Foto Profil" class="d-block rounded" height="250" width="250" />

                            @endif
                        </div>

                        <div class="button-wrapper ml-4">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload foto</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" name="foto" hidden accept="image/png, image/jpeg" onchange="previewImage(event)" />
                            </label>
                            <p class="text-muted mb-0">Foto Profil * (Ukuran maksimal 1,5 MB)</p>
                            @error('foto')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Nama Lengkap</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value="{{ Auth::guard('user')->user()->name }}" name="name" id="first-name-icon">
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
                                            <input type="text" class="form-control" value="{{ Auth::guard('user')->user()->email }}" name="email" id="email-id-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Jabatan</label>
                                        <div class="position-relative">
                                            <select class="form-control" name="jabatan">
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
                                            <input type="password" class="form-control" placeholder="******" id="password-id-icon" name="password" value="">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update Profil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>



@endsection