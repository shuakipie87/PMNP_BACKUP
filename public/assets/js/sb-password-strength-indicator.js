
(function($) {

    "use strict"; // Start of use strict

    var percentage = 0; 
    
    function password_check (n, m) 
    { 
        var $status_data = [];

        var $progress_bar = $(".progress-bar");
        var $status_value = $('span.status-value');
        var $info_value = $('span.info-value');

        if (n < 6) { 

            percentage = 0; 
            $progress_bar.css("background", "#dd4b39");

            $status_data[0] = {'weak' : true};

            $status_value.addClass('level-weak').html('<i class="text-danger">Weak</i>');

        } else if (n < 8) { 

            percentage = 20; 
            $progress_bar.css("background", "#9c27b0"); 

            $status_data[0] = {'weak' : true};
            $status_data[1] = {'passed' : true};

            $status_value.addClass('level-passed').html('<i class="text-warning">Passed</i>');

        } else if (n < 12) { 

            percentage = 40; 
            $progress_bar.css("background", "#ff9800"); 

            $status_data[0] = {'weak' : true};
            $status_data[1] = {'passed' : true};
            $status_data[2] = {'strong' : true};

            $status_value.removeClass('level-passed').addClass('level-strong').html('<i class="text-success">Strong</i>');

        } else { 

            percentage = 60; 
            $progress_bar.css("background", "#4caf50"); 

            $status_data[0] = {'weak' : true};
            $status_data[1] = {'passed' : true};
            $status_data[2] = {'strong' : true};
            $status_data[3] = {'super_strong' : true};

            $status_value.removeClass('level-strong').addClass('level-super-strong').html('<i class="text-success">Super Strong</i>');
        } 

        // Check for the character-set constraints and update percentage variable as needed. 
        
        // Lowercase Words only 
        if ((m.match(/[a-z]/) != null)) {
            percentage += 10; 
        }
        
        // Uppercase Words only 
        if ((m.match(/[A-Z]/) != null)) {
            percentage += 10; 
        }
        
        // Digits only 
        if ((m.match(/0|1|2|3|4|5|6|7|8|9/) != null)) {
            percentage += 10; 
        }
        
        // Special characters 
        if ((m.match(/\W/) != null) && (m.match(/\D/) != null)) {
            percentage += 10; 
        }
        
        if ((m.match(/[a-z]/) != null) && (m.match(/[A-Z]/) != null) && (m.match(/0|1|2|3|4|5|6|7|8|9/) != null) && (m.match(/\W/) != null) && (m.match(/\D/) != null)) {
            
        }

        var $html = '';
        $.each($status_data, function(index, item) {
            $html += '<div class="info-item">';
            
            if (index === 0) {
                $html += '<i class="text-danger">Weak</i>';
            } else if (index === 1) {
                $html += '<i class="text-warning">Passed</i>';
            } else if (index === 2) {
                $html += '<i class="text-success">Strong</i>';
            } else if (index === 3) {
                $html += '<i class="text-success">Super Strong</i>';
            }

            $html += '</div>';
        });

        // $info_value.html($html);

        // Update the width of the progress bar 
        $progress_bar.css("width", percentage + "%"); 
    }

    $("#exampleInputPassword").keyup(function() 
    { 
        var m = $(this).val(); 
        var n = m.length; 

        // Function for checking 
        password_check(n, m); 
    }); 

})(jQuery); // End of use strict