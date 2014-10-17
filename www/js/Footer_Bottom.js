/**
 * Created by Іван on 29.09.14.
 */

$(function() {

    $("body").css({padding:0,margin:0});
    var f = function() {
        $(".footer").css({position:"relative"});
        var h1 = $("body").height();
        var h2 = $(window).height();
        var d = h2 - h1;
        var h = $(".footer").height() + d;
        var ruler = $("<div>").appendTo(".footer");
        h = Math.max(ruler.position().top,h);
        ruler.remove();
        $(".footer").height(h);
    };
    setInterval(f,1000);
    $(window).resize(f);
    f();

});
