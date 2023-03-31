<?php
/**
 * Для таблиц свойств
 */
/*if (!function_exists('get_property_by_key')) {
    function get_property_by_key(\Illuminate\Database\Eloquent\Model $model, $key, $relative_field, $relative_id)
    {
        return $model::where('key', $key)->where('is_show', true)->where($relative_field, $relative_id)->first();
    }
}*/
/**
 * Для таблиц-сущностей
 */
/*if (!function_exists('get_field')) {
    function get_field($model, $field, $slug)
    {
        return $model::where('is_show', true)->where('slug', $slug)->pluck($field)->first();
    }
}*/

/*if (!function_exists('get_properties_by_key')) {
    function get_properties_by_key(\Illuminate\Database\Eloquent\Model $model, array $keys, $relative_field = false, $relative_id = false)
    {
        if ($relative_field and $relative_id) {
            return $model::whereIn('key', $keys)->where('is_show', true)->where($relative_field, $relative_id)->get();
        }
        return $model::whereIn('key', $keys)->where('is_show', true)->get();
    }
}

if (!function_exists('get_properties_by_name')) {
    function get_properties_by_name(\Illuminate\Database\Eloquent\Model $model, array $keys, $relative_field = false, $relative_id = false)
    {
        if ($relative_field and $relative_id) {
            return $model::whereIn('name', $keys)->where('is_show', true)->where($relative_field, $relative_id)->get();
        }
        return $model::whereIn('name', $keys)->where('is_show', true)->get();
    }
}

if (!function_exists('get_properties_by_type')) {
    function get_properties_by_type(\Illuminate\Database\Eloquent\Model $model, string $type, $relative_field = false, $relative_id = false)
    {
        if ($relative_field and $relative_id) {
            return $model::where('type', $type)->where('is_show', true)->where($relative_field, $relative_id)->get();
        }
        return $model::where('type', $type)->where('is_show', true)->get();
    }
}*/
