$(function()
{
    $(document)
        .ajaxStart(NProgress.start)
        .ajaxStop(NProgress.done);
});

function createAlert(holder, type, title, message) {
    $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
            '<strong>' + title + '</strong> ' + message +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
            '</button>' +
        '</div>').appendTo(holder);
}