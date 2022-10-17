@extends('layouts.app')

@section('title', 'calon ketua osis')

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
                    <a href="{{ route('paslon.create') }}" class="btn btn-primary">create</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table-bordered table">
                            @php
                            $no = 1;
                            @endphp
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Foto Pasangan Calon Osis</th>
                                            <th scope="col" class="text-center">Calon Ketua</th>
                                            <th scope="col" class="text-center">Calon Wakil</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($paslons as $paslon)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td><img src="storage/{{ $paslon->foto_calon }}" class="mt-3" class="img-fluid" width="200rem"></td>
                                            <td class="text-center">{{ $paslon->calon_ketua }}</td>
                                            <td class="text-center">{{ $paslon->calon_wakil }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('paslon.destroy',$paslon->paslon_id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <a href="{{ route('paslon.edit',$paslon->paslon_id) }}" class="btn btn-warning">edit</a>
                                                <button class="btn btn-danger">delete</button>
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
