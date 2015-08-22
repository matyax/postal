<form name="resourceForm" novalidate ng-submit="save()" ng-controller="{{ isset($id) ? 'EditController' : 'CreateController' }}">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <header class="section-header">
                    <h1>Trabajos</h1>
                    <div class="section-action">
                        <a ui-sref="{{ $resource }}_list" class="btn btn-default">Cancelar</a>
                        <button type="submit" class="btn btn-success" ng-disabled="resourceForm.$invalid" >Guardar</button>
                    </div>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="container-fluid">
                            <fieldset>
                                <legend>Información</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Título</label>
                                            <input type="text" class="form-control" ng-required="true" ng-model="{{ $resource }}.title" placeholder="Ingrese el título">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Categoría</label>
                                            <select class="form-control" ng-required="true" ng-model="{{ $resource }}.work_category_id">
                                                @foreach (\CMS\Database\Query::find('WorkCategory', [ ], 'name ASC') as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <input type="checkbox" id="display-home" ng-model="{{ $resource }}.display_home">
                                            <label for="display-home">
                                                Caso destacado en la home
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea data-component="editor" ck-editor id="{{ $resource }}-content" ng-model="{{ $resource }}.description"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label title="Seleccioná hasta 3 imágenes para home, caso y caso mobile">Imágenes</label>

                                        <input type="file" name="images" ngf-select="onFileSelect($files)" ngf-multiple="true" ngf-pattern="'image/*" accept="image/*" />

                                        <div>[[ progress ]]</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered">
                                            <tr ng-repeat="image in images">
                                                <td>
                                                    <img data-id="[[ image.id ]]" width="100" ng-src="[[ image.thumbnail ]]"  />
                                                </td>
                                                <td>
                                                    <select class="form-control" ng-model="image.type">
                                                        <option value="image">Imagen de caso</option>
                                                        <option value="mobile">Imagen de caso (mobile)</option>
                                                        <option value="home">Banner home</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger" ng-click="deleteImage(image)">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <input type="hidden" name="id" ng-model="{{ $resource }}.id" ng-if="{{ $resource}}.id">
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>