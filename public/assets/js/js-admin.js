(function($) {
    "use strict"; // Start of use strict

    // assign-task onclick
    $('#assignTaskModal').on('click', 'button.btn.btn-primary', 
        function() {

        var $url = '';

        $.ajax({
            type:'POST',
            url: $url,
            data: {},
            contentType: false,
            processData: false,
            success: (response) => {
                console.log(response);
                // location.reload();
            },
            error: function(response){
                
            }
        });
    });

})(jQuery); // End of use strict

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })();