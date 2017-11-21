var $ = jQuery = window.jQuery;

$(document).ready(function () {


    // Time Zone Calculator
    var $timezoneCalcSelect1 = $('select#from-region')
    var $timezoneCalcSelect2 = $('select#from-zone')
    var $timezoneCalcSelect3 = $('select#to-region')
    var $timezoneCalcSelect4 = $('select#to-zone')
    var $timezoneForm = $('form#timezone-form')

    $timezoneCalcSelect1.on('change', function () {
        var $zones = $('select#from-region option:selected').attr('data-timezones')
        $zones = JSON.parse($zones)
        document.getElementById('from-zone').options.length = 0

        for (var i = 0; i < $zones.length; i++) {
            var $opt = document.createElement('option')
            $opt.value = $zones[i]
            $opt.innerHTML = $zones[i]
            $timezoneCalcSelect2.append($opt)
        }
    })

    $timezoneCalcSelect3.on('change', function () {
        var $zones = $('select#to-region option:selected').attr('data-timezones')
        $zones = JSON.parse($zones)
        document.getElementById('to-zone').options.length = 0

        for (var i = 0; i < $zones.length; i++) {
            var $opt = document.createElement('option')
            $opt.value = $zones[i]
            $opt.innerHTML = $zones[i]
            $timezoneCalcSelect4.append($opt)
        }
    })

    $timezoneForm.on('submit', function (e) {
        e.preventDefault()
        var $url = $timezoneForm.attr('action')

        $.ajax({
            url: $url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'from-region': $timezoneCalcSelect1.val(),
                'from-zone': $timezoneCalcSelect2.val(),
                'from-date': $('input#from-date').val(),
                'from-time': $('input#from-time').val(),
                'to-region': $timezoneCalcSelect3.val(),
                'to-zone': $timezoneCalcSelect4.val()
            },
            success: function (data) {
                $('.timezone-results').slideDown()
                $('.converted-date').html(data)
            },
            error: function (jqXhr) {
                var errors = jqXhr.responseJSON
                var errorsHtml = '<div class="alert alert-danger"><ul>'
                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'
                })
                errorsHtml += '</ul></di>'
                $('.converted-date').html(errorsHtml)
                $('.timezone-results').slideDown()
            }
        })
    })

});