          <!-- sidebar-->
          @if ($admin)
            <aside class="sidebar-container admin">
          @else
            <aside class="sidebar-container">
          @endif
          

            <div class="sidebar-header">
              <div class="pull-right pt-lg text-muted hidden">
                <em class="ion-close-round"></em>
              </div>
              <a class="sidebar-header-logo" href="#">
                <img src="/img/logo.png" alt="Logo">
              </a>
            </div>

            <div class="sidebar-content">

              <div class="sidebar-toolbar text-center">
                <div class="mt"><b>{{ session('user')['fullname'] }}</b><br>{{ session('user')['organization']['description'] }}</div>
              </div>

              <nav class="sidebar-nav">
                <ul>
                  <li>
                    <a class="ripple" href="/">
                      <span class="nav-icon">
                        <img class="hidden" src="" data-svg-replace="/img/icons/dashboard.svg" alt="MenuItem">
                      </span>
                      <span>Dashboard</span>
                    </a>
                  </li>
                  <li>
                    <a class="ripple" href="/lands">
                      <span class="nav-icon">
                        <img class="hidden" src="" data-svg-replace="/img/icons/truck.svg" alt="MenuItem"></span>
                      <span>Campos</span>
                    </a>
                  </li>
                  <li>
                    <a class="ripple" href="/silobags">
                      <span class="nav-icon">
                        <img class="hidden" src="" data-svg-replace="/img/icons/grain.svg" alt="MenuItem"></span>
                      <span>Silobolsas</span>
                    </a>
                  </li>
                  <li>
                    <a class="ripple" href="/spears">
                      <span class="nav-icon">
                        <img class="hidden" src="" data-svg-replace="/img/icons/radio.svg" alt="MenuItem"></span>
                      <span>Lanzas</span>
                    </a>
                  </li>
                  <li>
                    <a class="ripple" href="/alerts">
                      <span class="nav-icon">
                        <img class="hidden" src="" data-svg-replace="/img/icons/alarm.svg" alt="MenuItem">
                      </span>
                      <span>Alertas</span>
                    @if (session('alerts') > 0)
                      <span class="pull-right nav-label"><span class="badge bg-danger">{{ session('alerts') }}</span></span>
                    @else
                      <span class="pull-right nav-label"><span class="badge bg-success">0</span></span>
                    @endif
                    </a>
                  </li>
                  @if (session('user')['admin'])
                  <li>
                    <a class="ripple" href="/users">
                      <span class="nav-icon">
                        <img class="hidden" src="" data-svg-replace="/img/icons/man-user.svg" alt="MenuItem"></span>
                      <span>Usuarios</span>
                    </a>
                  </li>
                  @endif
                  <li>
                    <a class="ripple" href="/logout">
                      <span class="nav-icon">
                        <img class="hidden" src="" data-svg-replace="/img/icons/log-out.svg" alt="MenuItem"></span>
                      <span>Logout</span>
                    </a>
                  </li>
                  @if (session('superadmin') > 0)
                  <li>
                    <a class="ripple" href="#">
                      <span class="nav-icon admin">
                        <img class="hidden" src="" data-svg-replace="/img/icons/configuration.svg" alt="MenuItem"></span>
                      <span>SmartiumTech</span>
                    </a>
                    <ul class="sidebar-subnav" id="layouts">
                      <li><a class="ripple" href="/organizations"><span class="pull-right nav-label"></span><span>Clientes</span><span class="md-ripple"></span></a></li>
                      <li><a class="ripple" href="/configurations"><span class="pull-right nav-label"></span><span>Configuración</span><span class="md-ripple"></span></a></li>
                    </ul>
                  </li>
                  @endif
                </ul>
              </nav>
            </div>
          </aside>
          <div class="sidebar-layout-obfuscator"></div>