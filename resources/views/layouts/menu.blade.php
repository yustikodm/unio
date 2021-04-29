f{{-- Dashboard --}}
@can('dashboard.index')
    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a>
    </li>
@endcan

{{-- Master --}}
@can(['countries.index', 'states.index', 'districts.index', 'questionnaires.index', 'questionnaire-answers.index'])
    <li class="treeview {{ Request::is('countries*') || Request::is('states*') || Request::is('districts*') || Request::is('questionnaires*') || Request::is('questionnaire-answers*') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-database"></i><span>Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            {{-- Countries --}}
            @can('countries.index')
                <li class="{{ Request::is('countries*') ? 'active' : '' }}">
                    <a href="{{ route('countries.index') }}"><i class="fa fa-circle-thin"></i><span>Countries</span></a>
                </li>
            @endcan

            {{-- States --}}
            @can('states.index')
                <li class="{{ Request::is('states*') ? 'active' : '' }}">
                    <a href="{{ route('states.index') }}"><i class="fa fa-circle-thin"></i><span>States</span></a>
                </li>
            @endcan

            {{-- Districts --}}
            @can('districts.index')
                <li class="{{ Request::is('districts*') ? 'active' : '' }}">
                    <a href="{{ route('districts.index') }}"><i class="fa fa-circle-thin"></i><span>Districts</span></a>
                </li>
            @endcan

            {{-- Questionnaires --}}
            @can('questionnaires.index')
                <li class="{{ Request::is('questionnaires*') ? 'active' : '' }}">
                    <a href="{{ route('questionnaires.index') }}"><i class="fa fa-circle-thin"></i><span>Questionnaires</span></a>
                </li>
            @endcan

            {{-- Questionnaire Answer --}}
            @can('questionnaire-answers.index')
                <li class="{{ Request::is('questionnaire-answers*') ? 'active' : '' }}">
                    <a href="{{ route('questionnaire-answers.index') }}"><i class="fa fa-circle-thin"></i><span>Questionnaire Answers</span></a>
                </li>
            @endcan
        </ul>
    </li>
@endcan

{{-- University --}}
@can(['universities.index', 'university-faculties.index', 'university-majors.index', 'university-fees.index', 'university-requirements.index', 'university-scholarships.index', 'master-majors.index'])
    <li class="treeview {{ Request::is('university*') || Request::is('universities*') || Request::is('master-majors*') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-university"></i><span>University</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            {{-- Universities --}}
            @can('universities.index')
                <li class="{{ Request::is('universities*') ? 'active' : '' }}">
                    <a href="{{ route('universities.index') }}"><i class="fa fa-circle-thin"></i><span>Universities</span></a>
                </li>
            @endcan
            {{-- University Facility --}}
            @can('university-facilities.index')
                <li class="{{ Request::is('university-facilities*') ? 'active' : '' }}">
                    <a href="{{ route('university-facilities.index') }}"><i class="fa fa-circle-thin"></i><span>University Facilities</span></a>
                </li>
            @endcan
            {{-- University Faculties --}}
            @can('university-faculties.index')
                <li class="{{ Request::is('university-faculties*') ? 'active' : '' }}">
                    <a href="{{ route('university-faculties.index') }}"><i class="fa fa-circle-thin"></i><span>University Faculties</span></a>
                </li>
            @endcan
            {{-- University Fees --}}
            @can('university-fees.index')
                <li class="{{ Request::is('university-fees*') ? 'active' : '' }}">
                    <a href="{{ route('university-fees.index') }}"><i class="fa fa-circle-thin"></i><span>University Fees</span></a>
                </li>
            @endcan
            {{-- University Majors --}}
            @can('university-majors.index')
                <li class="{{ Request::is('university-majors*') ? 'active' : '' }}">
                    <a href="{{ route('university-majors.index') }}"><i class="fa fa-circle-thin"></i><span>University Majors</span></a>
                </li>
            @endcan
            {{-- University Requirements --}}
            @can('university-requirements.index')
                <li class="{{ Request::is('university-requirements*') ? 'active' : '' }}">
                    <a href="{{ route('university-requirements.index') }}"><i class="fa fa-circle-thin"></i><span>University Requirements</span></a>
                </li>
            @endcan
            {{-- University Scholarships --}}
            @can('university-scholarships.index')
                <li class="{{ Request::is('university-scholarships*') ? 'active' : '' }}">
                    <a href="{{ route('university-scholarships.index') }}"><i class="fa fa-circle-thin"></i><span>University Scholarships</span></a>
                </li>
            @endcan

            @can('master-majors.index')
            <li class="{{ Request::is('master-majors*') ? 'active' : '' }}">
                <a href="{{ route('master-majors.index') }}"><i class="fa fa-circle-thin"></i><span>Master Majors</span></a>
            </li>
            @endcan
        </ul>
    </li>
@endcan

{{-- vendor --}}
@can(['vendors.index', 'vendor-services.index', 'vendor-employees.index', 'vendor-categories.index'])
    <li class="treeview {{ Request::is('vendor*') || Request::is('vendors*') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-list"></i><span>Vendor</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            {{-- Vendor --}}
            @can('vendors.index')
                <li class="{{ Request::is('vendors*') ? 'active' : '' }}">
                    <a href="{{ route('vendors.index') }}"><i class="fa fa-circle-thin"></i><span>Vendors</span></a>
                </li>
            @endcan
            {{-- Vendor Service --}}
            @can('vendor-services.index')
                <li class="{{ Request::is('vendor-services*') ? 'active' : '' }}">
                    <a href="{{ route('vendor-services.index') }}"><i class="fa fa-circle-thin"></i><span>Vendor Services</span></a>
                </li>
            @endcan
            {{-- Vendor Employee --}}
            @can('vendor-employees.index')
                <li class="{{ Request::is('vendor-employees*') ? 'active' : '' }}">
                    <a href="{{ route('vendor-employees.index') }}"><i class="fa fa-circle-thin"></i><span>Vendor Employees</span></a>
                </li>
            @endcan
            {{-- Vendor Category --}}
            @can('vendor-categories.index')
                <li class="{{ Request::is('vendor-categories*') ? 'active' : '' }}">
                    <a href="{{ route('vendor-categories.index') }}"><i class="fa fa-circle-thin"></i><span>Vendor Categories</span></a>
                </li>
            @endcan
        </ul>
    </li>
