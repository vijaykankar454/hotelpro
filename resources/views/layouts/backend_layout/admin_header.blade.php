  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
       
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="https://demosly.com/xicia/travelfresh/public/uploads/user-.jpg" width =34 height =34 class="user-image" alt="user photo">

        <span class="hidden-xs"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{ __('Edit Profile') }}
         
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.logout') }}" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> {{ __('Logout') }}
          
          </a>
        </div>
      </li>
     
    </ul>