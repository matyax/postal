<?php namespace CMS\Database;

class Query
{
    private static $namespace = '\App';

    public static function find($model, $conditions = array(), $order = 'id DESC', $page = NULL, $limit = NULL, $count = false)
    {
        $query = static::_query($model, $conditions);

        if ($count == true) {
            return $query->count();
        }

        if ($limit) {
            $query->take($limit);
        }

        if ($page) {
            $page--;

            $query->skip($page * $limit);
        }

        foreach (explode(',', $order) as $orderField) {
            $orderArray = explode(' ', trim($orderField));

            $query->orderBy($orderArray[0], $orderArray[1]);
        }

        return $query->get();
    }

    public static function findOne($model, $conditions = array())
    {
        $query = static::_query($model, $conditions);

        return $query->first();
    }

    private static function _parseModel($model) {
        if (substr($model, 0, strlen(static::$namespace)) != static::$namespace) {
            $model = static::$namespace . '\\' . $model;
        }

        return $model;
    }

    private static function _query($model, $conditions = array())
    {
        $model = static::_parseModel($model);

        if ($model::$eagerLoadingRelationships) {
            $query = $model::with($model::$eagerLoadingRelationships);
        } else {
            $query = $model::where('id', '>', 0);
        }

        if (! $conditions) {
            return $query;
        }

        foreach ($conditions as $condition => $operator) {

            if (is_array($operator)) {
                foreach ($operator as $key => $value) {

                    $comparison = $key == 'less_than' ? '<=' : '>=';

                    if (\CMS\Date::isDate($value)) {
                        $value = \CMS\Date::toDbFormat($value);
                    }

                    $query->where($condition, $comparison, $value);
                }

                continue;
            }

            if ($operator === 'AND') {
                die('To implement: and');

                continue;
            } elseif ($operator === 'OR') {
                die('To implement: or');

                continue;
            }

            if (\CMS\Date::isDate($operator)) {
                $operator = \CMS\Date::toDbFormat($operator);
            }

            $query->where($condition, $operator);
        }

        return $query;
    }
}
