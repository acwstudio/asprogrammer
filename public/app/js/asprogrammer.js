let aspr = (function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let modalContent = {};
    let modalWrap = {};
    let actions = {};

    let props = {};

    function aspInit(params) {

        getProperties(params);
        console.log(props);

        if (props.mode === 'index') {
            indexMode();
        }

        if (props.mode === 'create') {
            createMode();
        }

    }

    let getProperties = function(items) {

        let stack = '';
        getProp(items, stack);

        function getProp(o, stack) {
            for (let [key, value] of Object.entries(o)) {
                if (typeof value === 'object') {
                    getProp(value, stack = key);
                } else {
                    if (stack) {
                        props[stack.substring(0, 3) + key.charAt(0).toUpperCase() + key.slice(1)] = value;
                    } else {
                        props[key] = value;
                    }
                }
            }
        }
    };

    let indexMode = function() {

        modalContent = document.querySelector(props.selModalContent);
        actions = document.querySelectorAll(props.selActions);
        modalWrap = props.selModalWrap;

        actions.forEach(function (item, i, actions) {

            if (item.id.split('-')[0] === 'show') {
                item.addEventListener("click", showItem);
            }

            if (item.id.split('-')[0] === 'delete') {
                item.addEventListener("click", deleteItem);
            }

        });

    };

    let createMode = function() {

        $('#summernote').summernote({
            placeholder: 'Oops....',
            tabsize: 2,
            height: 400,
            callbacks: {
                onImageUpload: function (files) {
                    console.log(files);
                    // upload image to server and create imgNode...
                    $summernote.summernote('insertNode', imgNode);
                }
            }
        });
    };

    let deleteItem = function (e) {

        e.preventDefault();
        e.stopPropagation();

        let url = e.currentTarget.href;

        swal({
            title: 'Dangerous action!!!',
            text: 'The Item will be permanently deleted',
            icon: "warning",
            dangerMode: true,
            buttons: [
                'Cancel',
                'OK',
            ],
        }).then(function (result) {
            if (result) {
                $.ajax({
                    url: url,
                    type: "delete",
                    success: function (data) {
                        if (data) {
                            swal({
                                title: 'That is that!',
                                text: 'The Item has been deleted',
                                icon: 'success'
                            }).then(function () {
                                location.reload();
                            });

                        } else {
                            swal({
                                title: 'O-Ops!!!',
                                text: 'Something went wrong',
                                icon: 'warning'
                            })
                        }
                    },
                });
            } else {
                swal({
                    title: 'Action canceled!',
                    text: 'The Item is OK',
                    icon: 'info',
                })
            }
        });
    };

    let showItem = function (e) {
        console.log('show');
        e.preventDefault();
        e.stopPropagation();

        let url = e.currentTarget.href;

        $(modalWrap).modal('show');

        $.ajax({
            url: url,
            success: function (data) {
                modalContent.innerHTML = data;
                console.log(data)
            }
        });
    };

    return {
        init: aspInit,
    }

})();