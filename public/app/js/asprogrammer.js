let aspr = (function () {

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
        console.log('delete');
        e.preventDefault();
        e.stopPropagation();
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

    let clickAction = function (e) {

            e.preventDefault();
            e.stopPropagation();
        //     let parse_id = e.currentTarget.id.split('-');
        //     let btn_act = parse_id[0];
        //     let url = e.currentTarget.href;
        //
        //     if (btn_act === "delete") {
        //         e.preventDefault();
        //         e.stopPropagation();
                // swal({
                //     title: sw.titleConfirm,
                //     text: sw.textConfirm,
                //     icon: "warning",
                //     dangerMode: true,
                //     buttons: [
                //         sw.cancel,
                //         sw.ok,
                //     ],
                // }).then(function (result) {
                //     if (result) {
                //         $.ajax({
                //             url: url,
                //             type: "delete",
                //             success: function (data) {
                //                 if (data) {
                //                     swal({
                //                         title: sw.titleDeleted,
                //                         text: sw.textDeleted,
                //                         icon: 'success'
                //                     }).then(function () {
                //                         location.reload();
                //                     });
                //
                //                 } else {
                //                     swal({
                //                         title: sw.titleDenied,
                //                         text: sw.textDenied,
                //                         icon: 'warning'
                //                     })
                //                 }
                //             },
                //         });
                //     } else {
                //         swal({
                //             title: sw.titleCanceled,
                //             text: sw.textCanceled,
                //             icon: 'info',
                //         })
                //     }
                // });

        //     }

        // });

    };

    return {
        init: aspInit,
    }

})();