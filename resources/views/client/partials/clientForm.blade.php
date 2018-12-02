{!! Form::label('name','Client Name: ')!!}
{!! Form::text('name',null,['placeholder'=>'Client Name'])!!} {{$errors->first('name')}}<br>

{!! Form::label('address','Address: ')!!}`
{!! Form::text('address',null,['placeholder'=>'Client\'s Address'])!!} {{$errors->first('address')}}<br>


{!! Form::label('contact','Contact: ')!!}
{!! Form::text('contact',null,['placeholder'=>'Contact'])!!} {{$errors->first('contact')}}<br>