let aspCreate = (function () {

    let dropzones = {};

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function init(props) {
        console.log(props);
        dropzones = $(props.selDropzones);

        initDropzone(props);

        initSummernote(props);
    }

    /**** Init summernote plugin ***/
    let initSummernote = function (props) {

        $(props.selSummernote).summernote({
            placeholder: 'Write something awesome...',
            tabsize: 2,
            height: 400,
            callbacks: {
                onImageUpload: function(file) {
                    sendFile(file);
                },

                onMediaDelete : function(target) {
                    let fileName = target[0].src;
                    deleteFile(fileName.replace(/^.*[\\\/]/, ''));
                }
            }
        });

        function sendFile(file) {

            let file_id = Math.floor(Math.random() * 1000001);
            let data = new FormData();
            let url = props.urlImgStore;

            data.append("file", file[0]);
            data.append("fileId", file_id);
            data.append("useImage", props.sumImage);

            $.ajax({
                data: data,
                type: "post",
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    let imgNode = $('<img>').attr('src', response.path + response.nameImage)[0];
                    $(props.selSummernote).summernote('insertNode', imgNode);

                }
            });
        }

        function deleteFile(name) {

            let data = new FormData();
            let url = props.urlImgDelete;

            data.append('fileName', name);
            data.append("useImage", props.sumImage);

            $.ajax({
                data: data,
                type: "post",
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp);
                }
            });
        }

    };

    /**** Init dropzone plugin ***/
    let initDropzone = function(props) {

        let file_id = null;

        dropzones.each(function (index, value) {

            $(value).dropzone({

                thumbnailHeight: props.droThmbn_h,
                thumbnailWidth: props.droThmbn_w,
                autoProcessQueue: props.droAutoPQ,
                url: props.urlImgStore,
                maxFiles: props.droMaxFiles,
                maxFilesize: props.droMaxFilesize,
                acceptedFiles: props.droAcceptedFiles,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            });

        });

        dropzones.each(function (index, element) {

            element.dropzone.on("maxfilesreached", function (file) {

                $(element).css("pointer-events", "none");

                if (file.name !== 'mockfile') {
                    swal({
                        title: 'Image upload',
                        text: 'sw.textUpload',
                        icon: "success"
                    });
                }

            });

            element.dropzone.on("addedfile", function (file) {
                file_id = Math.floor(Math.random() * 100001);
                // Create the remove button
                let removeButton = Dropzone.createElement("<button style='pointer-events: auto' " +
                    "id=" + file_id + " " +
                    "class='btn btn-sm btn-danger btn-block'>" + "<i class='fa fa-trash fa-fw'></i></button>");

                // Listen to the click event
                removeButton.addEventListener("click", function (e) {

                    e.preventDefault();
                    e.stopPropagation();
                    // Remove the file preview and from server.
                    element.dropzone.removeFile(file);

                    if (file.name !== 'mockfile') {
                        if (props.mode === 'edit') {
                            let mockFile = {name: "mockfile", size: 12345};
                            // createMockFile(element.dropzone, mockFile);
                            createMockFile(mockFile);
                        }
                        $.ajax({
                            url: props.urlImgDelete,
                            type: 'post',
                            data: {
                                fileName: $(removeButton).data('fileName'),
                                useImage: props.droImage,
                            },

                            success: function (data) {
                                console.log(data);
                            },
                        });
                    }

                });

                file.previewElement.appendChild(removeButton);
            });

            element.dropzone.on("removedfile", function () {

                $(element).css("pointer-events", "auto");

            });

            element.dropzone.on('sending', function (data, xhr, formData) {

                formData.append("fileId", file_id);
                formData.append("useImage", props.droImage);

            });

            element.dropzone.on("success", function (file, response) {
                console.log(response);
                $('#' + file_id).data('fileName', response.nameImage);

            });

            element.dropzone.on("error", function (file, errorMessage, xhr) {

                let storeErrors = errorMessage.errors;
                const list = document.createElement('ul');

                if (storeErrors) {
                    $.each(storeErrors, function (key, value) {
                        const listItem = document.createElement('li');
                        listItem.innerHTML = value;
                        listItem.style.textAlign = "left";
                        list.appendChild(listItem);
                    });

                    swal({
                        title: 'Image upload',
                        text: errorMessage.message,
                        icon: "error",
                        content: list,
                        className: "error",
                    }).then(
                        this.removeAllFiles(true)
                    );
                } else {
                    swal({
                        title: 'Image upload',
                        text: errorMessage,
                        icon: "error",
                    }).then(
                        this.removeAllFiles(true)
                    );
                }

            });

            let createMockFile = function (mockFile) {

                for (const [key, value] of Object.entries(sets.pathMockFile)) {

                    if (element.id === key) {
                        element.dropzone.emit("addedfile", mockFile);
                        element.dropzone.emit("maxfilesreached", mockFile);
                        element.dropzone.emit("thumbnail", mockFile, value);
                        element.dropzone.emit("complete", mockFile);
                    }
                }

                $(".dz-image img").css('height', dz.thmbn_h);

            };

            if (props.mode === 'edit') {
                let mockFile = {name: "mockfile", size: 12345};
                // createMockFile(element.dropzone, mockFile);
                createMockFile(mockFile);
            }

        });

    };

    return {
        init: init,
    }
})();