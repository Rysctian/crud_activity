<script>
    document.addEventListener('DOMContentLoaded', function() {
      const successMessage = "<?php echo $this->session->flashdata('success'); ?>";
      const errorMessage = "<?php echo $this->session->flashdata('error'); ?>";
      const toastBody = document.querySelector('#statusToast .toast-body');
      const toast = new bootstrap.Toast(document.getElementById('statusToast'), { delay: 3000 });

      if (successMessage) {
        toastBody.textContent = successMessage;
        toastBody.classList.remove('text-danger');
        toastBody.classList.add('text-success');
        toast.show();
      } else if (errorMessage) {
        toastBody.textContent = errorMessage;
        toastBody.classList.remove('text-success');
        toastBody.classList.add('text-danger');
        toast.show();
      }
    });

    $(document).ready(function() {
      $('#employeesTable').DataTable();
    });
  </script>
</body>
</html>
