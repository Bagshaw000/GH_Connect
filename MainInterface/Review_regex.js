var namee= document.getElementById('name')

var review= document.getElementById('review')

var name_error= document.getElementById('error_name')

function validate(){
    if (namee==''|| namee==null){
        namee.style.border="1px solid red";
        name_error.style.display='block';
        namee.focus();
        return false;
    }
}