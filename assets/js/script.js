$(document).ready(function() {
    var successMessage = "<?php echo $this->session->flashdata('success'); ?>";
    if (successMessage) {
        $('#toast .toast-body').text(successMessage);
        $('#toast').removeClass('bg-danger').addClass('bg-success text-white');
        $('#toast').toast({
            delay: 3000
        }); 
        $('#toast').toast('show');
    }

    var errorMessage = "<?php echo $this->session->flashdata('error'); ?>";
    if (errorMessage) {
        $('#toast .toast-body').text(errorMessage);
        $('#toast').removeClass('bg-success').addClass('bg-danger text-white'); 
        $('#toast').toast({
            delay: 3000
        }); 
        $('#toast').toast('show');
    }

    $('#employeesTable').DataTable();
});


