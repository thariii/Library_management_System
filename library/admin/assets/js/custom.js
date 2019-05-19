
/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% Free To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */

(function ($) {
    "use strict";
    var mainApp = {
        slide_fun: function () {

            $('#carousel-example').carousel({
                interval:3000 // THIS TIME IS IN MILLI SECONDS
            })

        },
        dataTable_fun: function () {

            $('#dataTables-example').dataTable();

        },
       
        custom_fun:function()
        {
            /*====================================
             WRITE YOUR   SCRIPTS  BELOW
            ======================================*/
		feunction getDate(){
		 var today = new Date();
		 
		 document.getElementById("date").value=today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
		 
		}


        },

    }
   
   
    $(document).ready(function () {
        mainApp.slide_fun();
        mainApp.dataTable_fun();
        mainApp.custom_fun();
    });
}(jQuery));


