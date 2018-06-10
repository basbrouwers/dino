<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            @mediaMultiple('gallery', $animal)
        </div>
        <div class="col-md-12">
            {!! Form::normalInput('name','Naam', $errors, $animal) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::normalSelect('gender', 'Geslacht', $errors,  ['male'=>'male','female'=>'female'],$animal) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::normalSelect('breed_id', 'Ras', $errors,  $breeds,$animal) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 extra-margin-top">
            {!!Form::label('with_other_dog','Kan met andere honden')!!}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('with_other_dog','Ja', $errors,1,$animal)}}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('with_other_dog','Nee', $errors,0,$animal)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 extra-margin-top">
            {!!Form::label('with_other_cat','Kan met katten?')!!}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('with_other_cat','Ja', $errors,1,$animal)}}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('with_other_cat','Nee', $errors,0,$animal)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 extra-margin-top">
            {!!Form::label('children_below_age_7','Kan met kinderen < 7?')!!}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('children_below_age_7','Ja', $errors,1,$animal)}}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('children_below_age_7','Nee', $errors,0,$animal)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 extra-margin-top">
            {!!Form::label('children_above_age_7','Kan met kinderen > 7? ')!!}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('children_above_age_7','Ja', $errors,1,$animal)}}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('children_above_age_7','Nee', $errors,0,$animal)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 extra-margin-top">
            {!!Form::label('fixed','Is gecastreerd/gesterriliseerd ? ')!!}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('fixed','Ja', $errors,1,$animal)}}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('fixed','Nee', $errors,0,$animal)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 extra-margin-top">
            {!!Form::label('aggression','Heeft de hond ooit agressie vertoond?')!!}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('aggression','Ja', $errors,1,$animal)}}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('aggression','Nee', $errors,0,$animal)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{Form::normalTextarea('aggression_info','Zo ja onder welke omstandigheden',$errors,$animal)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 extra-margin-top">
            {!!Form::label('chipped','Is de hond gechipt?')!!}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('chipped','Ja', $errors,1,$animal)}}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('chipped','Nee', $errors,0,$animal)}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 extra-margin-top">
            {!!Form::label('owner_has_passport','Hond heeft paspoort en eigenaar bezit paspoort?')!!}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('owner_has_passport','Ja', $errors,1,$animal)}}
        </div>
        <div class="col-md-1">
            {{Form::normalRadio('owner_has_passport','Nee', $errors,0,$animal)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::normalSelect('owner_id', 'Eigenaar', $errors,  $owners,$animal) !!}
        </div>
    </div>
    <div class="row extra-margin-top">
        <div class="col-md-12">
            {{Form::normalTextarea('additional_info','Aanvullende informatie',$errors,$animal)}}
        </div>
    </div>
</div>