@endcan

@can(['users.profile', 'wishlists.index', 'carts.index'])
  <li class="treeview {{ Request::is('users/profile') || Request::is('wishlists*') ? 'active menu-open' : '' }}">
    <a href="#">
        <i class="fa fa-user"></i><span>User Profile</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      {{-- User Profile --}}
      @can('users.profile')
          <li class="{{ Request::is('users/profile') ? 'active' : '' }}">
              <a href="{{ route('users.profile') }}"><i class="fa fa-circle-thin"></i><span>Profile</span></a>
          </li>
      @endcan

      {{-- Wish List User --}}
      @can('wishlists.index')
          <li class="{{ Request::is('wishlists*') ? 'active' : '' }}">
              <a href="{{ route('wishlists.index') }}"><i class="fa fa-circle-thin"></i><span>Wishlists</span></a>
          </li>
      @endcan

      {{-- Carts User --}}
      @can('carts.index')
          <li class="{{ Request::is('carts*') ? 'active' : '' }}">
              <a href="{{ route('carts.index') }}"><i class="fa fa-circle-thin"></i><span>Carts</span></a>
          </li>
      @endcan
    </ul>
  </li>
@endcan

{{-- Article --}}
@can('articles.index')
    <li class="{{ Request::is('articles*') ? 'active' : '' }}">
        <a href="{{ route('articles.index') }}"><i class="fa fa-newspaper-o"></i><span>Articles</span></a>
    </li>
@endcan

{{-- Place to Live --}}
@can('place-to-live.index')
    <li class="{{ Request::is('place-to-live*') ? 'active' : '' }}">
        <a href="{{ route('place-to-live.index') }}"><i class="fa fa-home"></i><span>Place to Live</span></a>
    </li>
@endcan

{{-- Points --}}
@can(['point-pricings.index', 'point-logs.index'])
    <li class="treeview {{ Request::is('point*') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-money"></i><span>Points</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
        {{-- Point Pricings --}}
        @can('point-pricings.index')
        <li class="{{ Request::is('point-pricings*') ? 'active' : '' }}">
            <a href="{{ route('point-pricings.index') }}"><i class="fa fa-circle-thin"></i><span>Point Pricings</span></a>
        </li>
        @endcan
        {{-- Point Logs --}}
        @can('point-logs.index')
            <li class="{{ Request::is('point-logs*') ? 'active' : '' }}">
                <a href="{{ route('point-logs.index') }}"><i class="fa fa-circle-thin"></i><span>Point Logs</span></a>
            </li>
        @endcan
        </ul>
    </li>
@endcan

@can('transactions.index')
<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="{{ route('transactions.index') }}"><i class="fa fa-exchange"></i><span>Transactions</span></a>
</li>
@endcan

@can('topup-history.index')
<li class="{{ Request::is('topup-history*') ? 'active' : '' }}">
    <a href="{{ route('topup-history.index') }}"><i class="fa fa-upload"></i><span>Topup History</span></a>
</li>
@endcan

{{-- Users --}}
@can(['users.index', 'families.index', 'biodata.index'])
    <li class="treeview {{ Request::is('users*') || Request::is('families*') || Request::is('biodata*') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-users"></i><span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
          {{-- Users --}}
          @can('users.index')
              <li class="{{ Request::is('users*') ? 'active' : '' }}">
                  <a href="{{ route('users.index') }}"><i class="fa fa-circle-thin"></i><span>Users</span></a>
              </li>
          @endcan

          {{-- Families --}}
          @can('families.index')
              <li class="{{ Request::is('families*') ? 'active' : '' }}">
                  <a href="{{ route('families.index') }}"><i class="fa fa-circle-thin"></i><span>Families</span></a>
              </li>
          @endcan

          {{-- Biodata --}}
          @can('biodata.index')
              <li class="{{ Request::is('biodata*') ? 'active' : '' }}">
                  <a href="{{ route('biodata.index') }}"><i class="fa fa-circle-thin"></i><span>Biodata</span></a>
              </li>
          @endcan
        </ul>
    </li>
@endcan

{{-- Setting --}}
<li class="treeview {{ Request::is('roles*') || Request::is('permissions*') ? 'active menu-open' : '' }}">
    <a href="#"><i class="fa fa-cogs"></i><span>Role &amp; Permissions</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>

    <ul class="treeview-menu">
        {{-- Roles --}}
        @can('roles.index')
            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}"><i class="fa fa-circle-thin"></i><span>Roles</span></a>
            </li>
        @endcan

        {{-- Permissions --}}
        @can('permissions.index')
            <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
                <a href="{{ route('permissions.index') }}"><i class="fa fa-circle-thin"></i><span>Permissions</span></a>
            </li>
        @endcan
    </ul>
</li>
@can('topupPackages.index')
<li class="{{ Request::is('topupPackages*') ? 'active' : '' }}">
    <a href="{{ route('topupPackages.index') }}"><i class="fa fa-edit"></i><span>Topup Packages</span></a>
</li>
@endcan
