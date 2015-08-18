<div class="container" ng-controller="{{ isset($id) ? 'EditController' : 'CreateController' }}">
    <form novalidate ng-submit="save()" name="editForm" >
        <div class="row">
            <div class="col-md-12">
                <header class="section-header">
                    <h1>Categorías de trabajo</h1>
                    <div class="section-action">
                        <a ui-sref="{{ $resource }}_list" class="btn btn-default">Cancelar</a>
                        <button type="submit" ng-disabled="editForm.$invalid" class="btn btn-success">Guardar</a>
                    </div>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="container-fluid">

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
                                                <label>Posición</label>
                                                <input type="text" class="form-control" name="name" ng-model="{{ $resource }}.position" placeholder="Automático">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <input type="hidden" name="id" ng-model="{{ $resource }}.id" ng-if="{{ $resource}}.id">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>