
         $(window).load(function(){
           $('.flexslider').flexslider({
         	animation: "slide",
         	start: function(slider){
         	  $('body').removeClass('loading');
         	}
           });
         });

         $(window).load(function () {
            document.getElementById("s1").style.display = "block";
                $("#s1").endlessScroll({ 
            width: '100%', 
            height: '202px', 
            steps: -2,
            speed: 40, 
            mousestop: true });
            });

            