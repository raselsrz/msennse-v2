<body class="body">

<div class="preload preload-container">
        <div class="middle"></div>
    </div>

    <!-- wrapper -->
    <div id="wrapper">
        <!-- layout-wrap -->
        <div class="layout-wrap relative">
            <!-- button-show-hide -->
            <div class="button-show-hide">
                <div class="mobile-button"><span></span></div>
            </div>
            <!-- /button-show-hide -->
            <!-- section-menu-left -->
            <div class="section-menu-left">
                <div class="center">
                    <div class="center-item images-wrap profiles ">
                        @if(Auth::user()->profile_image != null)
                            <img src="{{Auth::user()->profile_image}}" alt="">
                        @else
                            <img src="{{asset('images/avatar/user-1.png')}}" alt="">
                        @endif
                        <div class="profiles-price">
                            <span>
                                {{ __('Name:') }} {{ Auth::user()->username }}
                            </span>
                            <span>
                                {{ __('Amount:') }} ${{ Auth::user()->wallet_balance}}
                            </span>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="center-item">
                        <ul class="menu-list">
                            <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
                                <a href="{{ route('dashboard') }}" class="">
                                    <div class="icon"><i class="bi bi-house"></i></div>
                                    <div class="text">{{ __('Home') }}</div>
                                </a>
                            </li>

                            {{-- My Task --}}
                            <li class="menu-item {{ Request::is('tasks') ? 'active' : '' }}">
                                <a href="{{ route('tasks') }}" class="menu-item-button">
                                    <div class="icon"><i class="bi bi-list-check"></i></div>
                                    <div class="text">{{ __('My Task') }}</div>
                                </a>
                            </li>

                            <li class="menu-item {{ Request::is('packages') ? 'active' : '' }}">
                                <a href="{{ route('packages') }}" class="menu-item-button">
                                    <div class="icon"><i class="bi bi-box"></i></div>
                                    <div class="text">{{ __('Packages') }}</div>
                                </a>
                            </li>

                            <li class="menu-item {{ Request::is('diposit') ? 'active' : '' }}">
                                <a href="{{ route('diposit') }}" class="menu-item-button">
                                    <div class="icon"><i class="bi bi-piggy-bank"></i></div>
                                    <div class="text">{{ __('Deposit') }}</div>
                                </a>
                            </li>

                            <li class="menu-item {{ Request::is('withdraw') ? 'active' : '' }}">
                                <a href="{{ route('withdraw') }}" class="menu-item-button">
                                    <div class="icon"><i class="bi bi-cash"></i></div>
                                    <div class="text">{{ __('Withdrawal') }}</div>
                                </a>
                            </li>

                            <li class="menu-item {{ Request::is('transactions') ? 'active' : '' }}">
                                <a href="{{ route('transactions') }}" class="menu-item-button">
                                    <div class="icon"><i class="bi bi-clock-history"></i></div>
                                    <div class="text">{{ __('Transaction') }}</div>
                                </a>
                            </li>

                            <li class="menu-item {{ Request::is('referral') ? 'active' : '' }}">
                                <a href="{{ route('referral') }}" class="menu-item-button">
                                    <div class="icon"><i class="bi bi-person-plus"></i></div>
                                    <div class="text">{{ __('Refer & Earn') }}</div>
                                </a>
                            </li>

                            {{-- support --}}
                            <li class="menu-item {{ Request::is('support') ? 'active' : '' }}">
                                <a href="{{ route('support') }}" class="">
                                    <div class="icon"><i class="bi bi-chat-left-text"></i></div>
                                    <div class="text">{{ __('Support') }}</div>
                                </a>
                            </li>


                            <li class="menu-item {{ Request::is('profile') ? 'active' : '' }}">
                                <a href="{{ route('profile') }}" class="">
                                    <div class="icon"><i class="bi bi-person-circle"></i></div>
                                    <div class="text">{{ __('My Account') }}</div>
                                </a>
                            </li>

                            {{-- logout --}}
                            <li class="menu-item">
                                <a href="{{ route('logout') }}" class="">
                                    <div class="icon"><i class="bi bi-box-arrow-right"></i></div>
                                    <div class="text">{{ __('Logout') }}</div>
                                </a>
                            </li>


                            <div class="header-coins">
    <select class="image-select" id="languageSwitcher" onchange="changeLanguage(this)">
        <option disabled>{{ __('Select Language') }}</option>

        @foreach (get_languages() as $lang)
            <option value="{{ $lang->iso_code }}"
                {{ session('local', 'en') == $lang->iso_code ? 'selected' : '' }}>
                {{ $lang->language }}
            </option>
        @endforeach
    </select>

    <script>
        function changeLanguage(select) {
            if (select.value) {
                window.location.href = '/local/' + select.value;
            }
        }
    </script>
