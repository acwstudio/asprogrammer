<!-- PAGE LEVEL SCRIPTS -->

<script type="text/javascript">

    aspr.init({

        mode: 'index',
        selector: {
            modalContent: '.modal-content',
            modalWrap: '#myModal',
            actions: 'a.btn',
        },
        url: {
            urlCreate: '/create/10'
        }

    });

    {{--cv.init({--}}
        {{--datatable: {--}}
            {{--translations: JSON.parse('{!! $transDataTable !!}'),--}}
        {{--},--}}

        {{--swal: {--}}
            {{--translations: JSON.parse('{!! $transSwal !!}'),--}}
        {{--},--}}

        {{--elems: {--}}
            {{--/* DataTable elements */--}}
            {{--table: $('#dataTable'),--}}
            {{--checkers: $('td .custom-control-input'),--}}
            {{--buttons: $('td .btn'),--}}
            {{--/* Modal elements */--}}
            {{--modal_wrap: $('#myModal'),--}}
            {{--modal_cont: modalContent,--}}
        {{--},--}}

        {{--sets: {--}}
            {{--modal_default: modalContent.html(),--}}
            {{--model: "user",--}}
            {{--/* Ajaxes settings*/--}}
            {{--typeActive: 'post',--}}
            {{--urlActive: "{{ route('activator') }}",--}}
        {{--},--}}
    {{--});--}}

    {{--@if(session()->has('sw-title'))--}}
    {{--swal({--}}
        {{--title: '{{ session()->get('sw-title') }}',--}}
        {{--text: '{{ session()->get('sw-text') }}',--}}
        {{--icon: 'success',--}}
    {{--});--}}
    {{--@endif--}}

</script>