




$(document).ready(function(){
    $('form').submit(function(event){
       // event.preventDefault()

        var name=document.getElementById('name').value
        var  id= document.getElementById('id').value
        var  review=document.getElementById('review').value

       

        $.post('../includes/Review.inc.php',{name: name,id: id, review: review}, function(data){
            console.log(data)
        })
    })
})