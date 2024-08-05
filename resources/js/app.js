import './bootstrap';


$(".select2-select-single").select2();
$(".select2-select-multiple").select2();

$(".modal").each(function (index, modalElem) {
    $(modalElem).on('shown.bs.modal', () => {
        console.log('modal show');
        $(".select2-select-single").select2();
        $(".select2-select-multiple").select2();
    })

})
