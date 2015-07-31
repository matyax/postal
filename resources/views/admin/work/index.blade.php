
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <header class="section-header">
                <h1>Vehículos</h1>
                <div class="section-action">
                    <a ui-sref="service_vehicle" ui-sref-opts="{reload:true}" class="btn btn-default">
                        <span class="glyphicon glyphicon-wrench"></span>
                        Configurar services
                    </a>

                    <a ui-sref="{{ $resource }}_add" ui-sref-opts="{reload:true}" class="btn btn-primary">Agregar Vehículo</a>
                </div>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered" ng-controller="ListController">
                <thead>
                    <tr>
                      <!--<th>#</th>-->
                      <th>Nombre</th>
                      <th class="checkbox-td text-center">Disponible venta</th>
                      <th class="checkbox-td text-center">Disponible service</th>
                        @foreach (\App\Engine::brandEngines() as $engine)
                            <th class="checkbox-td text-center">{{ $engine->name }}</th>
                        @endforeach
                        @foreach (\App\Transmission::brandTransmissions() as $transmission)
                            <th class="checkbox-td text-center">{{ $transmission->name }}</th>
                        @endforeach
                      <th class="small-td text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="vehicle in models">
                        <!--<th scope="row">[[ vehicle.id ]]</th>-->
                        <td> <a ui-sref="vehicle_edit({ id: [[ vehicle.id ]] })" title="Editar"> [[ vehicle.name ]] </a></td>
                        <td class="checkbox-td text-center">
                            <span class="glyphicon glyphicon-ok" ng-if="vehicle.sale_available"></span>
                        </td>
                        <td class="checkbox-td text-center">
                            <span class="glyphicon glyphicon-ok" ng-if="vehicle.service_available"></span>
                        </td>
                        @foreach (\App\Engine::brandEngines() as $engine)
                            <td class="checkbox-td text-center">
                                <span class="glyphicon glyphicon-ok" ng-if="vehicle.engines[{{ $engine->id }}]" ></span>
                            </td>
                        @endforeach
                        @foreach (\App\Transmission::brandTransmissions() as $transmission)
                            <td class="checkbox-td text-center">
                                <span class="glyphicon glyphicon-ok" ng-if="vehicle.transmissions[{{ $transmission->id }}]" ></span>
                            </td>
                        @endforeach
                        <td class="small-td text-center">
                            <a ui-sref="vehicle_edit({ id: [[ vehicle.id ]] })" title="Editar" class="btn btn-default">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <button title="Eliminar" class="btn btn-danger" ng-click="delete(vehicle)" data-id="[[ vehicle.id ]]" >
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                </tbody>
            </table>
        </div>
    </div>
</div>