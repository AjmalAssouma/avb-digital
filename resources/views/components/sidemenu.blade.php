<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('home')}}"><i class="fi-air-play"></i><span class="badge badge-pill badge-success float-right"></span><span>Tableau de bord</span></a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fa fa-bar-chart-o"></i><span>SGI</span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        {{-- <li><a href="{{route('creation.sgi.form')}}">Créer une SGI</a></li> --}}
                        <li><a href="{{route('list.sgi')}}">Listes des SGI</a></li>
                        {{-- <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                        <li><a href="ui-tabs.html">Tabs</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-notifications.html">Notification</a></li>
                        <li><a href="ui-carousel.html">Carousel</a>
                        <li><a href="ui-video.html">Video</a>
                        <li><a href="ui-tooltips-popovers.html">Tooltips & Popovers</a></li>
                        <li><a href="ui-images.html">Images</a></li>
                        <li><a href="ui-bootstrap.html">Bootstrap UI</a></li> --}}
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="dripicons-graph-line"></i><span>Placement</span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="{{route('creation.placement')}}">Créer un placement</a></li>
                        <li><a href="#">Listes des placements</a></li>
                        {{-- <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html">Font awesome</a></li>
                        <li><a href="icons-feather.html">Feather Icons</a></li> --}}
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span>Graphs</span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="chart-flot.html">Flot Chart</a></li>
                        <li><a href="chart-morris.html">Morris Chart</a></li>
                        <li><a href="chart-google.html">Google Chart</a></li>
                        <li><a href="chart-chartist.html">Chartist Charts</a></li>
                        <li><a href="chart-chartjs.html">Chartjs Chart</a></li>
                        <li><a href="chart-c3.html">C3 Chart</a></li>
                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                        <li><a href="chart-knob.html">Jquery Knob</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-disc"></i><span class="badge badge-pill badge-primary float-right">9</span><span>Forms</span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="form-elements.html">Form Elements</a></li>
                        <li><a href="form-advanced.html">Form Advanced</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-pickers.html">Form Pickers</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-mask.html">Form Masks</a></li>
                        <li><a href="form-summernote.html">Summernote</a></li>
                        <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>
                        <li><a href="form-uploads.html">Multiple File Upload</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-layout"></i><span>Tables</span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-layouts.html">Tables Layouts</a></li>
                        <li><a href="tables-datatable.html">Data Table</a></li>
                        <li><a href="tables-responsive.html">Responsive Table</a></li>
                        <li><a href="tables-tablesaw.html">Tablesaw Table</a></li>
                        <li><a href="tables-editable.html">Editable Table</a></li>
                    </ul>
                </li>

                <li class="menu-title">More</li>

                @php
                    $user = Auth::user();
                @endphp

                @if($user && $user->idRole == 1)
                    <li>
                        <a href="javascript: void(0);"><i class="fi-target"></i><span>Administrateur</span><span class="menu-arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li><a href="{{ route('home.admin.all.users') }}">Tout les utilisateurs</a></li>
                            <li><a href="admin-sweet-alert.html">Sweet Alert</a></li>
                            <li><a href="admin-widgets.html">Widgets</a></li>
                            <li><a href="admin-nestable.html">Nestable List</a></li>
                            <li><a href="admin-rangeslider.html">Range Slider</a></li>
                            <li><a href="admin-ratings.html">Ratings</a></li>
                        </ul>
                    </li>
                @endif

                <li><a href="calendar.html"><i class="fi-clock"></i><span>Calendar</span></a></li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-map"></i><span>Maps</span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="maps-google.html">Google Maps</a></li>
                        <li><a href="maps-vector.html">Vector Maps</a></li>
                        <li><a href="maps-mapael.html">Mapael Maps</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript: void(0);"><i class="fi-paper-stack"></i><span>Pages</span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="page-starter.html">Starter Page</a></li>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-logout.html">Logout</a></li>
                        <li><a href="page-recoverpw.html">Recover Password</a></li>
                        <li><a href="page-lock-screen.html">Lock Screen</a></li>
                        <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                        <li><a href="page-404.html">Error 404</a></li>
                        <li><a href="page-404-alt.html">Error 404-alt</a></li>
                        <li><a href="page-500.html">Error 500</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-marquee-plus"></i><span>Extra Pages</span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="extras-about.html">About Us</a></li>
                        <li><a href="extras-contact.html">Contact</a></li>
                        <li><a href="extras-members.html">Members</a></li>
                        <li><a href="extras-timeline.html">Timeline</a></li>
                        <li><a href="extras-invoice.html">Invoice</a></li>
                        <li><a href="extras-maintenance.html">Maintenance</a></li>
                        <li><a href="extras-coming-soon.html">Coming Soon</a></li>
                        <li><a href="extras-faq.html">FAQ</a></li>
                        <li><a href="extras-pricing.html">Pricing</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" aria-expanded="true"><i class="fi-share"></i><span>Multi Level</span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" aria-expanded="true">Level 1.2<span class="menu-arrow"></span></a>
                            <ul class="nav-third-level nav" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>