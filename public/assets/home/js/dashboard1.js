 $(document).ready(function () {
     "use strict";
     // toat popup js
//      $.toast({ 
//   text : "<font size='4'> Loading Data...</font>", 
//   showHideTransition : 'slide',  // It can be plain, fade or slide
//   bgColor : 'white',              // Background color for toast
//   textColor : 'black',            // text color
//   allowToastClose : false,       // Show the close button or not
//   hideAfter : 2000,              // `false` to make it sticky or time in miliseconds to hide after
//   stack : false,                     // `false` to show one stack at a time count showing the number of toasts that can be shown at once
//   textAlign : 'left',            // Alignment of text i.e. left, right, center
//   position : 'mid-center'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
// })





     var sparklineLogin = function () {
         $('#sparklinedash').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
             type: 'bar',
             height: '30',
             barWidth: '4',
             resize: true,
             barSpacing: '5',
             barColor: '#7ace4c'
         });
         $('#sparklinedash2').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
             type: 'bar',
             height: '30',
             barWidth: '4',
             resize: true,
             barSpacing: '5',
             barColor: '#7460ee'
         });
         $('#sparklinedash3').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
             type: 'bar',
             height: '30',
             barWidth: '4',
             resize: true,
             barSpacing: '5',
             barColor: '#11a0f8'
         });
         $('#sparklinedash4').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
             type: 'bar',
             height: '30',
             barWidth: '4',
             resize: true,
             barSpacing: '5',
             barColor: '#f33155'
         });
     }
     var sparkResize;
     $(window).on("resize", function (e) {
         clearTimeout(sparkResize);
         sparkResize = setTimeout(sparklineLogin, 500);
     });
     sparklineLogin();
 });
