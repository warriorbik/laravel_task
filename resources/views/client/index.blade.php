@extends('layouts.default')
@section('content')
<div class="form-group col-md-10">
{!! Form::open(array('url' => '/client/saveCsv', 'id'=>'addclient','method'=>'post','role'=>'form')) !!}
@if (count($errors) > 0)
<div class="alert alert-danger">
    There were some problems adding the Client.<br />
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="form-group col-md-12">
       
        
        <label class="col-md-3">Name</label>
        <div class="col-md-9">
            {!! Form::text('name', null, 
              array(
                'class'=>'', 
                'placeholder'=>'Your Full Name'
              )) !!}
            
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-3">Gender</label>
        <div class="col-md-9">
            <div class="col-md-3">{!! Form::radio('gender','Male') !!} Male</div>
            <div class="col-md-3">{!! Form::radio('gender','Female') !!} Female</div>
            <div class="col-md-2 gender">{!! Form::radio('gender','Others') !!} Others</div>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-3">Phone</label>
        <div class="col-md-9">
            {!! Form::text('phone',null,array('placeholder'=>"Your Phone Number")) !!}
            
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-3">Email</label>
        <div class="col-md-9">
            {!! Form::email('email',null,array('placeholder'=>"Your Email Address")) !!}
            
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-3">Address</label>
        <div class="col-md-9">
            {!! Form::textarea('address',null,array('placeholder'=>"Enter Your Full Address",'style'=>'height:90px !important')) !!}
            
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-3">Nationality</label>
        <div class="col-md-9">
            <select name="nationality">
                <option value="">Choose Nationality</option>
                @foreach ($countries as $country)
                    <option value="{{$country->nationality}}">{{$country->nationality}}</option>
                @endforeach
                
            </select>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-3">Date of Birth</label>
        <div class="col-md-9">
            {!! Form::selectRange('year', 1900, date('Y'), null, ['placeholder' => 'Year']) !!}
            {!! Form::selectMonth('month', null, ['placeholder' => 'Month']) !!}
            {!! Form::selectRange('day', 1, 31, null, ['placeholder' => 'Day']) !!}
            
        </div>
       
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-3">Education Background</label>
        <div class="more_education">
            <div class="col-md-2">
                <input type="text" name="education_name[]" placeholder="Education Level"/>
            </div>
            <div class="col-md-3">
                <input type="text" name="education_passedyear[]" placeholder="Education Passed year"/>
            </div>
            <div class="col-md-4">
                <a href="javascript:void(0)" class="btn btn-primary  addeducation">+ ADD</a>
            </div>
            
        </div>
        
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-3">Mode Of Contact</label>
        <div class="col-md-9">
            <div class="col-md-3"><input type="radio" name="mode_of_contact" class="col-md-3" value="Phone" /> Phone</div> 
            <div class="col-md-3"><input type="radio" name="mode_of_contact" class="col-md-3" value="Email" /> Email</div> 
            <div class="col-md-2 mode_of_contact"><input type="radio" name="mode_of_contact" class="col-md-3" value="None" /> None</div>
        </div>
    </div>
    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-primary" value="Save" name="submit"/>
    </div>
{!! Form::close() !!}
</div>
<script>
$(function(){
    $('.addeducation').click(function()
    {
        var addmore = '<div><div class="col-md-3"></div><div class="col-md-2"><input type="text" name="education_name[]" placeholder="Education Name"/>'+
                      '</div><div class="col-md-3"><input type="text" name="education_passedyear[]" placeholder="Education Passed year"/>'+
                      '</div><div class="col-md-4"><a href="javascript:void(0)" class="btn btn-danger" onclick="$(this).parent().parent().remove()">- Remove</a></div>'+
                      '<div class="clearfix"></div></div>';
        $('.more_education').append(addmore)
    });
    $( "#addclient" ).validate( {
			 onkeyup: false,
				rules: {
					name: "required",
				    day: "required",
                    month: "required",
                    year: "required",
                    gender: "required",
                    email: "required",
                    phone: {
                        required:true,
                        number: true},
                    address:"required",
                    nationality: "required",
                    mode_of_contact:'required',
					'education_name[]': "required",
                    'education_passedyear[]': "required"
				},
                groups: {
                    day: "year month day",
                    education_passedyear:"education_name[] education_passedyear[]"
                },
				messages: {
					name: "Input your fullname",
					lname: "Input a lastname/Surname",
				    phone:{
				            required:"Input your phone number",
                            number:"Input a number"
                            },
					email: {
					    required:"Input an email address",
                        email: "Input a valid email address",
                        
                    },
                    mode_of_contact:"Please select mode of contact",
                    year: "Please select year ",
                    month: "Please select month ",
                    day: "Please select date of birth",
                    gender: "Please select a gender",
                    address: "Input your address",
                    nationality: "Please select your nationality",
                    'education_passedyear[]':'Input your Education Background',
                    'education_name[]':'Input your Education Level'
                   
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
                    
					error.addClass( "help-block" );

					if ( element.attr( "name" ) == "date" || element.attr( "name" ) == "year" || element.attr( "name" ) == "month" ) {
						error.insertAfter( ".day" );
					}
                    else if(element.attr( "name" ) == "education_passedyear[]" || element.attr( "name" ) == "education_name[]")
                    {
                        error.insertAfter('.addeducation')
                    }
                    else if(element.prop('name')=== 'gender')
                    {
                        
                        error.insertAfter( ('.gender'));
                    }
                    else if(element.prop('name')=== 'mode_of_contact')
                    {
                        
                        error.insertAfter( ('.mode_of_contact'));
                    }
                     else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				},
                
			} );

})
</script>
@stop