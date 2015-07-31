<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Permission;
use Session;
use Auth;

class AuthComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::user();

        if (! $user) {
            return;
        }

        $permissions = [];

        foreach (Permission::$resources as $resource => $name) {
            $permissions[$resource] = [];

            foreach (Permission::$actions as $action => $name) {
                $permissions[$resource][$action] = $user->isAllowedTo($resource, $action);
            }
        }

        $view->with('userPermissions', $permissions);
    }

}