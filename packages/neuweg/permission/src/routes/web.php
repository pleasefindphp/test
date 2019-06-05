<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([

    'prefix' => config('app.admin_prefix', 'admin/modules'),
    'namespace' => 'Neuweg\Permission\Controllers\Admin'

], function(){

    Route::get('departments', [ 'as' => 'modules.departments.index', 'uses' => 'DepartmentController@index' ]);

});



 Route::get('departments/create', [ 'as' => 'admin.departments.create', 'uses' => 'DepartmentController@create' ]);
 Route::post('departments', [ 'as' => 'admin.departments.store', 'uses' => 'DepartmentController@store' ]);
 Route::get('departments/{id}', [ 'as' => 'admin.departments.show', 'uses' => 'DepartmentController@show' ]);
 Route::get('departments/{id}/edit', [ 'as' => 'admin.departments.edit', 'uses' => 'DepartmentController@edit' ]);
 Route::put('departments/{id}', [ 'as' => 'admin.departments.update', 'uses' => 'DepartmentController@update' ]);
 Route::get('departments/{id}/destroy', [ 'as' => 'admin.departments.delete', 'uses' => 'DepartmentController@destroy' ]);
 Route::get('search/departments', [ 'as' => 'admin.departments.search', 'uses' => 'DepartmentController@search' ]);

 Route::get('designations/{department_id}/create', [ 'as' => 'admin.designations.create', 'uses' => 'DepartmentController@designation_create' ]);
 Route::post('designations/{department_id}/store', [ 'as' => 'admin.designations.store', 'uses' => 'DepartmentController@designation_store' ]);

 Route::get('permission/create', [ 'as' => 'admin.departments.permission', 'uses' => 'DepartmentController@permission_create' ]);
 Route::post('permission/store', [ 'as' => 'admin.departments.permission_store', 'uses' => 'DepartmentController@permission_store' ]);

 Route::get('permission/viewDesignation', [ 'as' => 'admin.departments.viewDesignation', 'uses' => 'DepartmentController@permission_viewDesignation' ]);
 Route::get('permission/viewMenus', [ 'as' => 'admin.departments.viewMenu', 'uses' => 'DepartmentController@permission_viewMenu' ]);
