@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('shelter::animals.title.view animal') }}
    </h1>

@stop

@section('content')
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
                            {{ $animal->name }}
                        </td>
                        <td>
                            {{ trans('shelter::animals.properties.gender.'.$animal->gender) }}
                        </td>
                        <td>
                            {{ $animal->breed['name'] }}
                        </td>
                        <td>

                            {{ \Carbon\Carbon::parse($animal->created_at)->format('d-m-Y')}}

                        </td>

                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>

                </table>
                <!-- /.box-body -->
            </div>
        </div>
        @stop

        @section('footer')
            <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
        @stop
        @section('shortcuts')
            <dl class="dl-horizontal">
                <dt><code>b</code></dt>
                <dd>{{ trans('core::core.back to index') }}</dd>
            </dl>
@stop

