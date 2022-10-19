<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Laporan &mdash; Silote</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>

<body>
    <div id="app">
        <div class="conotainer">
            <section class="section">
                <div class="section-header text-center">
                    <h1>Laporan</h1>
                </div>



                <div class="row">

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-header ">
                                <h4 class="text-primary">Grafik Batang</h4>
                            </div>
                            <div class="card-body">
                                <livewire:chartbar />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-primary">Grafik Lingkaran</h3>
                            </div>
                            <div class="card-body">
                                <livewire:piechart />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-primary">Grafik Lingkaran Pemilih</h3>
                            </div>
                            <div class="card-body">
                                <livewire:golput />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-primary">Table</h4>
                            </div>
                            <div class="card-body">
                                @php
                                $data1 = DB::table('paslons')->where('paslon_id',1)->select('calon_ketua','calon_wakil')->first();
                                $data2 = DB::table('paslons')->where('paslon_id',2)->select('calon_ketua','calon_wakil')->first();
                                $data3 = DB::table('paslons')->where('paslon_id',3)->select('calon_ketua','calon_wakil')->first();

                                $count1 = DB::table('vote')->where('id_paslon',1)->count();
                                $count2 = DB::table('vote')->where('id_paslon',2)->count();
                                $count3 = DB::table('vote')->where('id_paslon',3)->count();
                                // dd($count1);
                                @endphp
                                <table border="1" class="table">
                                    <tr>

                                        <th>No urut</th>
                                        <th>Nama Paslon</th>
                                        <th>Jumlah</th>
                                        <!-- <th>{{ $data1->calon_ketua }} </th>
                                        <th>{{ $data2->calon_ketua }} </th>
                                        <th>{{ $data3->calon_ketua }} </th> -->
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $data1->calon_ketua }} & {{ $data1->calon_wakil }}</td>
                                            <td>{{ $count1 }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>{{ $data2->calon_ketua }} & {{ $data2->calon_wakil }}</td>
                                            <td>{{ $count2 }}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>{{ $data3->calon_ketua }} & {{ $data3->calon_wakil }}</td>
                                            <td>{{ $count3 }}</td>
                                        </tr>
                                        <!-- <td> </td>
                                        <td> {{ $count2 }}</td>
                                        <td> {{ $count3 }}</td> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        </div>

    </div>
    </div>
    </div>


    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js ') }}"></script>

    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

</body>
<script>
    var load = setInterval(() => {
        window.print();
        window.location.href = "../laporan";
    }, 1000);
</script>

</html>