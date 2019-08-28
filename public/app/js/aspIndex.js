let aspIndex = (function () {

    function init(props) {

        listItems(props);

    }

    let listItems = function(props) {

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

    let showItem = function (e) {

        e.preventDefault();
        e.stopPropagation();

        let url = e.currentTarget.href;

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

    return {

        init: init,

    }

})();