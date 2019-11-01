$(document).ready(function () {
    // add banner ajax

    $('#add_form').on('submit', function (e) {
        e.preventDefault();
        var formurl = $(this).attr('action');
        var type = $(this).attr('method');
        var formData = new FormData(this);

        x = document.getElementById("add_form");
        var table_data = [];
        table_data[0] = '';
        var i = 1;
        for (i = 1; i < x.length - 1; i++) {
            table_data[i - 1] = x.elements[i].value;
        }

        // var title = formData.get('title');
        // var sub_title = formData.get('sub_title');
        $.ajax({
            url: formurl,
            type: type,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                // $('#table tr:last').after('<tr><td>'+title+'</td><td>'+sub_title+'</td><td></td>'+manage()+'</tr>');
                // var table_data = [title, sub_title];
                console.log(data);
                $('#table tr:first').after('<tr>' + makeTableTd(table_data, data.banner) + '</tr>');
                $('#add_form').trigger("reset");
                s_alert();
            },
        });
    });

    $('#add_submit').on('click', function () {
        $('#add_form').submit();
    });

});

function manage(id) {
    return '<td><a class="text-success ml-1" data-action="{{route(' + 'ajax_index_view' + ',' + id + ')}}" data-method="GET" data-id="' + id + '" data-toggle="modal" data-target=".view-modal" title="view" href="#"><i class="ti ti-zoom-in"></i></a> <a class="text-warning ml-1" title="edit" href="#"><i class="ti ti-pencil-alt"></i></a> <a class="text-danger  delete-btn" title="delete" data-id="{{$item->id}}" data-toggle="modal" data-target=".delete-modal" href="#"><i class="ti ti-trash"></i></a></td>';
}

function s_alert() {
    return swal({
        title: "Success!",
        text: "Add item Successfully",
        timer: 5000,
        icon: "success",
    });
}

function makeTableTd(table_data, id) {
    var td = '';
    for (i = 0; i < table_data.length; i++) {
        td = td + '<td>' + table_data[i] + '</td>';
    }
    td = td + manage(id) + '';
    // console.log(td);
    return td;
}

// view ajax

$(document).ready(function () {
    $('.view-btn').on('click', function (e) {
        e.preventDefault();
        var formurl = $(this).data('action');
        var type = $(this).data('method');

        $.ajax({
            url: formurl,
            type: type,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#view-result').html(data.banner);
                // var counter = (data+'').length;
                var counter = Object.entries(data.banner).length;
                console.log(data.banner);
                jQuery.each(data.banner, function (i, val) {
                    $("#view-result").append('<tr><td style="width:35%">' + i + "<td style='width:3px;'>:</td> <td style='width:60%'>" + val + "</td><tr/>");
                });
                var image_src = $('#banner-img').data('server') + data.banner.image;
                $('#banner-img').attr('src', image_src);
                console.log(image_src);
            }
        });
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
                jQuery.each(data.banner, function (i, val) {
                    $("#update_form").append('<label class="w-25">' + i + ':</label><input name="' + i + '" value="' + val + '" class="w-75 form-control"> </br></br>');
                });
                var image_src = $('#update_img').data('server') + data.banner.image;
                $('#update_img').attr('src', image_src);
                console.log(image_src);
            }
        });
    });
});

// update data ajax
$(document).ready(function () {
    $('#update_form').on('submit', function (e) {
        e.preventDefault();
        var formurl = $(this).attr('action');
        var type = $(this).attr('method');
        var formData = new FormData(this);

        var td_count = $("table").find("td");
        // console.log(td_count);

        x = document.getElementById("update_form");
        var table_data = [];
        table_data[0] = '';
        var i = 1;
        for (i = 1; i < x.length - 1; i++) {
            table_data[i - 1] = x.elements[i].value;

            if (i == 3) {
                var v = x.elements[i].value;
                console.log('v = ', v);
            }

            for (var j = 0; j < td_count.length; j++) {
                if (v != '' && i>3) {
                    var idname = x.elements[i].name;
                    console.log('idname = ', idname);
                    idname = idname + v;

                    if (td_count[j].id == idname && x.elements[i].value != '') {
                        var change_id = document.getElementById(idname);
                        change_id.innerHTML = x.elements[i].value;
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
                // $('#table tr:first').after('<tr>' + makeTableTd(table_data) + '</tr>');
                $("#update_form .form-control").remove();
                $("#update_form br").remove();
                $("#update_form label").remove();
                $('.modal').modal('hide');
                s_alert();
            },
        });
    });

    $('#update_submit').on('click', function () {
        $('#update_form').submit();
    });

});

// delete ajax

$(document).ready(function () {
    $('#delete-form').on('submit', function (e) {
        e.preventDefault();
        var formurl = $(this).attr('action');
        var type = $(this).attr('method');
        var formData = new FormData(this);
        var delete_id = $('#delete-id').val();
        console.log(formurl, type, delete_id);
        $.ajax({
            url: formurl,
            type: type,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                var delrow = '#del_row' + delete_id;
                $(delrow).remove();
                $('.modal').modal('hide');
                s_alert();
            },
        });
    });

    $('#delete-btn').on('click', function () {
        $('#delete-form').submit();
    });
});
