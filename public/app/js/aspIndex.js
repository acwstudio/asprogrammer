let aspIndex = (function () {

    let _props = {};

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function init(props) {

        _props = props;
        listItems();

    }

    let listItems = function() {

        modalContent = document.querySelector(_props.selModalContent);
        actions = document.querySelectorAll(_props.selActions);
        modalWrap = _props.selModalWrap;

        actions.forEach(function (item, i, actions) {

            if (item.id.split('-')[0] === 'show') {
                item.addEventListener("click", showItem);
            }

            if (item.id.split('-')[0] === 'delete') {
                item.addEventListener("click", deleteItem);
            }

        });

        $(_props.selCheckers).on("click", activeItem);

    };

    let activeItem = function (e) {

        let checkboxId = e.currentTarget.id;
        let valueId = e.currentTarget.value;
        let fieldName = _props.model + '_id';

        $(_props.selCheckers).prop('checked', false);
        $('#' + checkboxId).prop('checked', true);

        $.ajax({
            url: _props.urlActive,
            method: "post",
            data: {
                fieldName: fieldName,
                valueId: valueId,
            },
            success: function (response) {
                console.log(response);
                swal({
                    title: 'Activator',
                    text: 'ID:' + response.activatedId + ' Activated',
                    icon: 'success'
                })
            }
        });

    };

    let showItem = function (e) {

        e.preventDefault();
        e.stopPropagation();

        let url = e.currentTarget.href;

        $(modalWrap).on('hidden.bs.modal', function (e) {
            modalContent.innerHTML = _props.htmlModalContent;
        });

        $(modalWrap).modal('show');

        $.ajax({
            url: url,
            success: function (data) {
                modalContent.innerHTML = data;
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
                        if (data === 1) {
                            swal({
                                title: 'That is that!',
                                text: 'The Item has been deleted',
                                icon: 'success'
                            }).then(function () {
                                location.reload(true);
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

    return {

        init: init,

    }

})();