 <!--Main Navigation-->
 <header>
     @include('admin.sections.left-nav')
     
     <!-- Navbar -->
     <div class="row">
         <div class="col-lg-12">
             <nav id="main-navbar" class="navbar navbar-expand-lg bg-white fixed-top">
                 <!-- Container wrapper -->
                 <div class="container-fluid">
                     <!-- Toggle button -->
                     <button data-mdb-button-init class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu"
                         aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                         <i class="fas fa-bars"></i>
                     </button>

                     <!-- Brand -->
                     <a class="navbar-brand" href="#">
                         <img src="https://www.logolounge.com/wp-content/uploads/2023/12/5_452189-300x300.png" height="66" alt="logo"
                             loading="lazy" style="margin-top: -3px;" />
                     </a>
                     <!-- Search form -->
                     <!-- <form class="d-none d-md-flex input-group w-auto my-auto">
                    <input autocomplete="off" type="search" class="form-control rounded"
                        placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px;" />
                    <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
                </form> -->

                     <!-- Right links -->
                     <ul class="navbar-nav ms-auto d-flex flex-row">
                         <!-- Notification dropdown -->
                         <li class="nav-item dropdown">
                             <a data-mdb-dropdown-init class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                                 role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                 <i class="fas fa-bell"></i>
                                 <span class="badge rounded-pill badge-notification bg-danger">1</span>
                             </a>
                             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                 <li>
                                     <a class="dropdown-item" href="#">Some news</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#">Another news</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#">Something else here</a>
                                 </li>
                             </ul>
                         </li>

                         <!-- Icon -->
                         <li class="nav-item">
                             <a class="nav-link me-3 me-lg-0" href="#">
                                 <i class="fas fa-fill-drip"></i>
                             </a>
                         </li>
                         <!-- Icon -->
                         <li class="nav-item me-3 me-lg-0">
                             <a class="nav-link" href="#">
                                 <i class="fab fa-github"></i>
                             </a>
                         </li>

                         <!-- Icon dropdown -->
                         <li class="nav-item dropdown">
                             <a data-mdb-dropdown-init class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown"
                                 role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                 <i class="united kingdom flag m-0"></i>
                             </a>
                             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                                         <i class="fa fa-check text-success ms-2"></i></a>
                                 </li>
                                 <li>
                                     <hr class="dropdown-divider" />
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
                                 </li>
                             </ul>
                         </li>

                         <!-- Avatar -->
                         <li class="nav-item dropdown">
                             <a data-mdb-dropdown-init class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                                 id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                 <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle"
                                     height="22" alt="Avatar" loading="lazy" />
                             </a>
                             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                 <li>
                                     <a class="dropdown-item" href="#">My profile</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#">Settings</a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item" href="#">Logout</a>
                                 </li>
                             </ul>
                         </li>
                     </ul>
                 </div>
                 <!-- Container wrapper -->
         </div>
     </div>
     </nav>
     <!-- Navbar -->
 </header>
 <!--Main Navigation-->