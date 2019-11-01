$(document).ready(function () {
    // add form data ajax
    $('#add_form').on('submit', function (e) {
        e.preventDefault();
        var formurl = $(this).attr('action');
        var type = $(this).attr('method');
        var formData = new FormData(this);

        // var title = formData.get('title');
        // var sub_title = formData.get('sub_title');

        var x = document.getElementById('add_form');
        var table_data = [];
        table_data[0] = '';
        for (var i = 1; i < x.length - 1; i++) {
            table_data[i - 1] = x.elements[i].value;
        }
        console.log(table_data);

        $.ajax({
            url: formurl,
            type: type,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response.id);
                console.log(response.image);
                $('#table tr:last').after('<tr id="del_row'+response.id+'"> ' + makeTableTd(table_data,response.image,response.id) +'</tr>');
                $('#add_form').trigger('reset');
                $('.modal').modal('hide');
                s_alert();
            },
            error: function () {
                console.log('data insert failed');
            },
        });
    });
    // submitting add form
    $('#add_submit').on('click', function () {
        $('#add_form').submit();
    });

});

function managebtn(id) {
    var url= $('.view-btn').data('server')+$('.view-btn').data('view_url')+id;
    console.log(url);
    return '<td><a class="text-success ml-1 view-btn" data-method="GET" data-action="'+url+'" id="view_id'+id+'" data-id="'+id+'" data-toggle="modal" data-target=".view-modal" title="view" href="#"><i class="ti ti-zoom-in"></i></a> <a class="text-warning ml-1" title="edit" data-method="GET" data-action="'+url+'" data-id="'+id+'"  data-toggle="modal" data-target=".edit-modal" href="#"><i class="ti ti-pencil-alt"></i></a> <a class="text-danger  delete-btn" title="delete"  data-id="'+id+'"  data-toggle="modal" data-target=".delete-modal" href="#"><i class="ti ti-trash"></i></a> </td>';
}

function makeTableTd(table_data,image,id) {
    var td = '';
    var image_src = $('.view-btn').data('server')+'/'+image;
    var url= $('.view-btn').data('server')+$('.view-btn').data('view_url')+id;
    url = String(url);
    for (var i = 0; i < table_data.length; i++) {

        if(i==table_data.length-1)
            td = td + '<td><img style="height:40px" src="'+image_src+'"</td>';
        else
            td = td + '<td>' + table_data[i] + '</td>';
    }

    td = td +  '<td><a class="text-success ml-1 view-btn" data-method="GET" data-action="'+url+'" id="view_id'+id+'" data-id="'+id+'" data-toggle="modal" data-target=".view-modal" title="view" href="'+url+'"><i class="ti ti-zoom-in"></i></a> <a class="text-warning ml-1" title="edit" data-method="GET" data-action="'+url+'" data-id="'+id+'"  data-toggle="modal" data-target=".edit-modal" href="#"><i class="ti ti-pencil-alt"></i></a> <a class="text-danger  delete-btn" title="delete"  data-id="'+id+'"  data-toggle="modal" data-target=".delete-modal" href="#"><i class="ti ti-trash"></i></a> </td>';

    console.log(td);
    return td;
}

function s_alert() {
    return swal({
        title: "Success!",
        text: "Add Banner Successfully",
        timer: 3000,
        icon: "success",
    });
}

// view ajax

$(document).ready(function () {
    $('.view-btn').on('click', function (e) {
        e.preventDefault();
        var formurl = $(this).data('action');
        var type = $(this).data('method');
        console.log(formurl,type,'no');
        $.ajax({
            url: formurl,
            type: type,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data.banner);
                $('#view-result tr').remove();
                jQuery.each(data.banner, function (colname, coldata) {
                    $('#view-result').append('<tr> <td style="width:35%">' + colname + '</td> <td style="width:4px;text-align:center">:</td> <td style="width:60%">' + coldata + '</td> </tr>')
                });

                var image_src = $('#banner-img').data('server') + data.banner.image;
                $('#banner-img').attr('src', image_src);
                console.log(image_src);
            }
        });
    })
});

// delete ajax

$(document).ready(function () {
    $('#delete-form').on('submit', function (e) {
        e.preventDefault();
        var formurl = $(this).attr('action');
        var type = $(this).attr('method');
        var formData = new FormData(this);
        var delete_id = $('#delete-id').val();
        $.ajax({
            url: formurl,
            type: type,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                var del_row = "#del_row" + delete_id;
                console.log(del_row);
                $('.modal').modal('hide');
                $(del_row).remove();
                s_alert();
            }
        });
    });

    // submitting delete form
    $('#delete-btn').on('click', function () {
        $('#delete-form').submit();
    });
});


// Update view form ajax

$(document).ready(function () {
    $('.edit-btn').on('click', function (e) {
        e.preventDefault();
        var formurl = $(this).data('action');
        var type = $(this).data('method');
        $("#update_form .form-control").remove();
        $("#update_form br").remove();
        $("#update_form label").remove();
        $.ajax({
            url: formurl,
            type: type,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data.banner);
                jQuery.each(data.banner, function (colname, colvalue) {
                    $("#update_form").append('<label class="w-25">' + colname + ':</label><input name="' + colname + '" value="' + colvalue + '" class="w-75 form-control"> </br></br>');
                });
                var image_src = $('#update_img').data('server') + data.banner.image;
                $('#update_img').attr('src', image_src);
                console.log(image_src);
            }
        });
    });

    $('#update_form').on('submit', function (e) {
        e.preventDefault();
        var formurl = $(this).attr('action');
        var type = $(this).attr('method');
        var formData = new FormData(this);

        var td_content = $('table').find('td');
        console.log(td_content);

        var form_content = document.getElementById('update_form');
        var form_data = [];
        form_data[0] = '';

        console.log(form_content.length);
        for (var i = 1; i < form_content.length - 1; i++) {
            form_data[i - 1] = form_content.elements[i].value;

            if (i == 3) {
                var form_database_id = form_content.elements[i].value;
                console.log(form_database_id);
            }

            for (var j = 0; j < td_content.length; j++) {
                if (form_database_id != '' && i > 3) {
                    var formTitleName = form_content.elements[i].name;
                    id_name = formTitleName + form_database_id;
                    console.log(id_name);

                    if (td_content[j].id == id_name && form_content.elements[i].value != '') {
                        document.getElementById(id_name).innerHTML = form_content.elements[i].value;
                        break;
                    }
                }
            }

        }

        $.ajax({
            url: formurl,
            type: type,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.modal').modal('hide');
                s_alert();
            }
        });
    });

    $('#update_submit').on('click', function () {
        $('#update_form').submit();
    });

});
