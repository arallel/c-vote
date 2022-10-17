@extends('layouts.app')

@section('title', 'calon ketua osis')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftarkan Pengguna</h1>
            </div>
            <div class="section-body">
            <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftarkan Pengguna</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('User.store') }}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nis</label>
                                    <input type="text" name="nis" class="form-control">
                                </div>
                                <div class="form-group">
                                <select class="form-control" name="level">
                                    <option disabled selected>Pilih Level User</option>
                                    <option value="admin">admin</option>
                                    <option value="siswa">Siswa</option>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                             <div class="card-footer text-right">
                                 <button class="btn btn-success">submit</button>
                             </div>
                             </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection