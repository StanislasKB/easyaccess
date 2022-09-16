            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="/accueil" class="app-brand-link">
                        <span class="app-brand-logo demo h4">
                            EasyAccess
                        </span>
                      
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="new-epreuve.php" class="menu-link"> <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Ajouter d'epreuve</div>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a href="my-epreuve.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mes epreuves</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="my-favorites.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mes favoris</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="my-profile.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mon profil</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="my-discussions.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mes discussions</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <form action="/search/index.php" method="get">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                            <button class="btn btn-light" type="submit" ><i class="bx bx-search fs-4 lh-0"></i></button>
                                <input type="search" name="epreuve" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                                </div>
                            </form>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->

                            <?php
 $profil=$db->prepare('SELECT * FROM users WHERE  id_user=?');
 $profil->execute(array($_SESSION['id']));
 $profils=$profil->fetch();
 ?>
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/<?=$profils['url']?>"  alt class="rounded-circle" style="width:40px; height:40px" />
                                    </div>
                                </a>
                               
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../assets/img/avatars/<?=$profils['url']?>" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?=$profils['prenom']?></span>
                                                    <small class="text-muted"><?=$profils['profession']?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="my-profile.php">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Mon Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Deconnexion</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>