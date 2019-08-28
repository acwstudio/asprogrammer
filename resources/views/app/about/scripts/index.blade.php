<!-- PAGE LEVEL SCRIPTS -->

<script type="text/javascript">

    asp.init({

        mode: 'index',
        selector: {
            modalContent: '.modal-content',
            modalWrap: '#myModal',
            actions: 'a.btn',
            checkers: 'td .custom-control-input',
        },

    });

    {{--cv.init({--}}

        {{--elems: {--}}
            {{--checkers: $('td .custom-control-input'),--}}
        {{--},--}}

        {{--sets: {--}}
            {{--modal_default: modalContent.html(),--}}
            {{--model: "user",--}}
            {{--/* Ajaxes settings*/--}}
            {{--typeActive: 'post',--}}
            {{--urlActive: "{{ route('activator') }}",--}}
        {{--},--}}
    {{--});--}}

</script>