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
                                <form action="{{ route('paslon.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group ">
                                        @php
                                         $paslon1count = DB::table('paslons')
                 ->where('paslon_id', '=', 1)
                ->count();
                $paslon2count = DB::table('paslons')
                 ->where('paslon_id', '=', 2)
                ->count();
                $paslon3count = DB::table('paslons')
                 ->where('paslon_id', '=', 3)
                ->count();
                                        @endphp
                                        <label>Paslon Id</label>
                                        <select class="form-control" name="paslon_id">
                                            <option disabled selected>Pilih Paslon</option>
                                            @if ( $paslon1count == false)
                                            <option value="1">1</option>
                                            @endif
                                            @if ( $paslon2count == false)
                                            <option value="2">2</option>
                                            @endif
                                            @if ( $paslon3count == false)
                                            <option value="3">3</option>
                                            @endif
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>Foto Paslon</label>
                                    <input type="file" name="foto_calon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Calon Ketua</label>
                                    <input type="text" name="calon_ketua" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Calon Wakil</label>
                                    <input type="text" name="calon_wakil" class="form-control">
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