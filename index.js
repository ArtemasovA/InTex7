$(document).ready(function () {
    $('.nurses').change(function () {
        HandleOnChangeNurses();
    });

    $('.departments').change(function () {
        HandleOnChangeDepartment();
    });

    $('.shifts').change(function () {
        HandleOnChangeShift();
    });
    
    function HandleOnChangeNurses() {
        var selectVal = $('select.nurses').val();

        if (!selectVal || selectVal === "")
            return;

        $.ajax({
            url: "getWardsByUser.php",
            method: "GET",
            data: {
                "nurses": selectVal,
            }
        })
            .done(function (response) {
                $(".result-nurses").empty();
                $(".result-nurses").append(response);
            });
    }

    function HandleOnChangeDepartment() {
        var selectVal = $('select.departments').val();

        if (!selectVal || selectVal === "")
            return;

        $.ajax({
            url: "getNursesByDepartment.php",
            method: "GET",
            data: {
                "departments": selectVal,
            }
        })
        .done(function (response) {
            $(".result-departments").empty();

            for (let item of response.getElementsByTagName("item")) {
                let name = item.getElementsByTagName("name")[0];
                $('.result-departments').append("<span>" + name.textContent + "</span>");
            }
        });
    }

    function HandleOnChangeShift() {
        var selectVal = $('select.shifts').val();

        if (!selectVal || selectVal === "")
            return;

        $.ajax({
            url: "getDutyByShift.php",
            method: "GET",
            data: {
                "shifts": selectVal,
            }
        })
            .done(function (response) {
                $(".result-shifts").empty();

                response.forEach(function (item) {
                    $('.result-shifts').append("<span>" + item.nurseName + " - " + item.name + "</span>")
                })
            });
    }
});

