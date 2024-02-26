<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu" style="border: none">
    <!-- LOGO -->
    <div class="navbar-brand-box" style="background-color: #1C1C36">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('images/logo.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('images/logo.png')); ?>" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('images/logo.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('images/logo.png')); ?>" alt="" height="17">
            </span>
        </a>
        <button type="button" class="p-0 btn btn-sm fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" class="">
        <div class="container-fluid">
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title">
                    <span>
                        <?php echo app('translator')->get('translation.menu'); ?>
                    </span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span><?php echo app('translator')->get('translation.dashboards'); ?>
                        </span>
                    </a>
                </li>
                <?php if(Auth::user()->hasRole('Administrateur')): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->is('annees-academique*') ? 'active' : ''); ?>" href="" role="button" aria-expanded="false"
                            aria-controls="sidebarDashboards">
                            <i class="bx bx-task"></i> <span>
                                Année académique
                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->hasRole('Administrateur')||Auth::user()->hasRole('Ufr')): ?>
                    <?php if(Auth::user()->hasRole('Personnel')): ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="" role="button" aria-expanded="false"
                                aria-controls="sidebarDashboards">
                                <i class="bx bx-task"></i> <span>
                                    Contrats
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->hasRole('Programmation')||Auth::user()->hasRole('Assistant Programmation')): ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo e(route('programmations.index')); ?>" role="button" aria-expanded="false"
                                aria-controls="sidebarDashboards">
                                <i class="bx bx-task"></i> <span>
                                    Programmation
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->is('admin/enseignants*') ? 'active' : ''); ?>" href="<?php echo e(route('enseignants.index')); ?>" role="button" aria-expanded="false"
                            aria-controls="sidebarDashboards">
                            <i class="bx bx-task"></i> <span>
                                Enseignants
                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->hasRole('Chef de Département')): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->is('cours*') ? 'active' : ''); ?>" href="<?php echo e(route('cours.index')); ?>" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="bx bx-task"></i> <span>
                            Tables de spécification
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->is('cours*') ? 'active' : ''); ?>" href="<?php echo e(route('cours.transmettre')); ?>" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="bx bx-task"></i> <span>
                            Transférer les TS
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarMultilevel" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="ri-stack-line"></i> <span data-key="t-multi-level">Mon département</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(route('filieres.index')); ?>" class="nav-link" data-key="t-level-1.1">Filières</a>
                            </li>
                        </ul>
                    </div>

                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(route('classes.index')); ?>" class="nav-link" data-key="t-level-1.1">Classes</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>



                <?php if(Auth::user()->hasRole('Ufr')): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarMultilevel" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="ri-stack-line"></i> <span data-key="t-multi-level">Mon UFR</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(route('departements.index')); ?>" class="nav-link" data-key="t-level-1.1">Départements</a>
                            </li>
                        </ul>
                    </div>

                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(route('filieres.index')); ?>" class="nav-link" data-key="t-level-1.1">Filières</a>
                            </li>
                        </ul>
                    </div>

                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(route('classes.index')); ?>" class="nav-link" data-key="t-level-1.1">Classes</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>

                <?php if(Auth::user()->hasRole('Administrateur')||Auth::user()->hasRole('Manager')): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->is('admin/users') ? 'active' : ''); ?>" href="<?php echo e(route('users.index')); ?>" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-account-circle-line"></i> <span>
                                Gestion des utilisateurs
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarMultilevel" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="ri-stack-line"></i> <span data-key="t-multi-level">Paramètres</span>
                        </a>
                        <?php if(Auth::user()->hasRole('Administrateur')): ?>
                            <div class="collapse menu-dropdown" id="sidebarMultilevel">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('universites.index')); ?>" class="nav-link"
                                            data-key="t-level-1.1">Universités</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="collapse menu-dropdown" id="sidebarMultilevel">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('ufrs.index')); ?>" class="nav-link" data-key="t-level-1.1">UFR</a>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('departements.index')); ?>" class="nav-link" data-key="t-level-1.1">Départements</a>
                                </li>
                            </ul>
                        </div>

                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('filieres.index')); ?>" class="nav-link" data-key="t-level-1.1">Filières</a>
                                </li>
                            </ul>
                        </div>

                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('classes.index')); ?>" class="nav-link" data-key="t-level-1.1">Classes</a>
                                </li>
                            </ul>
                        </div>

                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('cycles.index')); ?>" class="nav-link" data-key="t-level-1.1">Cycles</a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('banques.index')); ?>" class="nav-link"
                                        data-key="t-level-1.1">Banques</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>

</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH C:\Users\Hervé Carlos\Documents\econtrat\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>