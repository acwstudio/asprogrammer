<!-- PAGE LEVEL SCRIPTS -->

<script type="text/javascript">

    aspr.init({
        mode: 'create',
        selector: {
            summernote: '#summernote'
        },
        urls: {},

    });
    //$('#summernote').summernote()
    {{--$('#summernote').summernote({--}}
        {{--placeholder: '{{ __('forms.ph.text') }}',--}}
        {{--tabsize: 2,--}}
        {{--height: 400,--}}
        {{--callbacks: {--}}
            {{--onImageUpload: function(files) {--}}
                {{--console.log(files);--}}
                {{--// upload image to server and create imgNode...--}}
                {{--$summernote.summernote('insertNode', imgNode);--}}
            {{--}--}}
        {{--}--}}
    {{--});--}}

    {{--$('#summernote').on('summernote.image.upload', function(we, files) {--}}
        {{--// upload image to server and create imgNode...--}}
        {{--$summernote.summernote('insertNode', imgNode);--}}
    {{--});--}}

</script>