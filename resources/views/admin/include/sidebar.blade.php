<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Admin</a></div>
    <div class="sl-sideleft">
      <div class="sl-sideleft-menu">

          {{-- dashbord --}}
        <a href="{{route('admin.index')}}" class="sl-menu-link @yield('dashbord')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a>

        {{-- visit website --}}
        <a href="widgets.html" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Visit Website</span>
          </div>
        </a>

        {{-- Brand --}}
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Brand</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="chart-morris.html" class="nav-link">Add Brand</a></li>
          <li class="nav-item"><a href="chart-flot.html" class="nav-link">Manage Brand</a></li>
        </ul>
     
      
      </div>
    </div>
