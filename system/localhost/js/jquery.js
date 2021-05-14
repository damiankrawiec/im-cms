//Class
let $run = new runAnimate(0, 250);

$(function() {

    $('.navbar').click(function () {

        //Object
        //console.log(runAnimate.animate('.navbar'));

        console.log($run.animate('.navbar'));

    });

});