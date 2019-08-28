<!-- PAGE LEVEL SCRIPTS -->

<script type="text/javascript">

    asp.init({
        mode: 'create',
        urlImgStore: '{{ route('img-store') }}',
        urlImgDelete: '{{ route('img-delete') }}',

        selector: {
            summernote: '#summernote',
            dropzones: '.dropzone',
        },
        dropzone: {

            {{--urlStore: '{{ route('dz-store') }}',--}}
            {{--urlDelete: '{{ route('dz-delete') }}',--}}
            image: 'about',

            autoPQ: true,
            maxFiles: 1,
            maxFilesize: 1,
            acceptedFiles: 'image/*',
            thmbn_h: 150,
            thmbn_w: 450,

        },
        summernote: {
            {{--urlStore: '{{ route('smn-store') }}',--}}
            {{--urlDelete: '{{ route('smn-delete') }}',--}}
            image: 'summernote',
        }
    })

</script>