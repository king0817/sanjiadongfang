var swiper = new Swiper('.swiper-container', {
    pagination: {
        el: '.swiper-pagination'
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false
    }
});
$(function () {

    var form = function () {
        var name = $("#name");
        var tel = $("#tel");
        var email = $("#email");
        var where = $("#where");
        var text = $("#text");

        $("input").focus(
            function () {
                $(this).removeClass("is-invalid")
            }
        );
        name.blur(function () {
            if (name.val() == "") {
                name.addClass("is-invalid")
            }
        });
        tel.blur(function () {
            if (tel.val().length != "11") {
                tel.addClass("is-invalid")
            }
        });
        where.blur(function () {
            if (where.val() == "") {
                where.addClass("is-invalid")
            }
        });
        $("#submit").click(function () {
            if (name.val() !== "" && tel.val().length == "11" && where.val() !== "") {
                $.post(
                    "./liuyan/doAdd.php",
                    {
                        name: name.val(),
                        tel: tel.val(),
                        email: email.val(),
                        where: where.val(),
                        text: text.val()
                    },
                    function (data) {
                        alert(data)
                    }
                )
            } else if (name.val() == "") {
                name.addClass("is-invalid")
            } else if (tel.val().length != "11") {
                tel.addClass("is-invalid")
            } else if (where.val() == "") {
                where.addClass("is-invalid")
            }
        });
        $("#reset").click(function () {
            $("input").val("")
        })
    };
    form()
});

