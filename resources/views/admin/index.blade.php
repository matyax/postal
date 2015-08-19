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

        @if ($userPermissions['workCategory']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Categorías de trabajo">
                <a ui-sref="workCategory_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-flag" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Categorías de trabajo
                    </div>
                </a>
            </li>
        @endif

        @if ($userPermissions['work']['index'])
            <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Categorías de trabajo">
                <a ui-sref="work_list" ui-sref-opts="{reload:true}" >
                    <div class="icon">
                        <span class="fa fa-cloud" aria-hidden="true"></span>
                    </div>
                    <div class="text">
                        Trabajos
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
        </div>
    </nav>
    <section class="section-content">
        <div ui-view></div>
    </section>
</div>

@stop