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
                                <form action="{{ route('waktu.update', $waktu->id_waktu) }}" method="post">
                                    @csrf
                                    @method('patch')
                                 <div class="form-group">
                                    <label>Tanggal Pemilu</label>
                                    <input type="date" value="{{ $waktu->tanggal_pemilu }}" name="tanggal_pemilu" class="form-control datepicker">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai Pemilu</label>
                                    <input type="date" value="{{ $waktu->tanggal_selesai_pemilu }}" name="tanggal_selesai_pemilu" class="form-control">
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