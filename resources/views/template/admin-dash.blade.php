@php
use App\Models\User;
use App\Models\ContactForm;

 $contactForms = ContactForm::where('seen', false)
    ->orderBy('created_at', 'desc')
    ->limit(5)
    ->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset("assets/uploads/setting/".User::first()->profile_image)}}" type="image/x-icon">
    <link href="{{asset('assets/backend/css/sb-admin-2.min.css')}}" rel="stylesheet" />
    <title>{{User::first()->name}} - @yield("title")</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('backend.index')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Portfolio Manager</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{route("backend.index")}}">
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>

        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Setting</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route("backend.setting.index")}}">View</a>

                </div>
            </div>
        </li>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#services"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-sliders"></i>
                <span>Services</span>
            </a>
            <div id="services" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('backend.services.index')}}">List</a>
                    <a class="collapse-item" href="{{route('backend.services.create')}}">Create</a>
                </div>
            </div>
        </li>
 <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-sliders"></i>
                <span>About</span>
            </a>
            <div id="about" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('backend.about.index')}}">List</a>
                    <a class="collapse-item" href="{{route('backend.about.create')}}">Create</a>

                </div>
            </div>
        </li>
 <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#options"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-list-check"></i>
                <span>Options</span>
            </a>
            <div id="options" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('backend.options.index')}}">View</a>
                    <a class="collapse-item" href="{{route('backend.options.edit')}}">Edit</a>

                </div>
            </div>
        </li>

        <!-- Divider --><!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gallery"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-photo-film"></i>
                <span>Gallery</span>
            </a>
            <div id="gallery" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('backend.gallery.index')}}">List</a>
                    <a class="collapse-item" href="{{route('backend.gallery.create')}}">Create</a>

                </div>
            </div>
        </li>
        <!-- Divider --><!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blogs"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-regular fa-copy"></i>
                <span>Blogs</span>
            </a>
            <div id="blogs" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('backend.blogs.index')}}">List</a>
                    <a class="collapse-item" href="{{route('backend.blogs.create')}}">Create</a>
                </div>
            </div>
        </li>
        <!-- Divider --><!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#projects"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-regular fa-copy"></i>
                <span>Projects</span>
            </a>
            <div id="projects" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('backend.projects.index')}}">List</a>
                    <a class="collapse-item" href="{{route('backend.projects.create')}}">Create</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <!-- Divider --><!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contact"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-at"></i>
                <span>Contact</span>
            </a>
            <div id="contact" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('backend.contact.index')}}">List</a>


                </div>
            </div>
        </li>

        <!-- Divider -->


        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">{{$contactForms->count()}}</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Contact Notifications
                            </h6>

                            @forelse($contactForms as $form)
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">

                                    <img class="rounded-circle" src="{{asset("assets/uploads/setting/communication.png")}}"
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">{{$form->subject}}</div>
                                    <div class="small text-gray-500">{{$form->message}} · {{$form->created_at->format('M d, Y')}}</div>
                                </div>
                            </a>
                            @empty
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">

                                        <img class="rounded-circle" src="{{asset("assets/uploads/setting/communication.png")}}"
                                             alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">No new notifications found</div>

                                    </div>
                                </a>
                            @endforelse
                            <a class="dropdown-item text-center small text-gray-500" href="{{route("backend.contact.index")}}">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                            <img class="img-profile rounded-circle"
                                 src="{{asset("assets/uploads/setting/".User::first()->profile_image)}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">



                <div class="card shadow mb-4" bis_size="{&quot;x&quot;:880,&quot;y&quot;:1184,&quot;w&quot;:608,&quot;h&quot;:229,&quot;abs_x&quot;:880,&quot;abs_y&quot;:1247}">
                    <div class="card-header py-3" bis_size="{&quot;x&quot;:881,&quot;y&quot;:1185,&quot;w&quot;:606,&quot;h&quot;:52,&quot;abs_x&quot;:881,&quot;abs_y&quot;:1248}">
                        <h6 class="m-0 font-weight-bold text-primary" bis_size="{&quot;x&quot;:901,&quot;y&quot;:1201,&quot;w&quot;:566,&quot;h&quot;:19,&quot;abs_x&quot;:901,&quot;abs_y&quot;:1264}">@yield("title")</h6>
                    </div>
                    @yield('content')
                </div>


            </div>

            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{User::first()->name}}</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route("backend.user.logout")}}">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/assets/backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- Core plugin JavaScript-->
<script src="{{asset('/assets/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>


<!-- Custom scripts for all pages-->
<script src="{{asset('/assets/backend/js/sb-admin-2.min.js')}}"></script>
<script src="js/sb-admin-2.min.js"></script>
@yield('js')


</body>

</html>
