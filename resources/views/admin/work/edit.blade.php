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
                                        <textarea data-component="editor" ck-editor id="{{ $resource }}-content" ng-model="{{ $resource }}.description"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Imagen</label>
                                        <input type="file" name="images" ngf-select="onFileSelect($files)" ngf-multiple="true" ngf-pattern="'image/*" accept="image/*" />

                                        <div>[[ progress ]]</div>
                                    </div>

                                    <div class="col-md-6">
                                        <em>Click en la imagen para borrar</em><br>
                                        <img ng-repeat="image in images" data-id="[[ image.id ]]" width="100" ng-src="[[ image.thumbnail ]]" ng-click="deleteImage(image)" />
                                    </div>
                                </div>

                                <input type="hidden" name="brand_id" ng-model="{{ $resource }}.brand_id">

                                <input type="hidden" name="id" ng-model="{{ $resource }}.id" ng-if="{{ $resource}}.id">
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>