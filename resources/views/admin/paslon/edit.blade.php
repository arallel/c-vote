@extends('layouts.app')

@section('title', 'calon ketua osis')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pasangan calon ketua osis</h1>
            </div>
            <div class="section-body">
            <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Pasangan Calon ketua osis</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('paslon.update',$paslons->paslon_id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    {{ $paslons->paslon_id }}
                                    <label>Foto Paslon</label>
                                    <input type="file" name="foto_calon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Calon Ketua</label>
                                    <input type="text" value="{{ $paslons->calon_ketua }}" name="calon_ketua" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Calon Wakil</label>
                                    <input type="text" value="{{ $paslons->calon_wakil }}" name="calon_wakil" class="form-control">
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