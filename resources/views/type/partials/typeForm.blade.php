{!! Form::label('name','Loan Type: ')!!}
{!! Form::text('name',null,['placeholder'=>'Loan Type'])!!}{{$errors->first('name')}}<br>

{!! Form::label('rate','Interest Rate: ')!!}
{!! Form::text('rate',null,['placeholder'=>'Rate'])!!}{{$errors->first('rate')}}<br>