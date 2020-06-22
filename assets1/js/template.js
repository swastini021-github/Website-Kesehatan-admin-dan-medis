$(".form_ajax").on("submit",function(event){
    event.prevenDefault();
    var from=$(this);
    var data=$(from).serialize();
    $.ajax({
        type:"POST",
        url:$(from).attr('action'),
        data:data,
        dataType:'json',
        success:function(resul){
            if(result_error){
                $('.err_msg').html(result.msg);
            }
            else{
                alert('berhasil');
            }   
        },
        error:function(jgXHR,textStatus,errorThrown){
            console.log(textStatus,errorThrow);
        }
    });
});