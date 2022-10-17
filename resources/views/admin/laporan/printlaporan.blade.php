<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">
    <title>Laporan &mdash; Silote</title>

    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/components.css') }}">

    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
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
<body onload="setInterval(window.print(), 20000);">
    <div id="app">
         
        <div class="main-wrapper">
            <div class="container">
                <div class="row">
                <div class="col-md-5 col-lg-12 col-xl-6 mt-5">
                    <div class="card" style="height: 38rem;">
                        <div class="card-header bg-primary text-white">
                            Grafik Batang
                        </div>
                        <div class="card-body" >
                           <livewire:chartbar />
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-12 col-xl-6 mt-5">
                    <div class="card" style="height: 38rem;">
                        <div class="card-header bg-primary text-white">
                           Grafik Lingkaran
                        </div>
                        <div class="card-body" >
                            <livewire:piechart /> 
                        </div>
                    </div>
                </div>  
                <div class="col-md-5 col-lg-12 col-xl-6 mt-5">
                    <div class="card" style="height: 38rem;">
                        <div class="card-header bg-primary text-white">
                           Grafik Lingkaran Pemilih
                        </div>
                        <div class="card-body" >
                                <livewire:golput /> 
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

</html>
    

