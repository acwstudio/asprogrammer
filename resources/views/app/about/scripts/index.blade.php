<!-- PAGE LEVEL SCRIPTS -->

<script type="text/javascript">

    asp.init({

        mode: 'index',
        model: 'about',
        htmlModalContent: $('.modal-content').html(),
        urlActive: "{{ route('activator') }}",

        selector: {
            modalContent: '.modal-content',
            modalWrap: '#myModal',
            actions: 'a.btn',
            checkers: 'td .custom-control-input',
        },

    });

    {{--cv.init({--}}

        {{--sets: {--}}
            {{--model: "user",--}}
            {{--/* Ajaxes settings*/--}}
            {{--typeActive: 'post',--}}
        {{--},--}}
    {{--});--}}

</script>