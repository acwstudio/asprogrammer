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
            checkers: 'td input[type="checkbox"]',
        },

    });

</script>