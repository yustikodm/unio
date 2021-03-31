{{-- Dashboard --}}
@can('home')
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a>
</li>
@endcan

{{-- Master --}}
@can('master')
<li class="treeview {{
    Request::is('countries*') || Request::is('states*') ||
    Request::is('districts*')|| Request::is('religions*') || 
    Request::is('questionnaires*')|| Request::is('questionnaire-answer*') ? 'active menu-open' : '' }}">
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

        {{-- Districts  --}}
        @can('districts.index')
            <li class="{{ Request::is('districts*') ? 'active' : '' }}">
                <a href="{{ route('districts.index') }}"><i class="fa fa-circle-thin"></i><span>Districts</span></a>
            </li>
        @endcan

        {{-- Religions  --}}
        @can('religions.index')
            <li class="{{ Request::is('religions*') ? 'active' : '' }}">
                <a href="{{ route('religions.index') }}"><i class="fa fa-circle-thin"></i><span>Religions</span></a>
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
@can('university')
    <li class="treeview {{
    Request::is('university*') || Request::is('universities*') ? 'active menu-open' : '' }}">
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
            {{-- University Faculties --}}
            @can('university-faculties.index')
                <li class="{{ Request::is('university-faculties*') ? 'active' : '' }}">
                    <a href="{{ route('university-faculties.index') }}"><i class="fa fa-circle-thin"></i><span>University Faculties</span></a>
                </li>
            @endcan
            {{-- University Majors --}}
            @can('university-majors.index')
                <li class="{{ Request::is('university-majors*') ? 'active' : '' }}">
                    <a href="{{ route('university-majors.index') }}"><i class="fa fa-circle-thin"></i><span>University Majors</span></a>
                </li>
            @endcan
            {{-- University Fees --}}
            @can('university-fees.index')
                <li class="{{ Request::is('university-fees*') ? 'active' : '' }}">
                    <a href="{{ route('university-fees.index') }}"><i class="fa fa-circle-thin"></i><span>University Fees</span></a>
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
        </ul>
    </li>
@endcan

{{-- vendor --}}
@can('vendor')
    <li class="treeview {{
    Request::is('vendor*') || Request::is('vendors*') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-users"></i><span>Vendor</span>
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

{{-- Module --}}
@can('module')
    <li class="treeview {{
    Request::is('module*') || Request::is('wishlists*') ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-list"></i><span>Modules</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>

        <ul class="treeview-menu">
            {{-- Wishlists --}}
            @can('wishlists.index')
                <li class="{{ Request::is('wishlists*') ? 'active' : '' }}">
                    <a href="{{ route('wishlists.index') }}"><i class="fa fa-circle-thin"></i><span>Wishlists</span></a>
                </li>
            @endcan
            {{-- Carts --}}
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

@can('place-to-live.index')
    <li class="{{ Request::is('place-to-live*') ? 'active' : '' }}">
        <a href="{{ route('place-to-live.index') }}"><i class="fa fa-home"></i><span>Place to Live</span></a>
    </li>
@endcan


{{-- Setting --}}
{{--@can('fa-circle-thin')--}}
<li class="treeview {{ Request::is('users*') || Request::is('printer*') || Request::is('roles*') || Request::is('permissions*') ? 'active menu-open' : '' }}">
    <a href="#"><i class="fa fa-gear"></i><span>Setting</span>
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

        {{--@can('printer.index')
        <li class="{{ Request::is('printer*') ? 'active' : '' }}">
            <a href="{{ route('printer.index') }}"><i class="fa fa-circle-thin"></i><span>Printer</span></a>
        </li>
        @endcan--}}
    </ul>
</li>
{{--@endcan--}}

<script>
    $(document).ready(function(){
        $(function(){
            $.get(apiUrl+'history_klaim_hadiah', function(notif){
                console.log(notif);
                var dataNotif = notif.data.filter((data)=>{
                    return data.status == 'Diajukan';
                })
                if(dataNotif.length != 0){
                    $("#badgeNotif").attr("class", "badge bg-red")
                    $("#badgeNotif").html(dataNotif.length);
                }
            });
        })
    })
</script>

{{-- <!-- <li class="{{ Request::is('detailPurchaseOder*') ? 'active' : '' }}">
    <a href="{{ route('detailPurchaseOder.index') }}"><i class="fa fa-circle-thin"></i><span>Detail Purchase Oder</span></a>
</li>
 --> --}}
@can('families.index')
<li class="{{ Request::is('families*') ? 'active' : '' }}">
    <a href="{{ route('families.index') }}"><i class="fa fa-edit"></i><span>Families</span></a>
</li>
@endcan
@can('biodatas.index')
<li class="{{ Request::is('biodatas*') ? 'active' : '' }}">
    <a href="{{ route('biodatas.index') }}"><i class="fa fa-edit"></i><span>Biodatas</span></a>
</li>
@endcan
@can('pricingPoints.index')
<li class="{{ Request::is('pricingPoints*') ? 'active' : '' }}">
    <a href="{{ route('pricingPoints.index') }}"><i class="fa fa-edit"></i><span>Pricing Points</span></a>
</li>
@endcan
@can('pointTransactions.index')
<li class="{{ Request::is('pointTransactions*') ? 'active' : '' }}">
    <a href="{{ route('pointTransactions.index') }}"><i class="fa fa-edit"></i><span>Point Transactions</span></a>
</li>
@endcan
@can('pointTopups.index')
<li class="{{ Request::is('pointTopups*') ? 'active' : '' }}">
    <a href="{{ route('pointTopups.index') }}"><i class="fa fa-edit"></i><span>Point Topups</span></a>
</li>
@endcan
@can('pointLogs.index')
<li class="{{ Request::is('pointLogs*') ? 'active' : '' }}">
    <a href="{{ route('pointLogs.index') }}"><i class="fa fa-edit"></i><span>Point Logs</span></a>
</li>
@endcan
@can('placeToLives.index')
<li class="{{ Request::is('placeToLives*') ? 'active' : '' }}">
    <a href="{{ route('placeToLives.index') }}"><i class="fa fa-edit"></i><span>Place To Lives</span></a>
</li>
@endcan
