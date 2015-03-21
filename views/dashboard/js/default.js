$(document).ready(function () {

    $.get('dashboard/xhrGetListings', function (e) {

        for (var i = 0; i < e.length; i++) {
            $('#listInserts').append('<li class="list-group-item">' + e[i].text + '<a class="del text-danger" rel="' + e[i].id + '" href="#">X</a></li>');
        }

        $('.del').on('click',function () {
            var delItem = $(this);
            var id = $(this).attr('rel');

            $.post('dashboard/xhrDeleteListing', {'id': id}, function (e) {
                delItem.parent().remove();
            }, 'json');

            return false;
        });

    }, 'json');

    $('#randomInsert').submit(function () {
        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url, data, function (e) {
            $('#listInserts').append('<li class="list-group-item">' + e.text + '<a class="del" rel="' + e.id + '" href="#">X</a></li>');
        }, 'json');

        return false;
    });

});

