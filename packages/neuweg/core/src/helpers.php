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

define('DATE_FORMAT', 'd-m-Y');

define('DATETIME_FORMAT', 'd-m-Y g:i A');

define('TIME_FORMAT', 'g:i A');

if (! function_exists('getDateTimeValue')) {

    function getDateTimeValue($date) {
        if( in_array($date, ['0000-00-00', '0000-00-00 00:00:00']) || (!$date)) return '';
        return date(DATETIME_FORMAT, strtotime($date));
    }

}

if (! function_exists('getDateValue')) {

    function getDateValue($date) {
        if( in_array($date, ['0000-00-00', '0000-00-00 00:00:00']) || (!$date)) return '';
        return date('d-m-Y', strtotime($date));
    }

}

if (! function_exists('getTimeValue')) {

    function getTimeValue($date) {
        if( in_array($date, ['0000-00-00', '0000-00-00 00:00:00', '00:00:00']) || (!$date)) return '';
        return date(TIME_FORMAT, strtotime($date));
    }

}

if (! function_exists('cvalidate')) {

    function cvalidate( $rules, $attrs = [] ) {

        if(! count($attrs) ) $attrs = request()->all();
        $validation = Validator::make( $attrs, $rules );
        if(! $validation->fails() ) return false;
        return $validation->messages();

    }

}
