<div class="container" ng-controller="{{ isset($id) ? 'EditController' : 'CreateController' }}">
    <div class="row">
        <div class="col-md-12">
            <header class="section-header">
                <h1>Especialización</h1>
                <div class="section-action">
                    <a ui-sref="{{ $resource }}_list" class="btn btn-default">Cancelar</a>
                    <a ng-click="save()" class="btn btn-success">Guardar</a>
                </div>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="container-fluid">
                        <form >
                            <fieldset>
                                <legend>Datos personales</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" name="name" ng-required="true" ng-model="{{ $resource }}.name" placeholder="Ingrese el nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input type="text" class="form-control" name="name" ng-required="true" ng-model="{{ $resource }}.lastname" placeholder="Ingrese el apellido">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" name="name" ng-required="true" ng-model="{{ $resource }}.email" placeholder="Ingrese el e-mail">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            @if (isset($id))
                                                <input type="text" class="form-control" name="name" ng-required="true" ng-model="{{ $resource }}.password" placeholder="Nueva contraseña para el usuario">
                                            @else
                                                <input type="text" class="form-control" name="name" ng-required="true" ng-model="{{ $resource }}.password" placeholder="Ingrese la contraseña">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Permisos</legend>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Recurso</label>
                                    </div>

                                    @foreach (\App\Permission::$actions as $action => $actionName)
                                    <div class="col-md-2">
                                        <label>{{ $actionName }}</label>
                                    </div>
                                    @endforeach
                                </div>

                                @foreach (\App\Permission::$resources as $resource => $resourceName)
                                <div class="row">
                                    <div class="col-md-2">
                                        {{ $resourceName }}
                                    </div>

                                    @foreach (\App\Permission::$actions as $action => $actionName)
                                    <div class="col-md-2">
                                        <td class="checkbox-td">
                                        <div class="checkbox">
                                            <input type="checkbox" ng-model="user.permissions.{{ $resource }}.{{ $action }}">
                                            <label></label>
                                        </div>
                                    </td>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach

                                <input type="hidden" name="id" ng-model="{{ $resource }}.id" ng-if="{{ $resource}}.id">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>