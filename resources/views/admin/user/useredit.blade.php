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
                        <form action="{{ route('User.update', $kelas->token_id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Nis</label>
                                <input type="text" name="nis" value="{{ $kelas->nis }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="{{ $kelas->nama }}" name="nama" class="form-control">
                            </div>
                            <select name="status" class="form-control select2">
                                <option {{ $kelas->status =="0"? 'selected':''}} value="0">aktif</option>
                                <option {{ $kelas->status =="1"? 'selected':''}} value="1">tidak aktif</option>

                            </select>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas" class="form-control select2">
                                    @foreach($kelass as $k)
                                    <option {{ $kelas->kelas == $k->kelas ? 'selected':''}}>{{ $k->kelas }}</option>
                                    @endforeach
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