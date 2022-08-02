/**
 CONTENT

 1. Disable 'Enter' key
 2. Set variables
 3. Show content
 4. Type a 'tag' name in the 'Search by tag' form
 5. Hide 'alert' border and 'alert' message under an 'input' field
 6. Click and redirect
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
    let shortTime  = 100;

// ----------------------------------------------------------- 3. Show content
    $(".content").fadeTo(middleTime, 1);

    $(".show-articles").on("click", function() {
        $(location).attr("href", "/articles");
    });

    $(".create-article").on("click", function() {
        $(location).attr("href", "/articles/create");
    });

// ------------------------- 4. Type a 'tag' name in the 'Search by tag' form
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

    				// Send 'tag' and '_token' to app\Http\Controllers\ArticleController.php
    				$.post("/articles/tag/" + tag, {

                _token: _token,
                tag: tag

            }, function(data) {

                // Hide image on home page
                $(".home-img").fadeTo(middleTime, 0).empty();

                // If something was found
                if (data) {

                    // Append and show the found data
                    $(".content").empty().html(data);

                    $(".content").fadeTo(middleTime, 1);

                // If nothing was found
                } else {
                  $(".content").fadeTo(shortTime, 0).empty();

                  setTimeout(function(){
                      $(".content").html("<div class='count-articles'>Nothing Found</div>")
                      .fadeTo(shortTime, 1);
                  }, shortTime);
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

// ----------------------------------------------------- 6. Click and redirect
    $(document).on("click", ".click-me", function(){
        let url = $(this).data("value");
        $(location).attr("href", url);
    });

}); // end/ $(document).ready(
