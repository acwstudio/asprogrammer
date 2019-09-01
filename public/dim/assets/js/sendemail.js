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

            },
            success: function (res) {

                elems.message.val(res).css('color', 'green');
                elems.submit.prop('disabled', false);

            },
            error: function (jqXHR, textStatus) {

                let storeErrors = $.parseJSON(jqXHR.responseText).errors;
                console.log(storeErrors)
                elems.submit.prop('disabled', false);

                $.each(storeErrors, function (key, value) {
                    if (elems[key]) {
                        elems[key].attr('placeholder', value);
                    }
                })
            },
            complete: function (res) {

                setTimeout(function () {
                    elems.message.val(res).css('color', 'white');
                    elems.form.each(function () {
                        this.reset();
                    });
                }, 3000);
            }

        });

    };

    $('#submit_btn').on('click', send_mail);

})(jQuery);