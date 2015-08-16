<?php namespace App;

use CMS\Model\Base as BaseModel;
use App\Brand;

class Permission extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'resource', 'create', 'edit', 'index', 'destroy', 'show'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'create'    => 'boolean',
        'edit'      => 'boolean',
        'index'     => 'boolean',
        'destroy'   => 'boolean',
        'show'      => 'boolean'
    ];

    public static $resources = [
        'user' => 'Usuarios',
        'work' => 'Trabajo'
    ];

    public static $actions = [
        'create'    => 'Crear',
        'edit'      => 'Editar',
        'show'      => 'Ver',
        'index'     => 'Listar',
        'destroy'   => 'Eliminar'
    ];

    /**
     * Methods
     */
    public static function updatePermissionStatus($user_id, $resource, $actions) {
        $permission = Permission::where('user_id', $user_id)
                        ->where('resource', $resource)
                        ->first();

        if (! $permission) {
            $permissionData =   array_merge([
                                    'user_id'   => $user_id,
                                    'resource'  => $resource
                                ], $actions);

            $permission = new Permission($permissionData);
            $permission->save();

            return true;
        }

        foreach ($actions as $action => $status) {
            $permission->$action = $status;
        }

        $permission->save();
    }
}