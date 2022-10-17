@extends('layouts.guest')

@section('title', 'Home')

@push('style')
    <!-- CSS Libraries -->
   {{--  <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}"> --}}
@endpush

@section('main')
<style>
/*
source
http://stackoverflow.com/a/23935891/3853728
*/

.img-gradient{
  position:relative;
  display:inline-block;
}


/* 
#002f4b,#dc4225 
Convert HEX to RGBA - http://hex2rgba.devoth.com/
*/
.img-gradient:after {
  content:'';
  position:absolute;
  left:0; top:0;
  width:100%; height:100%;
  display:inline-block;
  z-index: 1;
    /* fallback for old browsers */
  background: #ffffff;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to left, rgba(255, 255, 255, 0.2), rgba(254, 145, 62, 0.2));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to left, rgba(255, 255, 255, 0.2), rgba(254, 145, 62, 0.2))   
}
.img-gradient img{
  display:block;
}
</style>

@php
$test =  DB::table('users')
                ->select('token')
                ->where('token', '=', session('token'))
                ->limit(1)
                ->get();
@endphp
<div class="main-content" style="padding-left: 0px; padding-top: 50px;">
       <div class="row mx-auto">
        @forelse($paslons as $paslon)
        <div class="col-14 col-md-12 col-lg-4" >
                <a class="card shadow  rounded img-gradient" data-toggle="modal" data-target="#exampleModal" >
                    <img class="rounded"src="storage/{{ $paslon->foto_calon }}" class="img-fluid rounded" width="290rem" height="290rem" > 
                   
                        <input type="hidden" name="id_paslon" value="{{ session('token') }}">
                    </a>

                    
                  
                </div>  
        @empty
        <div class="card">
            <div class="card-body">
                <h1>tidak Ada Data<br> Hubungin Admin</h1>
            </div>
        </div>
        @endforelse
        
       </div>
       
      </div>
</div>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">YAKIN ORA?</h5>
          
        </div>
        <div class="modal-body">
          Yakin mau memilih ini?
        </div>
        <div class="modal-footer">
            <form action="{{ route('user.store') }}" method="POST"> 
                @csrf
                <input type="hidden" name="token" value="{{ session('token') }}">
                <input type="hidden" name="id_paslon" value="{{ $paslon->paslon_id }}">
                <input type="hidden" name="id_user" value="{{  session('id_token') }}">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" target="_blank" class="btn btn-primary">SANGAT</button>
        </form>
        </div>
              </div>
    </div>
  </div>
