let aspr = (function () {

    let modalContent = {};
    let modalWrap = {};
    let actions = {};

    function aspInit(props) {

        modalContent = document.querySelector(props.selectors.modalContent);
        actions = document.querySelectorAll(props.selectors.actions);
        modalWrap = '#' + props.selectors.modalWrap;
        console.log(modalContent.innerHTML);
        actions.forEach(function(item, i, actions) {

            if (item.id.split('-')[0] === 'show') {
                item.addEventListener("click", showItem);
            }

            if (item.id.split('-')[0] === 'delete') {
                item.addEventListener("click", deleteItem);
            }

        });

    }

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