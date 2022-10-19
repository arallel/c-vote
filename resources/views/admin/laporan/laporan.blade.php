@extends('layouts.app')

@section('title', 'Laporan')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush
@php
$paslon1count = DB::table('vote')
->where('id_paslon', '=', 1)
->count();
$paslon2count = DB::table('vote')
->where('id_paslon', '=', 2)
->count();
$paslon3count = DB::table('vote')
->where('id_paslon', '=', 3)
->count();
@endphp

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>
        <div class="section-header">
            <a href="{{ route('print.laporan') }}" class="btn btn-danger">Print</a>
            <a href="{{ route('print.laporan.golput') }}" class="btn btn-warning ml-2">Print Laporan Tidak memilih</a>
        </div>

        <div class="row">

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-primary">Grafik Batang</h4>
                    </div>
                    <div class="card-body">
                        <livewire:chartbar />
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-primary">Grafik Lingkaran</h4>
                    </div>
                    <div class="card-body">
                        <livewire:piechart />
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-primary">Grafik Lingkaran Pemilih</h4>
                    </div>
                    <div class="card-body">
                        <livewire:golput />
                    </div>
                </div>
            </div>

        </div>
</div>

</div>

@endsection


@push('scripts')

<!-- JS Libraies -->
<script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

<!-- Page Specific JS File -->
{{-- <script src="{{ asset('js/page/index-0.js') }}"></script> --}}
@endpush