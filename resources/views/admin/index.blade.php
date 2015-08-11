@extends('admin.layout')

@section('content')

<nav id="main-nav" ng-controller="NavigationController">
    <button type="button" id="nav-toogle-btn" class="btn btn-default navbar-btn" >
        <span class="sr-only">Abrir Navegación</span>
        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
    </button>

    <header>
        <div class="brand">
            <a ui-sref="dashboard">
                <div class="icon">
                    <span aria-hidden="true" class="y-brand-image" id="dashboardIcon" >
                        <img src="/img/y.png" alt="">
                    </span>
                    <span class="fa fa-cog fa-spin fa-2x fa-fw" style="display: none" id="loadingDisplay"></span>
                </div>
                <div class="text">
                    Postal Urbana
                </div>
            </a>
        </div>
    </header>
    <ul>
        @if ($userPermissions['workshop']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Talleres">
                <a ui-sref="workshop_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Talleres
                    </div>
                </a>
            </li>
        @endif


        @if ($userPermissions['worker']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Operarios">
                <a ui-sref="worker_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Operarios
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['advisor']['index'])
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Asesores">
                <a ui-sref="advisor_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Asesores
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['specialization']['index'])
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Especializaciones">
                <a ui-sref="specialization_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Especializaciones
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['serviceCategory']['index'])
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categorías de servicio">
                <a ui-sref="serviceCategory_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Categorías de servicio
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['service']['index'])
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Servicios">
                <a ui-sref="service_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Servicios
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['shiftFlag']['index'])
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Motivos de atención" >
                <a ui-sref="shiftFlag_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-exclamation" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Motivos de atención
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['engine']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Motores">
                <a ui-sref="engine_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-steam" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Motores
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['transmission']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Cajas de cambio">
                <a ui-sref="transmission_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-cogs" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Cajas de cambio
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['vehicle']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Vehículos">
                <a ui-sref="vehicle_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-car" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Vehículos
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['shift']['index'])
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Turnos" >
                <a ui-sref="shift_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Turnos
                    </div>
                    <span class="label label-danger" ng-show="pendingShifts" >[[ pendingShifts ]]</span>
                </a>
            </li>
        @endif

        @if ($userPermissions['usedRequest']['index'])
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pedidos de usados" >
                <a ui-sref="usedRequest_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-truck" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Pedidos de usados
                    </div>
                    <span class="label label-danger" ng-show="usedRequests">[[ usedRequests ]]</span>
                </a>
            </li>
        @endif

        @if ($userPermissions['jobRequest']['index'])
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Currículums" >
                <a ui-sref="jobRequest_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-user-plus" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Currículums
                    </div>
                    <span class="label label-danger" ng-show="usedRequests">[[ jobRequests ]]</span>
                </a>
            </li>
        @endif

        @if ($userPermissions['user']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Usuarios">
                <a ui-sref="user_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-users" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Usuarios
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['parameter']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Parámetros">
                <a ui-sref="parameter_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-tasks" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Parámetros
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['advertising']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Publicidades">
                <a ui-sref="advertising_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-tags" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Publicidades
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['news']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Noticias">
                <a ui-sref="news_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-newspaper-o" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Noticias
                    </div>
                </a>
            </li>
        @endif

    </ul>
    <ul class="sidebar-bottom">
        <li class="nav-item"  data-toggle="tooltip" data-placement="right" title="Perfil de usuario" style="display:none;" >
            <a href="#">
                <div class="icon">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </div>
                <div class="text">
                    Usuario
                </div>
            </a>
        </li>
        <li class="nav-item"  data-toggle="tooltip" data-placement="right" title="Salir" >
            <a href="{{ route('admin_logout') }}">
                <div class="icon">
                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                </div>
                <div class="text">
                    Salir
                </div>
            </a>
        </li>
    </ul>


</nav>
<div id="main-content">
asd
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <form class="navbar-form navbar-right" role="search" style="display:none;">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar en">
                </div>
                <div class="form-group">
                    <select class="form-control">
                        <option value="todos">Todos</option>
                        <option value="operarios">Operarios</option>
                        <option value="asesores">Asesores</option>
                        <option value="especializaciones">especializaciones</option>
                        <option value="servicios">servicios</option>
                        <option value="usuarios">usuarios</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><span class="sr-only">Buscar</span> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </form>

            <form class="navbar-form navbar-right" role="search" ng-controller="BrandNavigationController">
                <div class="form-group">
                    Trabajando con
                </div>
                <div class="form-group">
                    <select name="brand_id_switch" class="form-control" ng-model="brand_id">
                        @foreach (\Auth::user()->brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </nav>
    <section class="section-content">
        <div ui-view></div>
    </section>
</div>

@stop