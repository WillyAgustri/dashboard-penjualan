$(document).ready(function () {
    $(".register").hide();
    $(".side-right-login").show();
});

$(".btn-register").on("click", function (data) {
    $(".register").show();
    $(".side-right-login").hide();
    return data;
});

// $(".btn-back").on("click", function () {
//     $(".side-right-register").removeClass("actives");
//     $("#side-right-login").addClass("actives");
// });
