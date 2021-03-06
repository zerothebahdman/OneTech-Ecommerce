<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <form class="d-none d-sm-inline-block">
        <div class="input-group input-group-navbar">
            <input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
            <div class="input-group-append">
                <button class="btn" type="button">
                    <i class="align-middle" data-feather="search"></i>
                </button>
            </div>
        </div>
    </form>


    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="message-circle"></i>
                        <span class="indicator">4</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            4 New Messages
                        </div>
                    </div>
                    <div class="list-group">

                        <a href="#" class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-2">
                                    <img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle"
                                        alt="Stacie Hall">
                                </div>
                                <div class="col-10 pl-2">
                                    <div class="text-dark">Stacie Hall</div>
                                    <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.
                                    </div>
                                    <div class="text-muted small mt-1">4h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-2">
                                    <img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle"
                                        alt="Bertha Martin">
                                </div>
                                <div class="col-10 pl-2">
                                    <div class="text-dark">Bertha Martin</div>
                                    <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed,
                                        posuere ac, mattis non.</div>
                                    <div class="text-muted small mt-1">5h ago</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Show all messages</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="bell-off"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header">
                        4 New Notifications
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-2">
                                    <i class="text-danger" data-feather="alert-circle"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Update completed</div>
                                    <div class="text-muted small mt-1">Restart server 12 to complete the
                                        update.
                                    </div>
                                    <div class="text-muted small mt-1">2h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-2">
                                    <i class="text-warning" data-feather="bell"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Lorem ipsum</div>
                                    <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate
                                        hendrerit et.</div>
                                    <div class="text-muted small mt-1">6h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-2">
                                    <i class="text-primary" data-feather="home"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Login from 192.186.1.1</div>
                                    <div class="text-muted small mt-1">8h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-2">
                                    <i class="text-success" data-feather="user-plus"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">New connection</div>
                                    <div class="text-muted small mt-1">Anna accepted your request.</div>
                                    <div class="text-muted small mt-1">12h ago</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Show all notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                    @if (!is_null(Auth::guard('admin')->user()->profile_photo))
                        <img src="{{ asset(Auth::guard('admin')->user()->profile_photo) }}"
                            class="avatar img-fluid rounded-circle mr-1"
                            alt="{{ Auth::guard('admin')->user()->name }} Profile Photo" />
                    @else
                        <img src="{{ asset('backend/img/avatars/avatar-7.png') }}"
                            class="avatar img-fluid rounded-circle mr-1"
                            alt="{{ Auth::guard('admin')->user()->name }} Profile Photo" />
                    @endif
                    <span class="text-dark">{{ Auth::guard('admin')->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="align-middle mr-1"
                            data-feather="user"></i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.profile.settings') }}"><i class="align-middle mr-1"
                            data-feather="settings"></i>Profile Settings</a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="align-middle mr-1"
                            data-feather="log-out"></i>Sign out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
