$( document ).ready(function() {
    $('#adopt-eden-form').validator();
});

$('#adopt-eden-form input[type=submit]').click(function(event) {
    event.preventDefault();

    form = $("#adopt-eden-form");
    if(!form.data('bs.validator').validate().hasErrors()) {
        formData = new FormData(form[0]);

        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: formData,
            contentType: false, //this is requireded please see answers above
            processData: false, //this is requireded please see answers above
            error   : function(data) {
                console.log(data);
                createAlert('#adopt-eden-alerts', 'warning', 'Oups!', data.responseJSON);
            },
            success : function(data) {
                console.log(data);
                createAlert('#adopt-eden-alerts', 'success', 'Merci!', data);
                $('#adopt-eden-form input[name=email]').val('');
            }
        });
    }
    else {
        createAlert('#adopt-eden-alerts', 'warning', 'Oups!', 'Problème dans le formulaire');
    }
});