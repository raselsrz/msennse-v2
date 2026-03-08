
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="{{route('admin.dashboard')}}">
                <h3 class="text-success"><span class="text-info">Money </span>App</h3>
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://img.icons8.com/bubbles/100/000000/user.png" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="{{route('admin.profile')}}" class="dropdown-item">Profile</a>
                        <a href="{{route('admin.settings')}}" class="dropdown-item">Settings</a>
                        <hr class="dropdown-divider">
                        <a href="/logout" onclick="return confirm('Are you sure you want to logout?')" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                
                    {{-- Plans --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.plans.index')}}">
                            <i class="bi bi-box-seam"></i> Subscriptions
                        </a>
                    </li>
                
                    {{-- Tasks --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.tasks.index')}}">
                            <i class="bi bi-list-task"></i> Tasks
                        </a>
                    </li>
                
                    {{-- Deposits --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.diposits.index')}}">
                            <i class="bi bi-wallet-fill"></i> Deposits
                        </a>
                    </li>
                
                    {{-- Withdrawals --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.withdrawals.index')}}">
                            <i class="bi bi-cash-coin"></i> Withdrawals
                        </a>
                    </li>
                
                    {{-- Users --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}">
                            <i class="bi bi-people-fill"></i> Users
                        </a>
                    </li>

                    {{-- blog --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.news.index')}}">
                            <i class="bi bi-journal-text"></i> Blog
                        </a>
                    </li>

                    {{-- message --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.message.messageHome')}}">
                            <i class="bi bi-chat-left-text"></i> Messages
                        </a>
                    </li>

                    {{-- comments --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.comments.index')}}">
                            <i class="bi bi-chat-left-text"></i> Comments
                        </a>
                    </li>
                
                    {{-- Categories --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.categories.categoriesHome')}}">
                            <i class="bi bi-tags"></i> Categories
                        </a>
                    </li>

                    {{-- languages --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.languages.index')}}">
                            <i class="bi bi-translate"></i> Languages
                        </a>
                    </li>
                
                    {{-- My Profile --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.profile')}}">
                            <i class="bi bi-person-circle"></i> My Profile
                        </a>
                    </li>
                
                    {{-- Settings --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.settings')}}">
                            <i class="bi bi-gear-wide-connected"></i> Settings
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.cache')}}">
                            <i class="bi bi-gear-wide-connected"></i>Cache clear
                        </a>
                    </li>
                
                    {{-- Logout --}}
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{route('logout')}}" onclick="return confirm('Are you sure you want to logout?')">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
                
                    

            </div>
        </div>
    </nav>
