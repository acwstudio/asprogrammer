<!-- PAGE LEVEL SCRIPTS -->

<script type="text/javascript">

    asp.init({

        mode: 'index',
        model: 'header',
        htmlModalContent: $('.modal-content').html(),
        urlActive: "{{ route('activator') }}",

        selector: {
            modalContent: '.modal-content',
            modalWrap: '#myModal',
            actions: 'a.btn',
            checkers: 'td input[type="checkbox"]',
        },

    });

</script>