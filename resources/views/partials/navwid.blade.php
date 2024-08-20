<aside class="widget widget-nav-menu">
    <ul>
        <li class="{{ $title === 'PPID' ? 'active' : '' }}"><a href="/ppid"> Profil </a></li>
        @foreach ($ppidnavbarall as $datappidnavbar)
        <li class="{{ $title === $datappidnavbar->id ? 'active' : '' }}"><a href="{{url('ppid-navbar')}}/{{$datappidnavbar->slug}}/{{$datappidnavbar->id}}">
                {{$datappidnavbar->nama}}
            </a></li>
        @endforeach
        <!-- <li class="{{ $title === 'Informasi Berkala' ? 'active' : '' }}"><a href="/ppid/informasi-berkala">
                Informasi Wajib Berkala
            </a></li>
        <li class="{{ $title === 'Informasi Serta Merta' ? 'active' : '' }}"><a href="/ppid/informasi-serta-merta">
                Informasi Serta Merta
            </a></li>
        <li class="{{ $title === 'Informasi Setiap Saat' ? 'active' : '' }}"><a href="/ppid/informasi-setiap-saat">
                Informasi Setiap Saat
            </a></li> -->
    </ul>
</aside>
