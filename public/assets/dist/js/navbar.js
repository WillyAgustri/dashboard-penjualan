function test() {
    var activeClass = localStorage.getItem("activeClass");
    if (activeClass) {
        console.log(activeClass);
        // Jika ada, tambahkan kelas aktif pada elemen yang sesuai
        $("." + activeClass).addClass("active");

        $("#navbarSupportedContent").on("click", "li", function (e) {
            $("#navbarSupportedContent ul li").removeClass("active");
            var activeClass = $(this).attr("class");
            localStorage.setItem("activeClass", activeClass);
            $(this).addClass("active");

            var activeWidthNewAnimHeight = $(this).innerHeight();
            var activeWidthNewAnimWidth = $(this).innerWidth();
            var itemPosNewAnimTop = $(this).position();
            var itemPosNewAnimLeft = $(this).position();
            $(".hori-selector").css({
                top: itemPosNewAnimTop.top + "px",
                left: itemPosNewAnimLeft.left + "px",
                height: activeWidthNewAnimHeight + "px",
                width: activeWidthNewAnimWidth + "px",
            });
        });
    } else {
        $(".nav-item-home").addClass("active");
    }

    var tabsNewAnim = $("#navbarSupportedContent");
    var activeItemNewAnim = tabsNewAnim.find(".active");
    var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
    var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
    var itemPosNewAnimTop = activeItemNewAnim.position();
    var itemPosNewAnimLeft = activeItemNewAnim.position();
    $(".hori-selector").css({
        top: itemPosNewAnimTop.top + "px",
        left: itemPosNewAnimLeft.left + "px",
        height: activeWidthNewAnimHeight + "px",
        width: activeWidthNewAnimWidth + "px",
    });

    $("#navbarSupportedContent").on("click", "li", function (e) {
        $("#navbarSupportedContent ul li").removeClass("active");
        var activeClass = $(this).attr("class");
        localStorage.setItem("activeClass", activeClass);
        $(this).addClass("active");

        var activeWidthNewAnimHeight = $(this).innerHeight();
        var activeWidthNewAnimWidth = $(this).innerWidth();
        var itemPosNewAnimTop = $(this).position();
        var itemPosNewAnimLeft = $(this).position();
        $(".hori-selector").css({
            top: itemPosNewAnimTop.top + "px",
            left: itemPosNewAnimLeft.left + "px",
            height: activeWidthNewAnimHeight + "px",
            width: activeWidthNewAnimWidth + "px",
        });
    });
}

test();

$(".navbar-toggler").click(function () {
    $(".navbar-collapse").slideToggle(300);
    setTimeout(function () {
        test();
    });
});
