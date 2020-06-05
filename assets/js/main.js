$(document).ready(function () {

    $(".sepetEkleBtn").click(function () {

        var url = "http://localhost/sepet/lib/sepet_db.php";
        var data = {
            p : "sepeteEkle",
            urun_id : $(this).attr("urun_id")
        }

        $.post(url, data, function (response) {
            $(".badge-font").text(response);
        })

    })

    $(".sepettenCikar").click(function () {

        var url = "http://localhost/sepet/lib/sepet_db.php";
        var data = {
            p : "sepettenCikar",
            urun_id : $(this).attr("urun_id")
        }

        $.post(url, data, function (response) {
            window.location.reload();
        })

    })

});

