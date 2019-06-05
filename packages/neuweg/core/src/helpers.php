<?php

if (! function_exists('getMediaUrl')) {

    function getMediaUrl($filePath) {
        return asset($filePath);
    }

}

if (! function_exists('getImageUrl')) {

    function getImageUrl($image, $type = null) {

        if((!$image) && $type == 'user' ) return asset('uploads/user-not-found.svg');

        if(!$image) return asset('uploads/not-found.png');

        return asset($image);

    }

}

if (! function_exists('getValidationRules')) {

    function getValidationRules( $rules = [], $model = null ) {
        if(!$rules) return [];

        foreach( $rules as $key => $rule ) {
            if( $model && ( $model->$key == request($key) ) ) unset($rules[$key]);
        }
        return $rules;
    }
}

if (! function_exists('noAuth')) {
    function noAuth(){
        return response()->json(['message' => 'Not Authorised'], 401);
    }
}


if (! function_exists('isAuth')) {

    function isAuth($class, $method) {

        try{
            $className = $class;
            $permission = new $className();
            return $permission->$method();
        } catch (\Exception $e) {
            return false;
        }

    }

};
