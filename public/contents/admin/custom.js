//Image Upload Script
$(document).ready(function () {
    $('.btn').addClass('custom-btn');

    $('.delete-btn').on('click',function(){
        $('#delete-id').val($(this).data('id'));
    });
});
