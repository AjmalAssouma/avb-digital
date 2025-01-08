<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">MENU</li>

                <li>
                    <a href="{{route('home')}}"><i class="fi-air-play"></i><span class="badge badge-pill badge-success float-right"></span><span>Tableau de bord</span></a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fa fa-bar-chart-o"></i><span>SGI</span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        {{-- <li><a href="{{route('creation.sgi.form')}}">Créer une SGI</a></li> --}}
                        <li><a href="{{route('list.sgi')}}">Liste des SGI</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="mdi mdi-book-open"></i><span>Numéro de compte</span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="{{route('list.numcompte')}}">Liste des nº de compte</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="dripicons-graph-line"></i><span>Placement</span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="{{route('creation.placement')}}">Créer un placement</a></li>
                        <li><a href="{{route('list.placement')}}">Liste des placements</a></li>
                        <li><a href="{{route('exporter.placement')}}">Exporter des placements</a></li>
                    </ul>
                </li>



                @php
                    $user = Auth::user();
                @endphp

                @if($user && $user->idRole == 1)
                    <li class="menu-title">Administrateur</li>
                    <li>
                        <a href="javascript: void(0);"><i class="fi-layers"></i><span>GEST.&#160;UTILISATEURS</span><span class="menu-arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li><a href="{{ route('home.admin.all.users') }}">Tout les utilisateurs</a></li>
                        </ul>
                    </li>
                @endif

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>