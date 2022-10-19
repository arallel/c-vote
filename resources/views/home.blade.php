@extends('layouts.guest')

@section('title', 'Home')

@push('style')
    <!-- CSS Libraries -->
   {{--  <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}"> --}}
    <link rel="stylesheet"
        href="{{ asset('css/animation.css') }}">
@endpush

@section('main')




@php
$test =  DB::table('users')
                ->select('token')
                ->where('token', '=', session('token'))
                ->limit(1)
                ->get();
@endphp
<style>
  button {

background: transparent;
border: none !important;
font-size:0;
}
body {
  
  


overflow-y: hidden;

}
</style>
<div class="container" >
       <div class="row mx-auto">
        @forelse($paslons as $paslon)
        <div class="col-12 col-md-12 col-lg-4">
          
          
          <form action="{{ route('user.store') }}" method="POST"> 
            @csrf
            
            <button>
              <div class="card-1" onclick="submit()" style="background-image:url('storage/{{ $paslon->foto_calon }}');">
                  <div class="overlay" >
                    <input type="hidden" name="id_paslon" value="{{ session('token') }}">
                        <input type="hidden" name="token" value="{{ session('token') }}">
                        <input type="hidden" name="id_paslon" value="{{ $paslon->paslon_id }}">
                        <input type="hidden" name="id_user" value="{{ session('id_token') }}">s
                    <div class="overlay-text">
                      <h2>paslon</h2>
                      <h6>{{$paslon->calon_ketua}} & {{$paslon->calon_wakil}}</h6>
                  </div>
                  </div>
              </div>
            </button>
           
                    {{-- <img class="rounded"src="storage/{{ $paslon->foto_calon }}" onclick="submit()" class="img-fluid rounded" width="290rem" height="390rem" > 
                        <input type="hidden" name="id_paslon" value="{{ session('token') }}">
                        <input type="hidden" name="token" value="{{ session('token') }}">
                        <input type="hidden" name="id_paslon" value="{{ $paslon->paslon_id }}">
                        <input type="hidden" name="id_user" value="{{ session('id_token') }}">     --}}
          </form>
          
          

                    
                  
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
                <input type="hidden" name="id_user" value="{{ session('id_token') }}">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" target="_blank" class="btn btn-primary">SANGAT</button>
        </form>
        </div>
              </div>
    </div>
  </div>
