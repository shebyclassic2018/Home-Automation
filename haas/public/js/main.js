$(document).ready(function () {
    var dataPoints = [];
    var chart;
    menu_button(".open-menu", ".left-menu-m", ".close-menu", "left");
    getWidthOnWindowResize();
    $(".alert-body").hide();
    OnBodyClickHide("payment-method-box", "payment-box");
    OnBodyClickHide("alert-body", "box");
    saveJSON();
    logout();
    addAppliance();
    Turn_appliance_off_on();
    TemperatureReader();
    login();
    setAppID();
    schedule();
    drawGraph(dataPoints, chart);
    GoToGraph()
    
});
function MOBILE_MEDIA() {
    $(".left-menu-m").css("transform", "translateX(-100%)");
}
function TABLET_MEDIA() {
    $(".left-menu-m").css("transform", "translateX(0)");
}
function DESKTOP_MEDIA() {
    $(".left-menu-m").css("transform", "translateX(0)");
}
function ALL_MEDIA() {}

function logout() {
    $(".logout-btn").click(function () {
        confirm("sign-out", "LOGOUT", "Do you want to logout?", "logout");
    });
}

function addAppliance() {
    $(".add-appliance-form").on("submit", function (e) {
        e.preventDefault();
        innerSpinnerLoader(".add-appliance-form #submit-button");
        try {
            $.ajax({
                url: addApplianceUrl,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (info) {
                    if (info == "Process failed") {
                        alert_error(info);
                    } else {
                        $("#add-appliance-modal").fadeOut();
                        setTimeout(() => {
                            alert_success(info);
                        }, 1000);
                        setTimeout(() => {
                            window.open("/home/appliance", "_SELF");
                        }, 5000);
                    }
                    console.log(info);
                    spinnerLoaderOut(
                        ".add-appliance-form #submit-button",
                        "Save"
                    );
                },
            });
        } catch (err) {
            alert_error(err);
        }
    });
}

function Turn_appliance_off_on() {
    $(".appliance-page .sw-btn").click(function () {
        var data = $(this).val().split("<!>");
        var switch_number = data[0];
        var app_name = data[1];
        var state;
        if (this.checked) state = 1;
        else state = 0;

        $.post(
            turn_appliance_off_on_url,
            {
                _token: _token,
                switch_number: switch_number,
                state: state,
                app_name: app_name,
            },
            function (info) {
                alert_success(info);
            }
        );
    });
}

function TemperatureReader() {
    var refresh = setInterval(() => {
        $.get(temp_data_url, function (temp) {
            $("#temperature-reader").text(temp);
        });
    }, 5000);
}

function ajax(
    url,
    data,
    method = "POST",
    ctype = false,
    cache = false,
    pdata = false
) {
    $.ajax({
        url: url,
        type: method,
        data: data,
        contentType: ctype,
        cache: cache,
        processData: pdata,
        success: function (info) {
            return info;
        },
    });
}

function login() {
    $(".login-form").on("submit", function (e) {
        e.preventDefault();
        try {
            innerSpinnerLoader(".login-form #login-btn");
            $.ajax({
                url: loginUrl,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (info) {
                    if (info == "user_not_found") {
                        alert_error("Either email or password is incorrect");
                        spinnerLoaderOut(".login-form #login-btn", "Sign In");
                    } else {
                        setTimeout(() => {
                            alert_success(
                                "Welcome &nbsp;<b>" + info + "</b>&nbsp;to HAAS"
                            );
                            spinnerLoaderOut(
                                ".login-form #login-btn",
                                "Sign In"
                            );
                            $(".login-form")[0].reset();
                        }, 1000);
                        setTimeout(() => {
                            window.open("/home/appliance", "_SELF");
                        }, 3000);
                    }
                    console.log(info);
                },
            });
        } catch (err) {
            spinnerLoaderOut(".login-form #login-btn", "Sign In");
            console.log(err);
        }
    });
}

function setAppID() {
    $(".delete-appliance").click(function () {
        var app_id = $(this).val();
        $("#app_id").val(app_id);
    });
}

