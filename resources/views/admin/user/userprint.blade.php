<html>
    <head>
    <title>print</title>  
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <!-- Custom fonts for this template-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
            <div class="col-xl-5 col-lg-12 col-md-9 mt-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Token Login
                    </div>
                    <div class="card-body">
                        <table>
                        	<tr>                        		
                        	<td>Nama </td>
                            <td> : </td>
                        	<td>{{ $user->name }}</td>
                        	</tr>
                        		<tr class="mt-2">
                        		<td>Nis</td>
                        		<td> : </td>
                        		<td>{{ $user->nis }}</td>
                        		</tr>
                        		<tr class="mt-2">
                        		<td>Token </td>
                                <td> : </td>
                                @if($user->token == !null)
                        		<td>{{ $user->token }}</td>
                        		@endif
                        		</tr>
                        </table>
                        <div class="card " style="width: 220px; height:  62px; margin-left: 200px;">
                        	<div style="margin-top: 7px; margin-left: 8px;">
                        		@if($user->token == !null)
                          {!! DNS1D::getBarcodeSVG($user->token, 'C128',2,50,true)!!}
                           @endif
                        	</div>
                        </div>    
                    </div>
                </div>
            </div>

        </div>
    </div>
        </div>
    </body>