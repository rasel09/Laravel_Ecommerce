<div class="sl-header">
    <div class="sl-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name"><span class="hidden-md-down">{{Auth::User()->name}} </span></span>
            <img src="{{asset('backend/')}}/img/img3.jpg" class="wd-32 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
              <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
              <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
             
              <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                              Logout  
                  </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
            </ul>
          </div>
        </div>
      </nav>
      
    </div>
  </div>
