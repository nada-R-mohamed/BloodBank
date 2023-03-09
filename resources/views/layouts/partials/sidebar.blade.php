@inject('setting','App\Models\Setting')
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset("assets/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            @can('governorate view')
            <li class="nav-item">
                <a href="{{ route('governorates.index') }}" class="nav-link">
                    <p>
                       Governorates
                    </p>
                </a>
            </li>
            @endcan
            @can('cities view')
            <li class="nav-item">
                <a href="{{ route('cities.index') }}" class="nav-link">
                    <p>
                        Cities
                    </p>
                </a>
            </li>
            @endcan
            @can('categories view')
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <p>
                        Categories
                    </p>
                </a>
            </li>
            @endcan
            @can('posts view')
            <li class="nav-item">

                <a href="{{ route('posts.index') }}" class="nav-link">
                    <p>
                        Posts
                    </p>
                </a>
            </li>
            @endcan
            @can('clients view')
            <li class="nav-item">

                <a href="{{ route('clients.index') }}" class="nav-link">
                    <p>
                        Clients
                    </p>
                </a>
            </li>
            @endcan
            @can('contacts view')
            <li class="nav-item">
                <a href="{{ route('contacts.index') }}" class="nav-link">
                    <p>
                        Contacts
                    </p>
                </a>
            </li>
            @endcan
            @can('donationRequests view')
            <li class="nav-item">
                <a href="{{ route('donation-requests.index') }}" class="nav-link">
                    <p>
                        Donation Requests
                    </p>
                </a>
            </li>
            @endcan
            @can('users view')
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <p>
                        Users
                    </p>
                </a>
            </li>
            @endcan
            @can('roles view')
            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <p>
                        Roles
                    </p>
                </a>
            </li>
            @endcan
            @can('settings view')
            <li class="nav-item">
                <a href="{{ route('settings.index') }}" class="nav-link">
                    <p>
                        Settings
                    </p>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('change-password') }}" class="nav-link">
                    <p>
                        Change Password
                    </p>
                </a>
            </li>
          <form action="{{ route('logout') }}" method="post">
              @csrf
              <li class="nav-item">
                  <button class="nav-link">Log Out</button>
              </li>
          </form>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
