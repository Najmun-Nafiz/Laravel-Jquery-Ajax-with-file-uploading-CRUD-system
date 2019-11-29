$(function(){


// Create Part Start Now

 $("#DataAddForm").on("#submit", function(e){

    e.preventDefault();
    var name= $("#name").val();
    var phone= $("#phone").val();
    var email= $("#email").val();

    var url = $(this).attr("action");
    var method = $(this).attr("method");

    swal(url + method);
});

});

// Create Part End Now