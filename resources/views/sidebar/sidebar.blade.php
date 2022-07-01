<div class="sidebar close">
    <div class="logo-details">
        <span class="logo_name">ResGestion</span>
        <i class="fal fa-bars btnMenu bx bx-menu"></i>
    </div>
    <ul class="nav-links">
        <li>
            <a href="/dashboard">
                <i class="fas fa-home-lg"></i>
                <span class="link_name">Acceuil</span>
            </a>
            <ul class="sub-menu blank">
                <li>
                    <a class="link_name" href="/dashboard">Acceuil</a>
                </li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="fas fa-users icon_hov" id="icon-p1"></i>
                    <span class="link_name">Résidents</span>
                </a>
                <i class="fas fa-caret-right arrow" id="arrow1" onclick="openMenu('box1','arrow1');"></i>
            </div>
            <ul class="sub-menu" id="box1">
                <li><a class="link_name" href="#">Résidents</a></li>
                <li><a href="/resident/create">Ajouter un résident</a></li>
                <li><a href="/resident">Consulter les résidents</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="fas fa-file-invoice-dollar icon_hov" id="icon-p2"></i>
                    <span class="link_name">Factures</span>
                </a>
                <i class="fas fa-caret-right arrow" id="arrow2" onclick="openMenu('box2','arrow2');"></i>
            </div>
            <ul class="sub-menu" id="box2">
                <li><a class="link_name" href="#">Factures</a></li>
                <li><a href="/facture/create">Ajouter une facture</a></li>
                <li><a href="/facture">Consulter les factures</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="fas fa-building icon_hov" id="icon-p3"></i>
                    <span class="link_name">Bâtiments</span>
                </a>
                <i class="fas fa-caret-right arrow" id="arrow3" onclick="openMenu('box3','arrow3')"></i>
            </div>
            <ul class="sub-menu" id="box3">
                <li><a class="link_name" href="#">Bâtiments</a></li>
                <li><a href="/batiment/create">Ajouter un Bâtiment</a></li>
                <li><a href="/batiment">Consulter les Bâtiments</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="fas fa-user-hard-hat icon-p icon_hov"></i>
                    <span class="link_name">Opérateurs</span>
                </a>
                <i class="fas fa-caret-right arrow" id="arrow4" onclick="openMenu('box4','arrow4')"></i>
            </div>
            <ul class="sub-menu" id="box4">
                <li><a class="link_name" href="#">Opérateurs</a></li>
                <li><a href="/operateur/create">Ajouter un opérateur</a></li>
                <li><a href="/operateur">Consulter les opérateurs</a></li>
            </ul>
        </li>
        <li>

            <div class="iocn-link">
                <a href="/print/fact">
                    <i class="fa-solid fa-print"></i>
                    <span class="link_name">Impression</span>
                </a>
                <ul class="sub-menu blank">
                    <li>
                        <a class="link_name" href="/print/fact">Impression</a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <a href="/profile"><img src="{{asset('/images/'.Auth::user()->profile_path)}}"  style="width: 2rem ; height :2rem; border-radius: 50%" alt=""></a>
                </div>
                <div class="name-job">
                    <div class="profile_name">{{auth()->user()->name}}</div>
                </div>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</div>
<script src="{{asset('js/sidebar.js')}}"></script>
