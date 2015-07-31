@extends('admin.layout')

@section('content')
<div class="wrapper vcenter" ng-controller="LoginController">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Iniciar Sesión</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/login">
                            <div class="form-group">
                                [[ message ]]
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email address</label>
                                <input type="email" class="form-control" ng-model="login.email" placeholder="Email o nombre de usuario">
                            </div>
                            <div class="form-group">
                                <label for="pass" class="sr-only">Password</label>
                                <input type="password" class="form-control" ng-model="login.password" placeholder="Contraseña">
                            </div>

                            <button type="button" class="btn btn-primary btn-block" ng-click="doLogin()">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop