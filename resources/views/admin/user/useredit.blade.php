@extends('layouts.app')

@section('title', 'calon ketua osis')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pengguna</h1>
            </div>
            <div class="section-body">
            <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Pengguna</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('User.update', $user->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nis</label>
                                    <input type="text" value="{{ $user->nis }}" name="nis" class="form-control">
                                </div>
                                <div class="form-group">
                                <select class="form-control" name="level">
                                    <option {{ $user->level =="admin"? 'selected':''}}  value="admin">admin</option>
                                    <option {{ $user->level =="siswa"? 'selected':''}}  value="siswa">Siswa</option>
                                </select>
                            </div>
                            <div class="form-group">
                      <div class="control-label">Toggle switches</div>
                      <div class="custom-switches-stacked mt-2">
                        <label class="custom-switch">
                           <input type="radio" name="generatetoken" class="custom-switch-input">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Checklist Apabila ingin Generate Token Baru</span>
                        </label>
                        <label class="custom-switch">
                           <input type="radio" name="hapustoken" class="custom-switch-input">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Checklist Apabila ingin Hapus Token</span>
                        </label>
                      </div>
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