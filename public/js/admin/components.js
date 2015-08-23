$(function () {
    initComponents();
});

function initComponents() {
    $('[title]:not(.cke_button)').tooltip();

    $('[data-component="editor"]').each(function () {
        if ($(this).data('initialized')) {
            return;
        }

        $(this).data('initialized', "true");

        var id = $(this).attr('id');

        CKEDITOR.replace(id);
    });
}

function setParameters(newParameters) {
    if (typeof Parameters == 'undefined') {
        return;
    }

    for (var i in newParameters) {
        Parameters[i] = newParameters[i];
    }
}