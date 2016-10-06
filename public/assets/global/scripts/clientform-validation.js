$(function(){
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

					if ( element.attr( "name" ) === "date" || element.attr( "name" ) === "year" || element.attr( "name" ) === "month" ) {
						error.insertAfter( ".day" );
					}
                    else if(element.attr( "name" ) === "education_passedyear[]" || element.attr( "name" ) === "education_name[]")
                    {
                        error.insertAfter('.addeducation')
                    }
                    else if(element.prop('name') === 'gender')
                    {
                        
                        error.insertAfter( ('.gender'));
                    }
                    else if(element.prop('name') === 'mode_of_contact')
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
				}
                
			} );
} );
