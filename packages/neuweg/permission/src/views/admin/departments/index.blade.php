@extends('layouts.master')

@section('pageBar')
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Departments & designations</h3>
    </div>
@stop

@section('content')

    <div id="addpanel">

    </div>

    {{-- departments --}}
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-10 col-sm-10 col-md-10">
                            <h3 class="panel-title text-capitalize">Departments</h3> </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="pull-right">
                                <ul class="list-inline mrgn-all-none">
                                    <li>
                                        @if( isAuth( get_class($permission), 'create') )
                                        <button
                                            class="btn btn-primary btn-rounded dataModel"
                                            type="button"
                                            data-id="#addpanel"
                                            data-href="{{ route('modules.departments.create') }}"
                                        >Add New
                                        </button>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-1" class="collapse in">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="data-table table-striped table-middle table-hover th-fw-light" style="width:100%;">
                                <thead>
                                <tr class="bg-primary">
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Tag </th>
                                    <th> Created Date </th>
                                    @if( isAuth( get_class($permission), 'edit') || isAuth( get_class($permission), 'destroy') )
                                    <th> Action </th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @if(! count($collection) )
                                    <tr>
                                        <td colspan="15" style="text-align: center">No matching records found</td>
                                    </tr>
                                @else
                                    @foreach( $collection as $model )
                                        <tr>
                                            <td> {{ $model->id }} </td>
                                            <td> {{ $model->name }} </td>
                                            <td> {{ $model->tag }} </td>
                                            <td> {{ getDateTimeValue($model->created_at) }} </td>
                                            @if( isAuth( get_class($permission), 'edit') || isAuth('Department', 'destroy') )
                                            <td>
                                                @if( isAuth( get_class($permission), 'edit') )
                                                <button
                                                    data-id="#addpanel"
                                                    data-href="{{ route('admin.departments.edit', $model->id) }}"
                                                    class="btn btn-outline-inverse btn-xs dataModel"
                                                    type="button"
                                                > <span><i class="fa fa-pencil" aria-hidden="true"></i></span> Edit </button>
                                                @endif
                                                @if( isAuth( get_class($permission), 'destroy') )
                                                <a href="{{route('admin.departments.delete', $model->id)}}" class="deleteItem btn btn-outline-danger btn-xs" type="button"> <span><i class="fa fa-times" aria-hidden="true"></i></span> Delete </a>
                                                @endif
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--./ departments--}}

    @if( isAuth( get_class($permission), 'create_designation') )
    <div id="designationpanel">

    </div>
    {{--designation--}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <h3 class="panel-title text-capitalize">Designation</h3>
                        </div>
                    </div>
                </div>
                <div id="panel-1" class="collapse in">
                    <div class="panel-body">
                        @if(! count($collection) )
                            <h5 colspan="15" style="text-align: center">No matching records found</h5>
                        @else
                            <div class="line-slide-tab">
                                <ul class="nav nav-tabs">
                                    @foreach( $collection as $index => $model )
                                        @if( $index == 0 )
                                            <li class="active"> <a data-toggle="tab" href="#tab-{{$model->id}}" aria-expanded="true">{{$model->name}} </a> </li>
                                        @else
                                            <li class=""> <a data-toggle="tab" href="#tab-{{$model->id}}" aria-expanded="false">{{ $model->name }}</a> </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="tab-content pad-all-lg">
                                    @foreach( $collection as $index => $model )
                                        <div id="tab-{{$model->id}}" class="tab-pane fade <?php if($index == 0) echo 'active in'; ?>">

                                            <?php $role_collection = $repository->getRolesModel()->where('department_id', $model->id)->get(); ?>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button style="margin-bottom: 1%"
                                                        data-id="#designationpanel"
                                                        data-href="{{ route('admin.designations.create', $model->id) }}"
                                                        class="btn btn-primary btn-rounded pull-right dataModel">Add New</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="data-table table-striped table-middle table-hover th-fw-light" style="width:100%;">
                                                            <thead>
                                                            <tr class="bg-primary">
                                                                <th> ID </th>
                                                                <th> Name </th>
                                                                <th> Tag </th>
                                                                <th> Created Date </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(! count($role_collection) )
                                                                <tr>
                                                                    <td colspan="15" style="text-align: center">No matching records found</td>
                                                                </tr>
                                                            @else
                                                                @foreach( $role_collection as $r_model )
                                                                    <tr>
                                                                        <td> {{ $r_model->id }} </td>
                                                                        <td> {{ $r_model->display_name }} </td>
                                                                        <td> {{ $r_model->name }} </td>
                                                                        <td> {{ getDateTimeValue($r_model->created_at) }} </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--./ designation--}}
    @endif
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.department-menu').addClass('active');
        });
    </script>
@stop
