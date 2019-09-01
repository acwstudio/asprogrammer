(function ($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    let send_mail = function (e) {

        e.preventDefault();

        let elems = {

            form: $('#contact_form'),
            name: $('#name'),
            email: $('#email'),
            message: $('#message'),
            submit: $('#submit_btn'),

        };

        $.ajax({

            url: elems.form.attr('action'),
            type: 'post',
            data: elems.form.serialize(),
            beforeSend: function () {

                elems.submit.prop('disabled', true);
                $('div.field label').each(function () {
                    $(this).css('background-color', '');
                })

            },
            success: function (res) {

                elems.message.val(res).css('color', 'green');

                setTimeout(function () {

                    elems.message.val(res).css('color', 'white');
                    $('.field input, .field textarea').each(function () {

                        if ($(this).attr('placeholder')) {
                            $(this).attr('placeholder', '');
                            $(this).val('');
                        }

                        $(this).val('');
                    });

                }, 3000);

                elems.submit.prop('disabled', false);

            },
            error: function (jqXHR, textStatus) {

                let storeErrors = $.parseJSON(jqXHR.responseText).errors;

                elems.submit.prop('disabled', false);

                $.each(storeErrors, function (key, value) {

                    if (elems[key] && value) {

                        elems[key].attr('placeholder', value);
                        $('label[for=' + key + ']').css('background-color', 'darkred');
                        elems[key].val('');
                    }

                })
            },
            complete: function (res) {
                console.log(res)
            }

        });

    };

    let reset_form = function(){

        $('.field input, .field textarea').each(function () {

            if ($(this).attr('placeholder')) {
                $(this).attr('placeholder', '');
                $(this).val('');
            }

            $(this).val('');

        });

        $('div.field label').each(function () {
            $(this).css('background-color', '');
        })
    };

    $('li input[type="submit"]').on('click', send_mail);
    $('li input[type="button"]').on('click', reset_form);

})(jQuery);