</div>



                        </ul>

                    </div>
                    <div class="divider"></div>
                    <div class="center-item">
                        <div class="community">
                            <div class="tite-item">{{ __('Join Our Community') }}</div>
                            <ul class="tf-social style-1 flex-wrap">
                                <li><a href="{{get_option('facebook', '')}} " target="_blank"><i
                                            class="icon-facebook"></i></a></li>
                                <li><a href="{{get_option('telegram', '')}} " target="_blank"><i
                                            class="icon-send"></i></a></li>
                                <li><a href="{{get_option('linkedin', '')}} " target="_blank"><i
                                            class="icon-linkedin2"></i></a></li>
                                <li><a href="{{get_option('twitter', '')}} " target="_blank"><i
                                            class="icon-twitter"></i></a></li>
                                <li><a href="{{get_option('youtube', '')}} " target="_blank"><i
                                            class="icon-youtube"></i></a></li>
                                <li><a href="{{get_option('tiktok', '')}} " target="_blank"><i
                                            class="icon-tiktok"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /section-menu-left -->
            <!-- header-dashboard -->
            <div class="header-dashboard">
                <div class="wrap">
                    <div class="header-left">
                        <div class="header-logo">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ get_option('logo') }}" alt="logo" data-retina="{{ get_option('logo') }}">
                            </a>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="header-account">
                            <div class="popup-wrap account">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="popup-top">
                                            <span class="image">
                                                @if(Auth::user()->profile_image != null)
                                                    <img src="{{Auth::user()->profile_image}}" alt="">
                                                @else
                                                    <img src="{{asset('images/avatar/user-1.png')}}" alt="">
                                                @endif
                                            </span>
                                            <span class="name">
                                                <span class="text">{{ __('Profile') }}</span>
                                                <i class="icon-arrow-down"></i>
                                            </span>
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <li>
                                            <a href="{{ route('profile') }}" class="item">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.4993 4C10.4993 4.66304 10.2359 5.29893 9.7671 5.76777C9.29826 6.23661 8.66237 6.5 7.99933 6.5C7.33629 6.5 6.70041 6.23661 6.23157 5.76777C5.76273 5.29893 5.49933 4.66304 5.49933 4C5.49933 3.33696 5.76273 2.70107 6.23157 2.23223C6.70041 1.76339 7.33629 1.5 7.99933 1.5C8.66237 1.5 9.29826 1.76339 9.7671 2.23223C10.2359 2.70107 10.4993 3.33696 10.4993 4ZM3 13.412C3.02142 12.1002 3.55756 10.8494 4.49278 9.92936C5.42801 9.00929 6.68739 8.49365 7.99933 8.49365C9.31127 8.49365 10.5707 9.00929 11.5059 9.92936C12.4411 10.8494 12.9772 12.1002 12.9987 13.412C11.4303 14.1312 9.72477 14.5023 7.99933 14.5C6.21533 14.5 4.522 14.1107 3 13.412Z"
                                                        stroke="#fff" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                {{ __('My Account') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('withdraw') }}" class="item">
                                                <i class="icon-wallet"></i>
                                                {{ __('Wallet') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" class="item">
                                                <i class="icon-log-out"></i>
                                                {{ __('Log Out') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /header-dashboard -->
            <!-- sidebar-dashboard -->