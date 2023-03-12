@extends('admin.layouts')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Akun</h4>
                        <a href="{{ route('akun.index') }}" class="btn btn-primary">
                            <span>Create</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="needs-validation" action="{{ route('akun.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Masukan Name.." value="{{ $user->name }}" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="validationCustom02" name="email" value="{{ $user->email }}" placeholder="Masukan Email Anda.." required="">
                                                <div class="invalid-feedback">
                                                    Please enter a Email.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom05">Role
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="default-select wide form-control" name="role" id="validationCustom05">
                                                    <option data-display="Select">Please select</option>
                                                    <option value="Admin" @if ($user->role == 'Admin')selected @endif>Admin</option>
                                                    <option value="Petugas" @if ($user->role == 'Petugas')selected @endif>Petugas</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a one.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom06">No.Telp
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="validationCustom06" name="telp" value="{{ $user->telp }}" placeholder="Masukan Nomor Anda" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a No.Telp.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="validationCustom03" name="password" placeholder="Masukan Password.." required="">
                                                <input type="text" class="form-control" style="display:none;" id="validationCustom03" name="nik" value="" >
                                                <div class="invalid-feedback">
                                                    Please enter a Password.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-lg-8 ms-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection