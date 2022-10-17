@extends('layouts.app')

@section('title', 'Input Waktu Pemilihan')

@push('style')
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Input Waktu Pemilihan</h1>
            </div>
            <div class="section-body">
            <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Pasangan Calon ketua osis</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('waktu.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Tanggal Pemilu</label>
                                    <input type="date" name="tanggal_pemilu" class="form-control datepicker">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai Pemilu</label>
                                    <input type="date" name="tanggal_selesai_pemilu" class="form-control">
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