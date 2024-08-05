// Import all of Bootstrap's JS
// import * as bootstrap from "bootstrap";
// import toastr from "toastr";

window.addEventListener("toastr:show", (event) => {
    let title = event.detail[0].title;
    let msg = event.detail[0].msg;
    let type = event.detail[0].type;

    if (toastr.options == null) {
        toastr.options = {
            closeButton: false,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
    }

    switch (type) {
        case "success":
            toastr.success(msg, title);
            break;
        case "warning":
            toastr.warning(msg, title);
            break;
        case "info":
            toastr.info(msg, title);
            break;
        case "error":
            toastr.error(msg, title);
            break;
        default:
            toastr.error("Invalid type");
    }
});

window.addEventListener("swal:toast:show", (event) => {
    let title = event.detail[0].title;
    let msg = event.detail[0].msg;
    let type = event.detail[0].type;

    let swalToast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        customClass: {
            // container: '...',
            popup: 'justify-content-start align-items-center',
            // header: '...',
            // title: '...',
            // closeButton: '...',
            // icon: '...',
            // image: '...',
            // htmlContainer: '...',
            // input: '...',
            // inputLabel: '...',
            // validationMessage: '...',
            // actions: '...',
            // confirmButton: '...',
            // denyButton: '...',
            // cancelButton: '...',
            // loader: '...',
            // footer: '....',
            // timerProgressBar: '....',
        },
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    swalToast.fire({ icon: type, title: title, text: msg });
});

window.addEventListener("swal:alert:show", (event) => {
    let callbackEvent = event.detail[0].lwevent;
    let callbackData = event.detail[0].lwdata;

    let swalOptions = {};

    swalOptions = JSON.parse(event.detail[0].options);

    Swal.fire(swalOptions).then((userResponse) => {
        if (userResponse.isConfirmed) {
            // window.livewire.dispatch(event.detail[0].lwevent, event.detail[0].lwdata);
            Livewire.dispatch(callbackEvent, callbackData);
        }
    });
});

// window.addEventListener("modal:show", (event) => {
//     $("#" + event.detail[0].modalName).modal({
//         backdrop: "static",
//         keyboard: false,
//     });
// });
// window.addEventListener("modal:close", (event) => {
//     $("#" + event.detail[0].modalName).modal("hide");
// });



// Boostrap 5 | Livewire 3
window.modal_main = null;
window.modal_subs = [];

window.addEventListener("modal:show", (event) => {
    // FOR BOOTSTRAP 5 MODAL
    // Livewire 3
    window.modal_main = new bootstrap.Modal(
        document.getElementById(event.detail[0].modalName), {
        backdrop: 'static'
    }
    );

    window.modal_main.show();
});
window.addEventListener("modal:close", (event) => {
    // FOR BOOTSTRAP 5 MODAL
    // Livewire 3
    if (window.modal_main) {
        window.modal_main.hide();
    }
});

window.addEventListener("modal:sub:show", (event) => {
    // FOR BOOTSTRAP 5 MODAL
    // Livewire 3
    let modal_id = event.detail[0].modalName;

    if (!window.modal_subs[modal_id]) {
        window.modal_subs[modal_id] = new bootstrap.Modal(
            document.getElementById(modal_id), {
            backdrop: 'static'
        }
        );
    }

    window.modal_subs[modal_id].show();
});
window.addEventListener("modal:sub:close", (event) => {
    // FOR BOOTSTRAP 5 MODAL
    // Livewire 3
    let modal_id = event.detail[0].modalName;

    if (window.modal_subs[modal_id]) {
        window.modal_subs[modal_id].hide();
    }
});


document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook("message.processed", (message, component) => {
        $('[data-toggle="tooltip"]').tooltip("dispose").tooltip();
        $('[data-toggle="popover"]').popover("dispose").popover();

        // colored tooltip
        $('[data-toggle="tooltip-primary"]').tooltip("dispose").tooltip({
            template:
                '<div class="tooltip tooltip-primary" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        });
        $('[data-toggle="tooltip-secondary"]').tooltip("dispose").tooltip({
            template:
                '<div class="tooltip tooltip-secondary" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        });
        $('[data-toggle="tooltip-info"]').tooltip("dispose").tooltip({
            template:
                '<div class="tooltip tooltip-info" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        });
        $('[data-toggle="tooltip-danger"]').tooltip("dispose").tooltip({
            template:
                '<div class="tooltip tooltip-danger" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        });
        $('[data-toggle="tooltip-success"]').tooltip("dispose").tooltip({
            template:
                '<div class="tooltip tooltip-success" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        });
        $('[data-toggle="tooltip-warning"]').tooltip("dispose").tooltip({
            template:
                '<div class="tooltip tooltip-warning" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        });

        $('[data-popover-color="head-primary"]').popover("dispose").popover({
            template:
                '<div class="popover popover-head-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="head-secondary"]').popover("dispose").popover({
            template:
                '<div class="popover popover-head-secondary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="head-info"]').popover("dispose").popover({
            template:
                '<div class="popover popover-head-info" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="head-danger"]').popover("dispose").popover({
            template:
                '<div class="popover popover-head-danger" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="head-success"]').popover("dispose").popover({
            template:
                '<div class="popover popover-head-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="head-warning"]').popover("dispose").popover({
            template:
                '<div class="popover popover-head-warning" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="head-dark"]').popover("dispose").popover({
            template:
                '<div class="popover popover-head-dark" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });

        $('[data-popover-color="primary"]').popover("dispose").popover({
            template:
                '<div class="popover popover-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="secondary"]').popover("dispose").popover({
            template:
                '<div class="popover popover-secondary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="info"]').popover("dispose").popover({
            template:
                '<div class="popover popover-info" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="danger"]').popover("dispose").popover({
            template:
                '<div class="popover popover-danger" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="success"]').popover("dispose").popover({
            template:
                '<div class="popover popover-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="warning"]').popover("dispose").popover({
            template:
                '<div class="popover popover-warning" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
        $('[data-popover-color="dark"]').popover("dispose").popover({
            template:
                '<div class="popover popover-dark" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        });
    });
});
