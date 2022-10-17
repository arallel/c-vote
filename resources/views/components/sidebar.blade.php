<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Silote</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
              <li class="{{ Request::is('paslon') ? 'active' : '' }}{{ Request::is('paslon/create') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('paslon.index') }}"><i class="fas fa-solid fa-envelope"></i><span>Pasangan Calon</span></a>
            </li>
            <li class="{{ Request::is('waktu') ? 'active' : '' }}{{ Request::is('waktu/create') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('waktu.index') }}"><i class="fas fa-solid fa-envelope"></i><span>Waktu Pemilihan</span></a>
            </li>
            <li class="{{ Request::is('User') ? 'active' : '' }}{{ Request::is('User/create') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('User.index') }}"><i class="fas fa-solid fa-user"></i><span>User Data</span></a>
            </li>
             @php
             $check =  DB::table('waktupilihs')
                                    ->select('tanggal_selesai_pemilu')
                                    ->count();
                                    if($check == !null){
                                         $waktus = DB::table('waktupilihs')
                                    ->select('tanggal_selesai_pemilu')
                                    ->get();
                                    foreach($waktus as $waktu );
                                    }
                      
                       @endphp
                       @if($check == 1)
                           @if($waktu->tanggal_selesai_pemilu == \Carbon\Carbon::now()->format('Y-m-d'))
                           <li class="{{ Request::is('laporan') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('laporan.index') }}"><i class="fas fa-solid fa-user"></i><span>Laporan</span></a>
            </li>
            @endif
            @endif

        </ul>

        
    </aside>
</div>
