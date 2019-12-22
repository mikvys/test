
function setErrorValidation(elem, message) {
    var helpBlockClass = 'help-block__' + elem;
    var fieldPictureForm = 'field-' + elem;

    var $fieldPictureForm = $('.' + fieldPictureForm);
    var $helpBlockClass = $('.' + helpBlockClass);

    $fieldPictureForm.addClass('has-error');
    $helpBlockClass.text(message);
}

$(document).ready(function () {

    $('#add-picture-form').submit(function(e){

        //Обнуление формы
        $('.help-block').text('');
        $('.form-group').removeClass('has-error');
        $('.add-picture-success-message').hide();

        var formData = new FormData(this);

        $.ajax({
            url:'/site/upload-picture',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(errorMessages) {
                if ($.isEmptyObject(errorMessages)) {
                    $('#add-picture-form')[0].reset();
                    $('.add-picture-success-message').show();
                }

                for (var elemClass in errorMessages) {
                    setErrorValidation(elemClass, errorMessages[elemClass][0]);
                }
            }
        });
        e.preventDefault();

        return false;

    });

});