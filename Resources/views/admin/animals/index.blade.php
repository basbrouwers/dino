@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('shelter::animals.title.animals') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('shelter::animals.title.animals') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.shelter.animal.create',['type'=>$type]) }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ ucfirst(trans('shelter::animals.type.'.$type)) }} toevoegen
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Naam</th>

                                <th>Geslacht</th>
                                <th>Ras</th>
                                <th>Datum binnen gekomen</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($animals)): ?>
                            <?php foreach ($animals as $animal): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.shelter.animal.edit', [$animal->id]) }}">
                                        {{ $animal->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.shelter.animal.edit', [$animal->id]) }}">
                                        {{ $animal->gender }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.shelter.animal.edit', [$animal->id]) }}">
                                        {{ $animal->breed['name'] }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.shelter.animal.edit', [$animal->id]) }}">
                                    {{ \Carbon\Carbon::parse($animal->created_at)->format('d-m-Y')}}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                    <a href="{{ route('admin.shelter.animal.view', [$animal->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('admin.shelter.animal.edit', [$animal->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.shelter.animal.destroy', [$animal->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Naam</th>
                                <th>Ras</th>
                                <th>Geslacht</th>
                                <th>Datum binnen gekomen</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('shelter::animals.title.create animal') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.shelter.animal.create',['type'=>$type]) ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
