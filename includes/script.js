// <!-- jQuery code -->
// <!-- create task sidbar function -->

    $(document).ready(function(){
        $("#create_task").click(function(event){
            event.preventDefault(event);
            $("#right_sidebar").load("create_task.php"); 
        })
        });
// <!-- manage task sidebar function -->

    $(document).ready(function(){
        $("#manage_task").click(function(event){
            event.preventDefault(event);
            $("#right_sidebar").load("manage_task.php"); 
        })
        });


//  /* Leave application sidebar function */

    $(document).ready(function(){
        $("#leave_application").click(function(event){
            event.preventDefault(event);
            $("#right_sidebar").load("leave_application.php"); 
        })
        });
