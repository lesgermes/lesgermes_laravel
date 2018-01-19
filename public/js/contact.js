$( document ).ready(function() {
    $('#contact-form').validator();
});

$('#contact-form input[type=submit]').click(function(event) {
    event.preventDefault();

    form = $("#contact-form");
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
                createAlert('#contact-alerts', 'warning', 'Oups!', data.responseJSON);
            },
            success : function(data) {
                console.log(data);
                createAlert('#contact-alerts', 'success', 'Merci!', data);
                form.find('input[type=text], input[type=email], textarea').val('');
            }
        });
    }
    else {
        createAlert('#contact-alerts', 'warning', 'Oups!', 'Problème dans le formulaire');
    }
});