function schedule() {
    $(".sync").click(function () {
        var app_id = $(this).val();
        var state;
        if (this.checked) {
            state = 1;
        } else {
            state = 0;
        }

        try {
            $.post(
                validateScheduleUrl,
                {
                    _token: _token,
                    app_id: app_id,
                    state: state,
                },
                (info) => {
                    alert_success(info);
                }
            );
        } catch (err) {
            console.log(err);
        }
    });
    $(".start").focus(function () {
        var app_id = $(this).attr("name");
        $(this).focusout(function () {
            var startTime = $(this).val();
            var startTimeLength = startTime.length;

            if (startTimeLength == 4) {
                var hours = Math.floor(startTime / 100);
                var minutes = startTime % 100;

                if (hours < 10) {
                    hours = "0" + hours;
                }

                if (minutes < 10) {
                    minutes = "0" + minutes;
                }

                if (
                    hours >= 0 &&
                    hours <= 23 &&
                    minutes >= 0 &&
                    minutes <= 59
                ) {
                    try {
                        $.post(
                            insertScheduleUrl,
                            {
                                _token: _token,
                                hours: hours,
                                minutes: minutes,
                                app_id: app_id,
                                period: "start",
                            },
                            function (info) {
                                alert_success(info);
                            }
                        );
                    } catch (err) {
                        console.log(err);
                    }
                } else {
                    alert_error("invalid Time, vaild 00:00 - 23:59");
                }
            }
        });
    });

    $(".end").focus(function () {
        var app_id = $(this).attr("name");
        $(this).focusout(function () {
            var endTime = $(this).val();
            var endTimeLength = endTime.length;

            if (endTimeLength == 4) {
                var ehr = Math.floor(endTime / 100);
                var emin = endTime % 100;

                if (ehr < 10) {
                    ehr = "0" + ehr;
                }

                if (emin < 10) {
                    emin = "0" + emin;
                }

                if (ehr >= 0 && ehr <= 23 && emin >= 0 && emin <= 59) {
                    try {
                        $.post(
                            insertScheduleUrl,
                            {
                                _token: _token,
                                ehr: ehr,
                                emin: emin,
                                app_id: app_id,
                                period: "end",
                            },
                            function (info) {
                                alert_success(info);
                            }
                        );
                    } catch (err) {
                        console.log(err);
                    }
                } else {
                    alert_error("invalid Time, vaild 00:00 - 23:59");
                }
            }
        });
    });
}

function saveJSON() {
    $(".sw-btn").click(function () {
        var data = $(this).val().split("<!>");
        var switch_number = data[0];
        var app_name = data[1];
        var time = 1;
        var date = new Date();
        var today =
            date.getDate() +
            "-" +
            (date.getMonth() + 1) +
            "-" +
            date.getFullYear();
        var checked = this.checked;

        var refresh = setInterval(function () {
            if (checked) {
                var eventloaded = {
                    id: switch_number,
                    appname: app_name,
                    date: today,
                    time: time,
                };

                try {
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        async: false,
                        url: savejsonUrl,
                        data: { data: JSON.stringify(eventloaded) },
                        success: function (ef) {
                            alert(ef);
                        },
                        failure: function (e) {
                            alert_error("failure");
                        },
                    });
                } catch (err) {
                    alert_error(err);
                }
            } else {
                window.open("/", "_SELF");
            }
        }, 1000);
    });
}



function drawGraph(dataPoints, chart) {
    
    var app_name = "";
    $.getJSON(getjsonUrl, function (data) {
        $.each(data, function (key, value) {
            app_name = value.appname
            dataPoints.push({
                y: value.y,
                label: value.x
            });
        });

        CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#0066be"                
                ]);

        chart = new CanvasJS.Chart("chartContainer", {
            theme: "light1",
            // colorSet: "greenShades",
            animationEnabled: true,
            exportEnabled: true,
            axisY: {
                title: "Time (Seconds)",
                minimum: 0
            },
            axisX: {
                title: "Date",
            },
            title: {
                fontSize: 36,
                text: app_name + " Graph",
            },
            dataPointMaxWidth: 128,
            data: [
                {
                    indexLabelFontWeight: "bold",
                    dataPoints: dataPoints,
                },
            ],
        });
        chart.render();

        // updateChart(dataPoints, chart, app_id);
    });
}

function updateChart(dataPoints, chart, app_id) {
    dataPoints.splice(0, dataPoints.length);
        $.getJSON(getjsonUrl, function (data) {
            $.each(data, function (key, value) {
                dataPoints.push({
                    label: value.x,
                    y: value.y,
                });
            });
            chart.render();
            setTimeout(function () {
                updateChart();
            }, 1000);
        });
}

function GoToGraph() {
    $(".graph-btn").click(function () {
        var app_id = $(this).val();
        $.post(setAppIDUri, {
            '_token': _token,
            app_id: app_id
        }, () =>  {
            window.open('/home/chart', '_SELF');
        })
    });
}