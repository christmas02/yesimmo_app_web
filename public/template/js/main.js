$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('body').on('click', '#datefin', function () {
    var datedebut = $(this).data('datedebut');
    var datefin = $(this).data('datefin');
    

    console.log(datedebut);

    
});

$(".datefin").on("change", function() {
    var date = $(this).val();
    $(".datefin").val(date);

    console.log(datefin);
});


 

