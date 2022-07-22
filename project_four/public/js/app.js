/**
 CONTENT

 1. Disable 'Enter' key
 2. Set variables
 3. Content shows up
 4. Type a 'tag' name in the 'Search by tag' field
 5. Hide 'alert' border and 'alert' message under an 'input' field
*/

$(document).ready(function(){

// ---------------------------------------------------- 1. Disable 'Enter' key
    $(document).on("keyup keypress", "input", function(e) {
        if(e.which == 13) {
            e.preventDefault();
            return false;
        }
    });

// ---------------------------------------------------------- 2. Set variables
    let middleTime = 300;

// ------------------------------------------------------- 3. Content shows up
    $(".content").fadeTo(middleTime, 1);

    $(".show-articles").on("click", function() {
        $(location).attr("href", "/articles");
    });

    $(".create-article").on("click", function() {
        $(location).attr("href", "/articles/create");
    });

// ------------------------- 4. Type a 'tag' name in the 'Search by tag' field
    $("#search-article").on("keyup", function() {

        // Get value from the field
        var tag = $(this).val();

        // Check if there are 'bad' characters
        var checkTag = tag.match(/^[A-Za-z\-]+$/);

        // Get 'token' for the form
        var _token = $("input[name='_token']").val();

        // If 'tag' has 'bad symbols' cut it to 1 sybmbol and stop the script
  			if (! checkTag) {
  					$("#search-article").val(tag.substring(0, tag.length = 1));
  					return false;
  			}

    	   // Start the script if the length of 'tag' > 1 and < 25
        if (tag.length > 1 && tag.length < 25) {

    				// Send 'tag' nad '_token'
    				$.post("/articles/tag/" + tag, {

                _token: _token,
                tag: tag

            }, function(data) {

                // Hide image on home page
                $(".home-img").fadeTo(middleTime, 0).empty();

                // If something was found
                if (data) {

                    $(".content").fadeTo(middleTime, 0).empty();

                    // Append and show the found data
                    $(".found-articles").html(data).fadeTo(middleTime, 1);

                    // Show
                    $(".content").fadeTo(middleTime, 1);

                // If nothing was found
                } else {
                    $(".content").fadeTo(middleTime, 0).empty();
                    $(".found-articles").html("<div class='count-articles p-2 ms-3 mt-5'>Nothing Found</div>").fadeTo(middleTime, 1);
                }
            });

    	  // If length of 'tag' < 2
        } else {
            $(".found-articles").fadeTo(middleTime, 0).empty();
        }
    });

// ------------ 5. Hide 'alert' message and 'alert' border under 'input' field
    $(document).on("keydown", "input, textarea", function(){
    		$(this).next().fadeTo(middleTime, 0).removeClass("alert-border");
    });

}); // end/ $(document).ready(
