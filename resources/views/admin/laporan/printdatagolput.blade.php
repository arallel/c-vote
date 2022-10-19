<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
	 <link rel="stylesheet"
        href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
     <div class="container">
     	<div class="card justify-content-center">
     		<h2 class="card-title text-center mt-2">Daftar Siswa Yang Tidak Memilih</h2>
     		@php
     		$no = 1;
     		@endphp
     		<div class="card-body">
     			<table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nis</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Kelas</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($users as $user)
                        <tr>
                          <th scope="row">{{ $no++ }}</th>
                          <td>{{ $user->nis }}</td>
                          <td>{{ $user->nama }}</td>
                          <td>{{ $user->kelas }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
</body>
     		</div>
     	</div>
     </div>
     <script>
    var load = setInterval(() => {
        window.print();
        window.location.href = "../laporan";
    }, 1000);
</script>
</html>