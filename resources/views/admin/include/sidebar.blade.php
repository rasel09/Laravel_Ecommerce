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
        <a href="{{url('/')}}" class="sl-menu-link" target="blank">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Visit Website</span>
          </div>
        </a>

        {{-- Brand --}}
     {{-- dropdown --}}

     <a href="#" class="sl-menu-link @yield('brand')">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Brand</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
      </a>
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{route('brand.create')}}"  class="nav-link @yield('addBrand')">Add Brand</a></li>
        <li class="nav-item"><a href="{{route('brand.index')}}" class="nav-link @yield('manageBrand')">Manage Brand</a></li>
      </ul>
       {{-- dropdown --}}
       
      </div>
    </div>
