@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('shelter::animals.title.view animal') }}
    </h1>

@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.shelter.animal.create') }}" class="btn btn-primary btn-flat"
                       style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ ucfirst(trans('shelter::animals.type.')) }} toevoegen
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
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($animals)): ?>
                            <?php foreach ($animals as $animal): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('animal.view', [$animal->id]) }}">
                                        {{ $animal->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('animal.view', [$animal->id]) }}">
                                        {{ $animal->gender }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('animal.view', [$animal->id]) }}">
                                        {{ $animal->breed['name'] }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('animal.view', [$animal->id]) }}">
                                        {{ \Carbon\Carbon::parse($animal->created_at)->format('d-m-Y')}}
                                    </a>
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

@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@push('js-stack')
<script type="text/javascript">
    $(function () {
        $('.data-table').dataTable({
            "paginate": true,
            "lengthChange": true,
            "filter": true,
            "sort": true,
            "info": true,
            "autoWidth": true,
            "order": [[0, "desc"]]
        });
    });
</script>
@endpush

