@extends('layouts.app')

@section('title', 'calon ketua osis')

@push('style')
<link rel="stylesheet"
href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kelas</h1>
            </div>
            <div class="section-body">
            <div class="col-12 col-md-6 col-lg-5 mx-auto">
                
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-primary">Tambah Kelas</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kelas.store') }}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="kelas" class="form-control">
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
@push('scripts')
   
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush