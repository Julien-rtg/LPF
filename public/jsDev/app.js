
$('.deleteButton').on('click', function() {

    event.preventDefault();

    const form = $(this).parents('form');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {

            setTimeout( function () { 
                form.submit();
            }, 1400);

            Swal.fire(
            'Deleted!',
            '',
            'success'
            )

        }

    })
    
});
