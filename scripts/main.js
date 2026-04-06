function RNG(min, max) {
    return Math.random() * (max - min) + min;
}

jQuery(function ($) {
    BG()
    let controller = new AbortController();
    let { signal } = controller;
    let searchTimeout;
    //drop menue code
    function killsubnavbar() {
        $(".subnavbar").slideUp();
        $(".subnavbar").children().remove();
        $(".menu-item[selected]").removeAttr("selected")

    }
    function revivesubnavbar(that) {
        if (!$(that)[0].hasAttribute("selected")) {
            let sub = $(that).children(".sub-menu");
            killsubnavbar()
            $(".subnavbar")[0].innerHTML += sub[0].outerHTML;
            $(that).attr("selected", "true");
            $(".subnavbar").children().show()
            $(".subnavbar").slideDown();
        } else if (window.matchMedia("(hover: none)").matches) {
            killsubnavbar();
        }
    }
    if (window.matchMedia("(any-hover: hover)").matches) {
        $(".menu-item:has(.sub-menu)").on("mouseenter", function () { revivesubnavbar(this) })
        $(".subnavbar").on("mouseleave", function () { killsubnavbar() })
    } else {
        $(".menu-item:has(.sub-menu)").append("<button name='expand'></button>");
        $("button[name='expand']").on("click", function () {
            let that = $(this).parent();
            revivesubnavbar(that);
        })
    }

    //Home button for 404.php
    $(".GO_HOME").on("click", function () {
        let link = $("button").attr("href");
        console.log("KEK" + link);
        window.location.href = link;
    });
    //RNG BG star
    function BG() {
        $(".BG").remove()
        let svg = document.createElement("svg");
        svg.classList = "BG";
        let h = $("html").height();
        let w = $("html").width();
        svg.setAttribute("height", h); svg.setAttribute("width", w)
        if (!$("body").hasClass("error")) {
            for (i = 0; i < w; i++) {

        if(i>800){//hardlimit in case of HIGH res device
          break;
        }

                let cx = RNG(0, w);
                let cy = RNG(0, h);
                let r = RNG(1, 2);
                let op = RNG(0.1, 0.8);
                let circle = document.createElement("circle");
                circle.setAttribute("r", r + 1);
                circle.setAttribute("fill", "whitesmoke");
                circle.setAttribute("opacity", op);
                circle.setAttribute("filter", "blur(4px)");
                circle.setAttribute("cx", cx);
                circle.setAttribute("cy", cy);
                let circle2 = document.createElement("circle");
                circle2.setAttribute("r", r);
                circle2.setAttribute("fill", "yellow");
                circle2.setAttribute("opacity", "0.3");
                circle2.setAttribute("filter", "blur(1px)");
                circle2.setAttribute("cx", cx);
                circle2.setAttribute("cy", cy);
                svg.append(circle2);
                svg.append(circle);
      }
        } else {
            svg.setAttribute("viewbox", "0 0 100 100");
            svg.setAttribute("preserveAspectRatio","xMinYMin meet")
            svg.innerHTML += `<circle class="SUN" fill="#ffff00" cx="30" cy="30" r="30"/>`;
            svg.innerHTML += `<circle class="SUN" cx="30" cy="30" r="20" fill="#ffc300"/>`;
            svg.innerHTML += `<text x=15 y="35" fill="#ff7700">404</text>`;
            //svg.innerHTML+=`<circle class="cloud" fill="#c4ccff"  />`
        }
        $("body").prepend(svg.outerHTML);
    }
    let rerenderT;//sadly have to rerender Background :( tho not every frame of resize event but still no good
    $(window).on("resize", function () {
        clearTimeout(rerenderT);
        rerenderT = setTimeout(BG(), 2000);
    })
    try {
    let Loading=false;
        
        let viewbox = new IntersectionObserver((entries) => {
            if (entries[0].intersectionRatio > 0.5 && !Loading) {
                let offset = $(".result").children().length;
                Loading=true
                $.post({
                  url:myajaxery.url, 
                  data:{
                    action: "search",
                    offset: offset,
                    search: $("input[name='search']").val(),
                    quantity: 10
                }, 
                success:function (res) {
                    if (res != "") {
                        if (res != "END") {
                            $(".result").append(res);
                            viewbox.unobserve(entries[0].target)
                            viewbox.observe($(observerSelector)[0])
                            $(".result").attr("num", $(".result").children().length);
                        } else { viewbox.unobserve(entries[0].target) }
    
                    }
                Loading=false;
                },
                error: function() { Loading = false; },
                xhr:function(){
                  let xhr = new window.XMLHttpRequest();
                  signal.addEventListener('abort',()=>xhr.abort())
                  return xhr;
                }
                })
            }
        })
        let observerSelector=".result>:last-child:not(.unfound)"
        $("input[name='search']").on("input", function () {
        Loading=true;
        controller.abort()
        controller = new AbortController();
        signal = controller.signal;
        let searchSTR=$(this).val();
        clearTimeout(searchTimeout)
        searchTimeout=setTimeout(function(){
            $.post(
          {
            url:myajaxery.url, 
            data:{
                action: "search",
                offset: 0,
                search: searchSTR,
                quantity: 10
            },
            success: function (res) {
                if (res == "") {
                    res = `<div class="unfound">
                            <h1>NO POSTS FOUND</h1>
                            </div>`} else {}
              $(".result>*").remove();
              $(".result").append(res);
              viewbox.observe($(observerSelector)[0])
              setTimeout(()=>{Loading=false},100);
                
            },
            error: function() { Loading = false; },
            xhr:function(){
              let xhr = new window.XMLHttpRequest();
              signal.addEventListener('abort',()=>xhr.abort())
              return xhr;
            }
        })
        },400)
        })
        let last = $(observerSelector); if(last.length) viewbox.observe($(observerSelector)[0]);
        } catch (e) { }
});
