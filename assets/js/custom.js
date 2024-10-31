$(document).ready(function () {
    $('.delete_record_btn').click(function(e) {
        e.preventDefault();

        var route_number = $(this).val();
        //alert("Are you sure do you want to delete this record data?");
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              // Using $.ajax
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'route_number': route_number,
                        'delete_record_btn':true
                    },
                    success: function(response) {
                        if(response == 200)
                        {
                            swal("Success!", "Record Deleted Successfully", "success");
                        }
                        else if(response == 500) 
                        {
                            swal("Error!", "Something went wrong", "error");
                        }
                    }
                });
            } 
          });
    });
});
