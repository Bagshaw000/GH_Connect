



$(document).ready(function(){
    $('form').submit(function(event){
        
    
        var fdata = new FormData(this);
        $.ajax( {
            cache :false,
            data : fdata,
            url : '../Admindashboard/Admindashboard.productInsert.php',
            type : 'POST',
            processData : false,
            contentType : false,
         });

       
        


});
});
