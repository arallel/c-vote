<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">

<body onload="window.print()">
    <div class="row mt-2 ml-4 mr-4">
        @foreach($users as $user)
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card card-secondary border-secondary" style="width: 20rem; height: 10rem;">
                <h5 class="text-center">Kartu Pemilih</h5>
                <div class="card-header ">
                    <div>
                        <h4 style="color: black">Nama: {{ $user->nama }}</h4>
                        <h4 style="color: black" class="mb-2">Kelas: {{ $user->kelas }}</h4>
                        {!! DNS1D::getBarcodeSVG($user->token, 'C128',1.5,50,true)!!}
                    </div>
                </div>

            </div>
        </div>
        @endforeach



    </div>
</body>

<script>
    const batas = setTimeout(goLogin, 100)

    function goLogin() {
        window.location.href = "../../User";
    }
</script>