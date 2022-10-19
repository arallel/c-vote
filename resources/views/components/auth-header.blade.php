<div class="jumbotron">
    <form action="{{route('user.golput')}}" method="post">
        @csrf
        <input type="hidden" name="token_id" value="{{ session('id_token') }}">
        <button class="btn btn-danger ml-2">Golput </button>
    </form>

    <h1 class="text-white text-center">Pemilihan Osis</h1>
    <p class="text-white text-center">Pemilu ketos dan waketos Osis 2022</p>
    <br><br><br>
</div>