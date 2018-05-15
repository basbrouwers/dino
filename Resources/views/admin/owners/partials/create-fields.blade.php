<div class="box-body">
    <div class="row">
        <div class="col-md-3">
            {!! Form::normalInput('firstname','Voornaam', $errors) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalInput('lastname','Achternaam', $errors) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            {!! Form::normalInput('street','Straat', $errors) !!}
        </div>
        <div class="col-md-1">
            {!! Form::normalInput('housenumber','Huisnummer', $errors) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            {!! Form::normalInput('zipcode','Postcode', $errors) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalInput('place','Plaats', $errors) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            {!! Form::normalInput('email','Email', $errors) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalInput('phonunumber','Telefoonnummer', $errors) !!}
        </div>
    </div>
</div>
