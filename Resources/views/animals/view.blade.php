@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('shelter::animals.title.view animal') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.shelter.animal.index',['type'=>'dog']) }}">{{ trans('shelter::animals.title.animals') }}</a></li>
        <li class="active">{{ trans('shelter::animals.title.edit animal') }}</li>
    </ol>
@stop

@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    <strong>Naam</strong>
                </div>
                <div class="col-md-9">
                    {{$animal->name}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <strong>Geslacht</strong>
                </div>
                <div class="col-md-9">
                {{ trans('shelter::animals.properties.gender.'.$animal->gender) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <strong>Ras</strong>
                </div>
                <div class="col-md-9">
                {{ $animal->breed->name}}
                </div>
            </div>
        </div>


            
            
        
        <div class="col-md-6">
            <img class="img-fluid" style="max-width:100%" src="http://www.dogbreedslist.info/uploads/allimg/dog-pictures/American-Staffordshire-Terrier-2.jpg">
        </div>

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

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?=route('admin.shelter.animal.index',['type'=>'dog'])?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
