




$(document).ready(function(){
    $('form').submit(function(event){
    

        
        var  Path= document.getElementById('Path').value
        

       

        $.post('../includes/Admindashboard.Product.inc.php',{Path: Path}, function(data){
            console.log(data)
        })
    })
})

