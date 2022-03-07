/**
 CONTENT

 1. Events when Document is ready
 2. Generate random numbers
 3. Retrive generated numbers by 'id'
*/

// ------------------------------------------ 1. Events when Document is ready
$(document).ready(function(){

    // Variables
    let shortTime  = 100;
    let middleTime = 300;
    let longTime   = 500;

    // Content shows up
    $(".content").fadeTo(longTime, 1);

// --------------------------------------------- 2. 2. Generate random numbers

// Click 'generate-numbers'
$(".generate-numbers").on('click', function() {

    // Set visability
    $('.number-results').fadeTo(1, 0);

		// Set variables
    let minNumber = $("#min-number").val();
    let maxNumber = $("#max-number").val();

    // Check if there are 'bad' characters (return 'true' if 'ok' otherwise 'false')
    let checkMinNumber = minNumber.match(/^[0-9]+$/i);
    let checkMaxNumber = maxNumber.match(/^[0-9]+$/i);

    // Parse vars as integer
    minNumber = parseInt($("#min-number").val());
    maxNumber = parseInt($("#max-number").val());

    // For debugging
    // alert( checkMinNumber + ' ' + checkMaxNumber );

    // If something went wrong
    if ((minNumber >= maxNumber) || (!checkMinNumber) || (!checkMaxNumber)) {

        // Send message
        setTimeout(function() {	$('.number-results').html("<h4 class='red'>Wrong numbers</h4>")}, middleTime);

        // Show message
        $('.number-results').fadeTo(middleTime, 1);

        return false;

    // If all is 'ok'
    } else {

        // Set visability
        $('.number-results').fadeTo(1, 1);

        // Load gif image
        $('.number-results').load("/app/includes/wait-for-load-is-done.html");

        // Set post identifier
        let generateNumbers = "generate-numbers";

        // Send data to Controller
        $.post("/app/controllers/NumbersController.php", {

            minNumber: minNumber,
            maxNumber: maxNumber,
        		generateNumbers: generateNumbers

        }, function(data) {

            // If the db table is empty or something went wrong
            if (data != 'ok' ) {

                // Send message
              	setTimeout(function() {
                    $('.number-results').html('<h4 class="red">Something went wrong</h4>')
                }, middleTime);

                // Show message
              	$('.number-results').fadeTo(middleTime, 1);

            // If there is at least one row in the table
            }	else {

                // Send message
                setTimeout(function() {
                    $('.number-results').html('<h4 class="green">Numbers generated</h4>')
                }, middleTime);

            		// Show message
            		$('.number-results').fadeTo(middleTime, 1);
            }
      	});

    } // end -> If all is 'ok'

		    return false;
});

// --------------------------------------- 3. Retrive generated numbers by 'id'
    // If 'user' typing something in '#find-number' field

// Tyoe an 'id' of a generated number
$("#find-number").on("keyup", function(e) {

    // If press 'enter'
    if (e.keyCode == 13) {
    		e.preventDefault();
    		return false;
    }

    // Get value from the field
    var searchNumber = $(this).val();

	   // Start script if the length of 'searchNumber' > 0
    if (searchNumber.length > 0) {

        // Check if there are 'bad' characters (return 'true' if 'ok' otherwise 'false')
        var checkInput = searchNumber.match(/^[0-9]+$/i);

        // If 'searchNumber' has 'bad' characters
        if (!checkInput) {

            // Send messsage
            setTimeout(function() {
                $('.retrieved-number').html("<h4 class='red'>Wrong id</h4>")
            }, longTime);

            // Show message
            $('.retrieved-number').fadeTo(longTime, 1);

               return false;

        // If all is 'OK'
        } else {

    				// Send the 'searchNumber' to Controller
    				$.post("/app/controllers/NumbersController.php", {

                searchNumber: searchNumber

            }, function(data) {

                // If something was found
                if (data) {

    								// Append data (random number from db table)
                    $(".retrieved-number").html(data);

                    // Show 'random number'
                    $('.retrieved-number').fadeTo(longTime, 1);

                // If nothing was found
                } else {

                    // Send message
                    $('.retrieved-number').html("Nothing Found");

    								// Show message
                    $('.retrieved-number').fadeTo(middleTime, 1);
                }
              });
          }// end -> If all is 'OK'

	    // If length of 'searchWord' < 1 empty 'retrieved-number' and nothing happens
    } else {
        $('.retrieved-number').fadeTo(longTime, 0);
				$(".retrieved-number").empty();
    }
});


}); // end/ $(document).ready(
