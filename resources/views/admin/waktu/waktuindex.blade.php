@extends('layouts.app')

@section('title', 'Pilih Waktu Pemilihan')

@push('style')
    <link rel="stylesheet"
        href="{{ asset('library/datatables/dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pasangan calon ketua osis</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="col-lg-3 mt-3">
                    <a href="{{ route('waktu.create') }}" class="btn btn-primary">create</a>
                    </div>
                    <div class="card-body">
                        @php
                        $no = 1;
                        @endphp
                        <div class="table-responsive">
                                    <table class="table-striped table"
                                        id="table-1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>Tanggal Pemilu</th>
                                                <th>Tanggal Selesai Pemilu</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($waktus as $waktu)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $waktu->tanggal_pemilu }}</td>
                                                <td>{{ $waktu->tanggal_selesai_pemilu }}</td>
                                                <td>
                                                    <form action="{{ route('waktu.destroy',$waktu->id_waktu) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                <a href="{{ route('waktu.edit',$waktu->id_waktu) }}"class="btn btn-warning">edit</a>
                                                <button class="btn btn-danger">hapus</button>
                                                </form>
                                        </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/dataTables.min.js') }}"></script>  
        <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

@endpush