<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use CMS\Model\Base as BaseModel;
use App\Permission;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'email', 'password', 'permissions', 'brands'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Relations
     */
    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }

    public function brands()
    {
        return $this->belongsToMany('App\Brand');
    }

    /**
     * Methods
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['password']       = '';
        $data['fullname']       = $this->fullname;
        $data['permissions']    = null;

        if (count($this->permissions)) {
            $data['permissions'] = [];
        }

        foreach ($this->permissions as $permission) {
            $data['permissions'][$permission->resource] = [];

            foreach (Permission::$actions as $action => $name) {
                $data['permissions'][$permission->resource][$action] = $permission->$action;
            }
        }

        $data['brands'] = [];

        foreach ($this->brands as $brand) {
            $data['brands'][$brand->id] = true;
        }

        return $data;
    }

    public function setPasswordAttribute($value)
    {
        if (! $value) {
            return;
        }

        $this->attributes['password'] = \Hash::make($value);
    }

    public function getFullnameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function setPermissionsAttribute($permissions)
    {
        if (! $this->id) {
            $this->save();
        }

        foreach ($permissions as $resource => $actions) {
            Permission::updatePermissionStatus($this->id, $resource, $actions);
        }
    }

    public function setBrandsAttribute($brands)
    {
        if (! $this->id) {
            $this->save();
        }

        $ids = [];

        if (is_array($brands)) {
            foreach ($brands as $id => $active) {
                if ($active == false) {
                    continue;
                }

                $ids[] = $id;
            }
        }

        $this->brands()->sync($ids);
    }

    public function isAllowedTo($resource, $action) {
        $permission = Permission::where('user_id', $this->id)
                        ->where('resource', $resource)
                        ->first();

        if (! $permission) {
            return false;
        }

        return $permission->$action;
    }
}
