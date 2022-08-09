$(document).ready(function(){
    $('#signup').validate(
      {
        // validate on focus out
        onfocusout: function(element) { 
          $(element).valid(); 
        },

        rules:{
          fname:'required',
          lname:'required',
          email:{
            required:true,
            email:true
          } //closes email
        }, //closes rules

        messages:{
          fname:{
            required:"Please supply your first name"
          },//closes fname message
          lname:{
            required:"Please supply your last name"
          },//closes lname message
          email:{
            required:"please supply your email",
            email:"this is not a valid email"
          } //closes email message
      },//closes messages
      errorPlacement:function(error,element){
          if(element.is(":radio")||element.is(":checkbox")){
            error.appendTo(element.parent());
          }else{
            error.insertAfter(element);
          }

          }//end of error placement

        });//end of validate
  }); //end of doc ready