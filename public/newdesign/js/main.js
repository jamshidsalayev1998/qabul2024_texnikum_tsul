$(document).ready(function () {
    $("header span.left").click(function () {
        $("header div.content_bars").toggleClass("none_bars");
    });

    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });

    var readURL2 = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log('file type', input.files[0].type)
            reader.onload = function (e) {
                if (input.files[0].type == 'application/pdf') {
                    console.log( e.target.result);
                    $('.profile-pic2-pdf').attr('src', e.target.result);
                     $('.profile-pic2-pdf').css({
                        'display':'block'
                    })
                    $('.profile-pic2').css({
                        'display':'none'
                    })
                }
                if (input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/jpeg') {
                    console.log( e.target.result);
                    $('.profile-pic2-pdf').css({
                        'display':'none'
                    })
                     $('.profile-pic2').css({
                        'display':'block'
                    })
                    $('.profile-pic2').attr('src', e.target.result);

                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload2").on('change', function () {
        readURL2(this);
    });

    $(".upload-button2").on('click', function () {
        $(".file-upload2").click();
    });

    var readURL3 = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (input.files[0].type == 'application/pdf') {
                    $('.profile-pic3-pdf').attr('src', e.target.result);
                     $('.profile-pic3-pdf').css({
                        'display':'block'
                    })
                    $('.profile-pic3').css({
                        'display':'none'
                    })
                }
                if (input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/jpeg') {
                    $('.profile-pic3-pdf').css({
                        'display':'none'
                    })
                     $('.profile-pic3').css({
                        'display':'block'
                    })
                    $('.profile-pic3').attr('src', e.target.result);

                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload3").on('change', function () {
        readURL3(this);
    });

    $(".upload-button3").on('click', function () {
        $(".file-upload3").click();
    });

    var readURL4 = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (input.files[0].type == 'application/pdf') {
                    $('.profile-pic4-pdf').attr('src', e.target.result);
                     $('.profile-pic4-pdf').css({
                        'display':'block'
                    })
                    $('.profile-pic4').css({
                        'display':'none'
                    })
                }
                if (input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/jpeg') {
                    $('.profile-pic4-pdf').css({
                        'display':'none'
                    })
                     $('.profile-pic4').css({
                        'display':'block'
                    })
                    $('.profile-pic4').attr('src', e.target.result);

                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    var readURL5 = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (input.files[0].type == 'application/pdf') {
                    $('.profile-pic5-pdf').attr('src', e.target.result);
                     $('.profile-pic5-pdf').css({
                        'display':'block'
                    })
                    $('.profile-pic5').css({
                        'display':'none'
                    })
                }
                if (input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/jpeg') {
                    $('.profile-pic5-pdf').css({
                        'display':'none'
                    })
                     $('.profile-pic5').css({
                        'display':'block'
                    })
                    $('.profile-pic5').attr('src', e.target.result);

                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    var readURL6 = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (input.files[0].type == 'application/pdf') {
                    $('.profile-pic6-pdf').attr('src', e.target.result);
                     $('.profile-pic6-pdf').css({
                        'display':'block'
                    })
                    $('.profile-pic6').css({
                        'display':'none'
                    })
                }
                if (input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/jpeg') {
                    $('.profile-pic6-pdf').css({
                        'display':'none'
                    })
                     $('.profile-pic6').css({
                        'display':'block'
                    })
                    $('.profile-pic6').attr('src', e.target.result);

                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    var readURL7 = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (input.files[0].type == 'application/pdf') {
                    $('.profile-pic7-pdf').attr('src', e.target.result);
                     $('.profile-pic7-pdf').css({
                        'display':'block'
                    })
                    $('.profile-pic7').css({
                        'display':'none'
                    })
                }
                if (input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/jpeg') {
                    $('.profile-pic7-pdf').css({
                        'display':'none'
                    })
                     $('.profile-pic7').css({
                        'display':'block'
                    })
                    $('.profile-pic7').attr('src', e.target.result);

                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload4").on('change', function () {
        readURL4(this);
    });
    $(".file-upload5").on('change', function () {
        readURL5(this);
    });
    $(".file-upload6").on('change', function () {
        readURL6(this);
    });
    $(".file-upload7").on('change', function () {
        readURL7(this);
    });

    $(".upload-button4").on('click', function () {
        $(".file-upload4").click();
    });
    $(".upload-button5").on('click', function () {
        $(".file-upload5").click();
    });
    $(".upload-button6").on('click', function () {
        $(".file-upload6").click();
    });
    $(".upload-button7").on('click', function () {
        $(".file-upload7").click();
    });
});

$("#dd span").change(function (e) {
    console.log("dropdown change event is fire : " + $(this).text());
});
$("#de span").change(function (e) {
    console.log("dropdown change event is fire : " + $(this).text());
});
var asd = $(".iii");
(function ($) {
    $.fn.dropdown = function () {
        var el = $(this);
        el.addClass("dropdown");
        var holder = $("span.holder", el);
        var opts_con = $("ul", el);

        var opts = $("ul li", el);
        var val = "";
        opts_con.prepend("<span class='arrow_up'></span>");

        el.on("click", function () {
            opts_con.toggleClass("active");
            asd.toggleClass("rot");

        });

        opts.on("click", function () {
            holder.text($(this).text());
            holder.change();
        });
    }

}(jQuery));
$("#dd").dropdown();



