
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <header class="section-header">
                <h1>Categorías de trabajo</h1>
                <div class="section-action">
                    <a ui-sref="{{ $resource }}_add" class="btn btn-primary">Agregar Categoría</a>
                </div>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered" ng-controller="ListController">
                <thead>
                    <tr>
                      <th width="100">Posición</th>
                      <th>Nombre</th>
                      <th class="small-td text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="{{ $resource }} in models">
                        <td>
                            [[ {{ $resource }}.position ]]
                        </td>
                        <td>
                            <a ui-sref="{{ $resource }}_edit({ id: [[ {{ $resource }}.id ]] })" title="Editar" >
                                [[ {{ $resource }}.name ]]
                            </a>
                        </td>
                        <td class="small-td text-center">
                            <a ui-sref="{{ $resource }}_edit({ id: [[ {{ $resource }}.id ]] })" title="Editar" class="btn btn-default">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <button title="Eliminar" class="btn btn-danger" ng-click="delete({{ $resource }})" data-id="[[ {{ $resource }}.id ]]" >
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