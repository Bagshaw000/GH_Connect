var password= document.getElementById('password');
var busineserror= document.getElementById('busnameError');
var conpass= document.getElementById('conpassword');
var passError=document.getElementById('Error');
//This used to validate the password been inputed
password.addEventListener('input',function(e){
    var pattern= /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{8,64}$/;
    var currentvalue = e.target.value;
    var valid= pattern.test(currentvalue);

    if (valid){
        busineserror.style.display='none';
    }
    else{
    busineserror.style.display='block';
    }
    console.log(pattern.test(currentvalue));
})

conpass.addEventListener('input',function(e){
    var pattern= /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{8,64}$/;
    var currentvalue = e.target.value;
    var valid= pattern.test(currentvalue);

    if (valid){
        passError.style.display='none';
    }
    else{
    passError.style.display='block';
    }
    console.log(pattern.test(currentvalue));
})
