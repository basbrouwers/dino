<div class="box-body">
    <div class="row">
        <div class="col-md-3">
            {!! Form::normalInput('firstname','Voornaam', $errors, $owner) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalInput('lastname','Achternaam', $errors, $owner) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            {!! Form::normalInput('street','Straat', $errors, $owner) !!}
        </div>
        <div class="col-md-1">
            {!! Form::normalInput('housenumber','Huisnummer', $errors, $owner) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            {!! Form::normalInput('zipcode','Postcode', $errors, $owner) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalInput('place','Plaats', $errors, $owner) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            {!! Form::normalInput('email','Email', $errors, $owner) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalInput('phonunumber','Telefoonnummer', $errors, $owner) !!}
        </div>
    </div>
</div>
