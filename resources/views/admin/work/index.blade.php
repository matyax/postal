
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <header class="section-header">
                <h1>Trabajos</h1>
                <div class="section-action">
                    <a ui-sref="{{ $resource }}_add" ui-sref-opts="{reload:true}" class="btn btn-primary">Agregar Trabajo</a>
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
                      <th>Categoría</th>
                      <th>Título</th>
                      <th class="small-td text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="model in models">
                        <td>
                            [[ model.position ]]
                        </td>
                        <td>
                            [[ model.category ]]
                        </td>
                        <td>
                            [[ model.title ]]
                        </td>
                        <td class="small-td text-center">
                            <a ui-sref="{{ $resource }}_edit({ id: [[ model.id ]] })" title="Editar" class="btn btn-default">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <button title="Eliminar" class="btn btn-danger" ng-click="delete(model)" data-id="[[ model.id ]]" >
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