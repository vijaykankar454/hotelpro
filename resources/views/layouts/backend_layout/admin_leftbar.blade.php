<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Dashboard') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{ __('Settings') }}
            
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.page.pagelist') }}" class="nav-link {{ Request::is('admin/pages*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               
               {{ __('Static pages') }}  
              </p>
            </a>
         
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.traveller.travellerlist') }}" class="nav-link {{ Request::is('admin/traveller*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-plane"></i>
              <p>
               
               {{ __('Traveller') }}  
              </p>
            </a>
         
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.destination.destinationlist') }}" class="nav-link {{ Request::is('admin/destination*') ? 'active' : '' }}">
              <i class="nav-icon fas fa fa-map-signs"></i>
              <p>
                 {{ __('Destination') }}  
               
              </p>
            </a>
       
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.package.packagelist') }}" class="nav-link {{ Request::is('admin/package*') ? 'active' : '' }}">
              <i class="nav-icon fas fa fa-random"></i>
              <p>
                 {{ __('Package') }}  
               
              </p>
            </a>
       
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }} {{ Request::is('admin/news*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                {{ __('News') }}  
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.categorylist') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Category') }} </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.news.newslist') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('News') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.news.addcomment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Comment') }}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-comment"></i>
              <p>
                {{ __('Subscriber') }}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Subscriber') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Email to Subscriber') }}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.team.teamlist') }}" class="nav-link {{ Request::is('admin/teams*') ? 'active' : '' }}" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                {{ __('Team Member') }}
              </p>
            </a>
        
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.slider.sliderlist') }}" class="nav-link {{ Request::is('admin/slider*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-picture-o"></i>
              <p>
                {{ __('Slider') }}
              </p>
            </a>
        
          </li>
          
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.testimonial.testimoniallist') }}" class="nav-link {{ Request::is('admin/testimonial*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                {{ __('Testimonial') }}
              </p>
            </a>
        
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('admin.client.clientlist') }}" class="nav-link {{ Request::is('admin/client*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clone"></i>
              <p>
                 {{ __('Client') }}
              </p>
            </a>
        
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.service.servicelist') }}" class="nav-link {{ Request::is('admin/service*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                {{ __('Service') }}
              </p>
            </a>
        
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.payment.paymentlist') }}" class="nav-link {{ Request::is('admin/payment*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-usd"></i>
              <p>
                {{ __('Payment') }}
              </p>
            </a>
        
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.faq.faqlist') }}" class="nav-link {{ Request::is('admin/faq*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bolt"></i>
              <p>
                 {{ __('FAQ') }}
              </p>
            </a>
        
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.social.addsocialsubmit') }}" class="nav-link {{ Request::is('admin/social*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
               {{ __('Social Media') }}
              </p>
            </a>
        
          </li>
         
    
        </ul>