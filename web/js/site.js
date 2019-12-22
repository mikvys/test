$(document).ready(function () {

    $('#add-picture-form').submit(function(e){

        var formData = new FormData(this);

        $.ajax({
            url:'pictures/create',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
            }
        });
        e.preventDefault();

        return false;

    });

});