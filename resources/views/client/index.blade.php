@extends('layouts.default')
@section('content')
<script src="{{ asset('assets/global/scripts/clientform-validation.js') }}"></script>
<script src="{{ asset('assets/global/scripts/addmore.js') }}"></script>
<div class="form-group col-md-10">
{!! Form::open(array('url' => '/client/saveCsv', 'id'=>'addclient','method'=>'post','role'=>'form')) !!}
@if (count($errors) > 0)
    <!-- Client Validation Errors-->
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
    <div class="form-group col-md-12" style="border-bottom: 1px solid #ccc !important;">
        <label class="col-md-3">Mode Of Contact</label>
        <div class="col-md-9">
            <div class="col-md-3"><input type="radio" name="mode_of_contact" class="col-md-3" value="Phone" /> Phone</div> 
            <div class="col-md-3"><input type="radio" name="mode_of_contact" class="col-md-3" value="Email" /> Email</div> 
            <div class="col-md-2 mode_of_contact"><input type="radio" name="mode_of_contact" class="col-md-3" value="None" /> None</div>
        </div>
    </div>
    
    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-primary" value="submit" name="submit"/>
    </div>
{!! Form::close() !!}
</div>
@stop