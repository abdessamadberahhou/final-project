$('#change_password_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{
        old_pass:{
            required:true,
            minlength:8,
            maxlength:100
        },
        new_pass:{
            required:true,
            minlength:8,
            maxlength:100
        },
        c_new_pass:{
            required:true,
            equalTo:'#new_pass'
        },
    },
    messages:{
        old_pass:{
            required:"Entrer votre ancien mot de passe"
        },
        new_pass:{
            required:"Entrer votre nouveau mot de passe"
        },
        c_new_pass:{
            required:"Confirmer votre nouveau mot de passe"
        },
    },
    submitHandler:function (form){
        $.LoadingOverlay("show");
    }
})
