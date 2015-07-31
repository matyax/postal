<div class="container" ng-controller="{{ isset($id) ? 'EditController' : 'CreateController' }}">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <header class="section-header">
                <h1>Vehículo</h1>
                <div class="section-action">
                    <a ui-sref="{{ $resource }}_list" class="btn btn-default">Cancelar</a>
                    <a ng-click="save()" class="btn btn-success">Guardar</a>
                </div>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="container-fluid">
                        <form >
                            <fieldset>
                                <legend>Información personal</legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" name="name" ng-required="true" ng-model="{{ $resource }}.name" placeholder="Ingrese el nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Motores</label>
                                            @foreach (\CMS\Database\Query::find('\App\Engine', ['brand_id' => Session::get('brand_id')]) as $engine)
                                                <div class="checkbox">
                                                    <input type="checkbox" id="w-{{ $engine->id }}" ng-model="{{ $resource }}.engines[{{ $engine->id }}]">
                                                    <label for="w-{{ $engine->id }}">
                                                        {{ $engine->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Transmisiones</label>
                                            @foreach (\CMS\Database\Query::find('\App\Transmission', ['brand_id' => Session::get('brand_id')]) as $transmission)
                                                <div class="checkbox">
                                                    <input type="checkbox" id="t-{{ $transmission->id }}" ng-model="{{ $resource }}.transmissions[{{ $transmission->id }}]">
                                                    <label for="t-{{ $transmission->id }}">
                                                        {{ $transmission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <input type="checkbox" ng-model="{{ $resource }}.sale_available" value="1" id="saa" >
                                            <label for="sa">Habilitado para venta 0km</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <input type="checkbox" ng-model="{{ $resource }}.service_available" value="1" id="sea" >
                                            <label for="sea">Habilitado para service</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Imagen</label>
                                        <input type="file" name="images" ng-file-select="onFileSelect($files)" accept="image/*" />

                                        <div>[[ progress ]]</div>
                                    </div>

                                    <div class="col-md-6">
                                        <img ng-repeat="image in images" data-id="[[ image.id ]]" width="100" ng-src="[[ image.thumbnail ]]" ng-click="deleteImage(image)" />
                                    </div>
                                </div>

                                <input type="hidden" name="brand_id" ng-model="{{ $resource }}.brand_id">

                                <input type="hidden" name="id" ng-model="{{ $resource }}.id" ng-if="{{ $resource}}.id">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>