@extends('layouts.app')

@section('title', 'Data User')

@push('style')
    <link rel="stylesheet"
        href="{{ asset('library/datatables/dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data User</h1>
            </div>
              @php
                            $no = 1;
                            @endphp
            <div class="section-body">
                <div class="card">
                    <div class="col-lg-5 mt-3">
                    <a href="{{ route('User.create') }}" class="btn btn-primary">create</a>
                    <a href="{{ route('User.export') }}" class="btn btn-info">export Excel</a>
                    <button class="btn btn-danger"
                                    data-toggle="modal"
                                    data-target="#exampleModal">Import Excel</button>
                    <a href="{{ route('User.printall') }}" class="btn btn-info ">Print Semua</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                    <table class="table-striped table"
                                        id="table-1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>Nama</th>
                                                <th>Nis</th>
                                                <th>Level</th>
                                                <th>Token</th>
                                                <th>Barcode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->nis }}</td>
                                                <td>{{ $user->level }}</td>
                                                <td>{{ $user->token }}</td>
                                                <td>
                                                    @if($user->token == !null)
                                                    {!! DNS1D::getBarcodeSVG($user->token, 'C128',2,50,true) !!}
                                                    @endif
                                               </td>
                                                <td>
                                                    <form action="{{ route('User.delete',$user->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                <a href="{{ route('User.edit',$user->id) }}"class="btn btn-warning">edit</a>
                                                <button class="btn btn-danger">hapus</button>
                                                <a href="{{ route('User.print',$user->id) }}"class="btn btn-info">Print</a>
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
            </div>
        </section>
    </div>

@endsection
<div class="modal fade"
            tabindex="-1"
            role="dialog"
            id="exampleModal">
            <div class="modal-dialog"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Excel</h5>
                        <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('User.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <input type="file" name="excel" class="form-control">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/dataTables.min.js') }}"></script>  
        <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

@endpush

