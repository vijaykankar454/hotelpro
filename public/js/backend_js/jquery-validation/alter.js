$('#masterchk').on('click', function(e) {
    if ($(this).is(':checked', true)) {
        $(".sub_chk").prop('checked', true);
    } else {
        $(".sub_chk").prop('checked', false);
    }
});

function deleteRecord(url) {

    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Your data is safe!");
            }
        });

}

function activeRecord(url) {

    swal({
            title: "Are you sure?",
            buttons: true,

        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } 
        });

}

function deleteAllRecord(id) {
    
    var allVals = [];
    $(".sub_chk:checked").each(function() {
        allVals.push($(this).attr('data-id'));
    });

    if (allVals.length <= 0) {
        swal({
            text: "Please Select Atleast 1 Record",
            buttons: false,
            dangerMode: false,
        })
        return false;
    } else {   
         swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => { 
                if (willDelete) {
                    document.getElementById("myForm").submit();
                }  
            });

    }

}