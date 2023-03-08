<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="{{ route('admin.home') }}">
            <img src="{{ asset('assets/admin/images/brand/logo/logo.svg') }}" alt="" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow " href="{{ route('admin.home') }}">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i>  Панел администратора
                </a>

            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Меню</div>
            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow " href="#!" data-bs-toggle="collapse" data-bs-target="#navPages" aria-expanded="false" aria-controls="navPages">
                    <i data-feather="layers" class="nav-icon icon-xs me-2"></i> Товары
                </a>

                <div id="navPages" class="collapse  show " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  {{ active('admin.product_category*') }}" href="{{route('admin.product_category')}}">Категории</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active(['admin.product', 'admin.product.*']) }}" href="{{route('admin.product')}}">Товары</a>
                        </li>
                    </ul>
                </div>
            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                    <i data-feather="lock" class="nav-icon icon-xs me-2"></i> Страницы
                </a>
                <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link {{ active('admin.feedback*') }}" href="{{route('admin.feedback')}}">Обратная связь</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active('admin.contact*') }}" href="{{route('admin.contact')}}">Контакты</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/layout.html">
                    <i
                        data-feather="sidebar"

                        class="nav-icon icon-xs me-2"
                    >
                    </i
                    >
                    Layouts
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">UI Components</div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow " href="../docs/accordions.html" >
                    <i data-feather="package" class="nav-icon icon-xs me-2" >
                    </i>  Components
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevel" aria-expanded="false" aria-controls="navMenuLevel">
                    <i
                        data-feather="corner-left-down"

                        class="nav-icon icon-xs me-2"
                    >
                    </i
                    > Menu Level
                </a>
                <div id="navMenuLevel" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevelSecond" aria-expanded="false" aria-controls="navMenuLevelSecond">
                                Two Level
                            </a>
                            <div id="navMenuLevelSecond" class="collapse" data-bs-parent="#navMenuLevel">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="#!">  NavItem 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#!">  NavItem 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow  collapsed  " href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThree" aria-expanded="false" aria-controls="navMenuLevelThree">
                                Three Level
                            </a>
                            <div id="navMenuLevelThree" class="collapse " data-bs-parent="#navMenuLevel">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThreeOne" aria-expanded="false" aria-controls="navMenuLevelThreeOne">
                                            NavItem 1
                                        </a>
                                        <div id="navMenuLevelThreeOne" class="collapse collapse " data-bs-parent="#navMenuLevelThree">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#!">
                                                        NavChild Item 1
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#!">  Nav Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Documentation</div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow " href="../docs/index.html" >
                    <i data-feather="clipboard" class="nav-icon icon-xs me-2" >
                    </i>  Docs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link has-arrow " href="../docs/changelog.html" >
                    <i data-feather="git-pull-request" class="nav-icon icon-xs me-2" >
                    </i>  Changelog
                </a>
            </li>




        </ul>

    </div>
</nav>
