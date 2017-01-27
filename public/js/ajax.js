
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $('#address-form').submit(function(e) {
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            method: 'POST',
            url: '/address',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(res) {
                data = res.data;
                data.street = data.street ? data.street : '';
                data.house = data.house ? data.house : '';
                data.description = data.description ? data.description : '';

                var address = '\
                    <div class="item">\
                        <h3>' + data.name + '</h3>\
                        <p>\
                            ' + data.city +',  ' + data.area + ', '
                           + data.street + ', ' + data.house +
                        '</p>\
                    <p>'
                    + data.description +
                    '</p>\
                    <div class="actbox">\
                        <form action="http://my-addresses/address/1" method="post" class="ng-pristine ng-valid">\
                        <input type="hidden" name="_token" value="AYAAK5ijKcncCnsuusYqlB6En0DKXOjXQpzODsNk" autocomplete="off">\
                        <input type="hidden" name="_method" value="DELETE" autocomplete="off">\
                        <input style="border: none" value="" onclick="return confirm(\'Delete?\')" type="submit" class="bcross">\
                        </form>\
                        </div>\
                    </div>';
                console.log(data, address);

                $('.uo_adr_list').append(address);
            },
        });
    });

    $('#city').change(function(e) {
        $('#areas').find('.area-value').remove();

        if (!$(this).val()) {
            return false;
        }

        var id = $(this).val();

        $.ajax({
            method: 'GET',
            url: '/areas/' + id,
            dataType: 'json',
            success: function(res) {
                var options = [];

                res.data.forEach(function(area) {
                    var option = '<option class="area-value" value="' + area.name +  '">' + area.name +'</option>';

                    options.push(option);
                });

                $('#areas').append(options);
            }
        });
    });

});

