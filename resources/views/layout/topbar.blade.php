            <!-- top navbar-->
            @if ($admin)
            <header class="header-container admin">
            @else
            <header class="header-container">
            @endif
                <nav>
                  <ul class="visible-xs visible-sm">
                    <li>
                      <a class="menu-link menu-link-slide" id="sidebar-toggler" href="#">
                        <span><em></em></span>
                      </a>
                    </li>
                  </ul>
                  <ul class="hidden-xs">
                    <li>
                      <a class="menu-link menu-link-slide" id="offcanvas-toggler" href="#">
                        <span><em></em></span>
                      </a>
                    </li>
                  </ul>
                  <h2 class="header-title">@yield('title')</h2>
                </nav>
            </header>