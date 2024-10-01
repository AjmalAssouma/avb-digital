<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | DASHBOARD'}}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
        <!-- C3 charts css -->
        <link href="{{asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />
        <!-- App css -->
        <link href="{{asset('assetss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />

        <script src="{{asset('assetss/js/modernizr.min.js')}}"></script>
    </head>


    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <!-- Image logo -->
                    <a href="{{route('home')}}" class="logo">
                        <span>
                            <img src="{{asset('assets/img/logoAAVIE.png')}}" alt="" height="90" width="190" >
                        </span>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Navbar-left -->
                        <ul class="nav navbar-left">
                            <li>
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-right list-inline">
                            <li class="d-none d-sm-block list-inline-item">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li class="list-inline-item">
                                <div class="dropdown">
									<a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
										<i class="dripicons-bell"></i>
										<span class="badge badge-pill badge-pink">4</span>
									</a>
	
									<ul class="dropdown-menu dropdown-menu-right dropdown-lg user-list notify-list">
										<li class="list-group notification-list m-b-0">
											<div class="slimscroll">
												<!-- list item-->
												<a href="javascript:void(0);" class="list-group-item">
													<div class="media">
														<div class="media-left p-r-10">
														<em class="fa fa-diamond bg-primary"></em>
														</div>
														<div class="media-body">
														<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
														<p class="m-0">
															There are new settings available
														</p>
														</div>
													</div>
												</a>
	
												<!-- list item-->
												<a href="javascript:void(0);" class="list-group-item">
													<div class="media">
														<div class="media-left p-r-10">
														<em class="fa fa-cog bg-warning"></em>
														</div>
														<div class="media-body">
														<h5 class="media-heading">New settings</h5>
														<p class="m-0">
															There are new settings available
														</p>
														</div>
													</div>
												</a>
	
												<!-- list item-->
												<a href="javascript:void(0);" class="list-group-item">
													<div class="media">
														<div class="media-left p-r-10">
														<em class="fa fa-bell-o bg-custom"></em>
														</div>
														<div class="media-body">
														<h5 class="media-heading">Updates</h5>
														<p class="m-0">
															There are <span class="text-primary font-600">2</span> new updates available
														</p>
														</div>
													</div>
												</a>
	
												<!-- list item-->
												<a href="javascript:void(0);" class="list-group-item">
													<div class="media">
														<div class="media-left p-r-10">
														<em class="fa fa-user-plus bg-danger"></em>
														</div>
														<div class="media-body">
														<h5 class="media-heading">New user registered</h5>
														<p class="m-0">
															You have 10 unread messages
														</p>
														</div>
													</div>
												</a>
	
												<!-- list item-->
												<a href="javascript:void(0);" class="list-group-item">
													<div class="media">
														<div class="media-left p-r-10">
														<em class="fa fa-diamond bg-primary"></em>
														</div>
														<div class="media-body">
														<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
														<p class="m-0">
															There are new settings available
														</p>
														</div>
													</div>
												</a>
	
												<!-- list item-->
												<a href="javascript:void(0);" class="list-group-item">
													<div class="media">
														<div class="media-left p-r-10">
														<em class="fa fa-cog bg-warning"></em>
														</div>
														<div class="media-body">
														<h5 class="media-heading">New settings</h5>
														<p class="m-0">
															There are new settings available
														</p>
														</div>
													</div>
												</a>
											</div>
										</li>
										<!-- end notification list -->
									</ul>
								</div>
                            </li>

                            <li class="dropdown user-box list-inline-item">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}" alt="user-img" class="rounded-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li><a href="{{ route('home.userprofil') }}" class="dropdown-item">Profile</a></li>
                                    <li><a href="" class="dropdown-item"><span class="badge badge-pill badge-info float-right">4</span>Paramètres</a></li>
                                    {{-- <li><a href="javascript:void(0)" class="dropdown-item">Lock screen</a></li> --}}
                                    <li class="dropdown-divider"></li>
                                    <li><a href="{{ route('logout') }}" class="dropdown-item">Déconnexion</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container-fluid -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{route('home')}}"><i class="fi-air-play"></i><span class="badge badge-pill badge-success float-right">1</span><span>Tableau de bord</span></a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i><span>UI Kit</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-cards.html">Cards</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="ui-tabs.html">Tabs</a></li>
                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                    <li><a href="ui-notifications.html">Notification</a></li>
                                    <li><a href="ui-carousel.html">Carousel</a>
                                    <li><a href="ui-video.html">Video</a>
                                    <li><a href="ui-tooltips-popovers.html">Tooltips & Popovers</a></li>
                                    <li><a href="ui-images.html">Images</a></li>
                                    <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-box"></i><span>Icons</span><span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="icons-colored.html">Colored Icons</a></li>
                                    <li><a href="icons-materialdesign.html">Material Design</a></li>
                                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                                    <li><a href="icons-fontawesome.html">Font awesome</a></li>
                                    <li><a href="icons-feather.html">Feather Icons</a></li>
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
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
							<div class="col-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Welcome {{ $firstname }} {{ $lastname }}</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('home')}}">Tableau de bord</a>
                                        </li>
                                        <!--<li>-->
                                            <!--<a href="#">Dashboard</a>-->
                                        <!--</li>-->
                                        <li class="active">
                                            Tableau de bord
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two widget-two-purple">
                                    <div class="card-body">
                                        <i class="mdi mdi-chart-line widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase text-white font-600 font-secondary text-overflow" title="Statistics">Statistics</p>
                                            <h2 class="text-white"><span data-plugin="counterup">65841</span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                                            <p class="text-white m-0"><b>10%</b> From previous period</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two widget-two-info">
                                    <div class="card-body">
                                        <i class="mdi mdi-access-point-network widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-white text-uppercase font-600 font-secondary text-overflow" title="User Today">User Today</p>
                                            <h2 class="text-white"><span data-plugin="counterup">52142</span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                                            <p class="text-white m-0"><b>5.6%</b> From previous period</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two widget-two-pink">
                                    <div class="card-body">
                                        <i class="mdi mdi-timetable widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase text-white font-600 font-secondary text-overflow" title="Request Per Minute">Request Per Minute</p>
                                            <h2 class="text-white"><span data-plugin="counterup">2365</span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                                            <p class="text-white m-0"><b>7.02%</b> From previous period</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two widget-two-success">
                                    <div class="card-body">
                                        <i class="mdi mdi-cloud-download widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-white text-uppercase font-600 font-secondary text-overflow" title="New Downloads">New Downloads</p>
                                            <h2 class="text-white"><span data-plugin="counterup">854</span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                                            <p class="text-white m-0"><b>9.9%</b> From previous period</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title m-t-0 m-b-30">Last 30 days statistics</h4>
    
                                        <div class="">
                                            <div id="donut-chart" class="ct-chart ct-golden-section dash-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title m-t-0 m-b-30">Total Revenue share</h4>
                                        <div>
                                            <div id="combine-chart" class="ct-chart ct-golden-section dash-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title m-t-0 m-b-30">Total Revenue share</h4>
                                        <div class="">
                                            <div id="roated-chart" class="ct-chart ct-golden-section dash-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title m-t-0 m-b-20">Recent Projects</h4>
    
                                        <div class="table-responsive">
                                            <table class="table m-b-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Codefox Admin v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge badge-info">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Codefox Frontend v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge badge-success">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Codefox Admin v1.1</td>
                                                        <td>01/05/2017</td>
                                                        <td>10/05/2017</td>
                                                        <td><span class="badge badge-pink">Pending</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Codefox Frontend v1.1</td>
                                                        <td>01/01/2017</td>
                                                        <td>31/05/2017</td>
                                                        <td><span class="badge badge-purple">Work in Progress</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Codefox Admin v1.3</td>
                                                        <td>01/01/2017</td>
                                                        <td>31/05/2017</td>
                                                        <td><span class="badge badge-warning">Coming soon</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Codefox Admin v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge badge-info">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Codefox Frontend v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge badge-success">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>Codefox Admin v1.1</td>
                                                        <td>01/05/2017</td>
                                                        <td>10/05/2017</td>
                                                        <td><span class="badge badge-pink">Pending</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="bg-icon float-left">
                                                    <i class="fi-server"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-uppercase font-14 m-b-10 font-600">Statistics</p>
                                                    <h2 class="m-b-10"><span data-plugin="counterup">2,562</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="bg-icon float-left">
                                                    <i class="fi-briefcase"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="m-b-10 text-uppercase font-14 font-600">User Today</p>
                                                    <h2 class="m-b-10"><span data-plugin="counterup">8,542</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="bg-icon float-left">
                                                    <i class="fi-inbox"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="m-b-10 text-uppercase font-14 font-600">Request Per Minute</p>
                                                    <h2 class="m-b-10"><span data-plugin="counterup">6,254</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="bg-icon float-left">
                                                    <i class="fi-bar-graph-2"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="m-b-10 text-uppercase font-14 font-600">New Downloads</p>
                                                    <h2 class="m-b-10"><span data-plugin="counterup">7,524</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-user">
                                            <div class="card-body">
                                                <div>
                                                    <img src="{{asset('assetss/images/users/avatar-3.jpg')}}" class="img-fluid d-block rounded-circle" alt="user">
                                                    <div class="wid-u-info">
                                                        <h5 class="m-t-20 m-b-5">Chadengle</h5>
                                                        <p class="text-muted m-b-0 font-14">coderthemes@gmail.com</p>
                                                        <div class="user-position">
                                                            <span class="text-warning font-secondary">Admin</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-user">
                                            <div class="card-body">
                                                <img src="{{asset('assetss/images/users/avatar-2.jpg')}}" class="img-fluid d-block rounded-circle" alt="user">
                                                <div class="wid-u-info">
                                                    <h5 class="m-t-20 m-b-5"> Michael Zenaty</h5>
                                                    <p class="text-muted m-b-0 font-14">coderthemes@gmail.com</p>
                                                    <div class="user-position">
                                                        <span class="text-info font-secondary">User</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->    


                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <footer class="footer">
                    2016 - 2019 © Codefox. <span class="d-none d-sm-inline-block"> - Coderthemes.com</span>
                </footer>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('assetss/js/jquery.min.js')}}"></script>
        <script src="{{asset('assetss/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assetss/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('assetss/js/waves.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>

        <!-- Counter js  -->
        <script src="{{asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>

        <!--C3 Chart-->
        <script src="{{asset('plugins/d3/d3.min.js')}}"></script>
        <script src="{{asset('plugins/c3/c3.min.js')}}"></script>

        <!-- Dashboard init -->
        <script src="{{asset('assetss/pages/jquery.dashboard.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.app.js')}}"></script>
    
    </body>
</html>