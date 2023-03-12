@extends('tanggapan.layout')
@section('content')

<form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h4 mb-0">Create Akun</h3>
                  </div>
                  <div class="card-body pt-0">
                    <form class="form-horizontal">
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Name</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="char" name="name" class="form-control" placeholder="Name">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Email</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">NIK</label>
                        <div class="col-sm-9">
                          <input class="form-control" type="char" name="nik" class="form-control" placeholder="enter NIK">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">No Telp</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="char" name="telp" class="form-control" placeholder="enter no telp">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Password</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="password" name="password" class="form-control" placeholder="enter password">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Role</label>
                        <div class="col-sm-9">
                        <select class="default-select wide form-control" name="role" id="validationCustom05">
                                                    <option data-display="Select">Please select</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Petugas">Petugas</option>
                                                </select>                        </div>
                      </div>
                     
                      
                      <button class="btn btn-primary" type="submit">Submit</button>
</form>