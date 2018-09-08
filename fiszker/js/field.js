$(document).ready(function() {

    let keyy = 0;
    $(document).keydown(function(key) {
        let keyCode = key.keyCode;
        keyy = keyy + keyCode;

        // F2
        if (keyy==113) {
            location.href="tools";
            event.preventDefault();
        }

        else {
            keyy=0;
        }
    })

    // ScrollReveal settings
    window.sr = ScrollReveal();
        sr.reveal(".scroll_animate_text", {
            delay: 150,
            reset: true,
        });

        sr.reveal("#fields", {
            delay: 300,
            reset: false,
        });

        sr.reveal(".scroll_animate_fields", {
            delay: 200,
        });

    jQuery(function($)
    {
        $.scrollTo(0);

        $(".text").click(function() { $.scrollTo($("#red-line"), 500); });
    });

    $("#info").click(function(event) {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=inf";
        }
    })

    $('#med').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=med";
        }
    })

    $('#bio').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=bio";
        }
    })

    $('#chem').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=che";
        }
    })

    $('#psych').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=psy";
        }
    })

    $('#fiz').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=fiz";
        }
    })

    $('#fil').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=fil";
        }
    })

    $('#pol').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=pol";
        }
    })

    $('#ang').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=ang";
        }
    })

    $('#latin').click(function() {
        if (event.target.nodeName=="A" || event.target.nodeName=="DIV")
        {
            location.href="cate?field=lat";
        }
    })

});
