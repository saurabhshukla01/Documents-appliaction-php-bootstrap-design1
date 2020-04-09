$(function()
{
    $("#ezeerupee_form").validate(
      {
        rules: 
        {
          fname: 
          {
            required: true
          },
          mobilenumber: 
          {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
          },
          user_email: 
          {
            required: true,
            email: true
          },
          gender: 
          {
            required: true
          },
          dob: 
          {
            required: true
          },
          pincode: 
          {
            required: true
          },
          city: 
          {
            required: true
          },
          maritalstatus: 
          {
            required: true
          },
          pancard: 
          {
            required: true
          },
          empstatus: 
          {
            required: true
          },
          monthincome: 
          {
            required: true
          },
          lookfor: 
          {
            required: true
          },
        },
        messages: 
        {
            fname: 
          {
            required: "Please enter your name"
          },
          user_email: 
          {
            required: "Please enter your email address"
          },
          mobilenumber:
          {
              required: "please enter your mobile number"
          },
          gender:
          {
              required: "please select your gender"
          },
          dob:
          {
              required: "please enter your date of birth"
          },
          pincode:
          {
              required: "please enter your pincode number"
          },
          city:
          {
              required: "please enter your city"
          },
          maritalstatus:
          {
              required: "please select your marital status"
          },
          pancard:
          {
              required: "please enter your pancard number"
          },
          empstatus:
          {
              required: "please Select your employment status"
          },
          monthincome:
          {
              required: "please enter your monthly salary"
          },
          lookfor:
          {
              required: "please select anyone"
          }

        }
      });	
});