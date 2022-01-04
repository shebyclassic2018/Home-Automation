$(document) . ready (function() {
    menu_button('.open-menu', '.left-menu-m', '.close-menu','left')
    getWidthOnWindowResize()
    $('.alert-body').hide();
    subscribe();
    OnBodyClickHide('payment-method-box', 'payment-box')
    OnBodyClickHide('alert-body', 'box')
    
    logout();
    schedule();
    addAppliance()
    synchronization()
    Turn_appliance_off_on()
})
function MOBILE_MEDIA() {
    $('.left-menu-m').css('transform', 'translateX(-100%)')
}
function TABLET_MEDIA() {
    $('.left-menu-m').css('transform', 'translateX(0)')
}
function DESKTOP_MEDIA() {
    $('.left-menu-m').css('transform', 'translateX(0)')
}
function ALL_MEDIA(){}

function logout(){
    $('.logout-btn').click(function() {
        confirm('sign-out', 'LOGOUT', 'Do you want to logout?', 'logout');
    })
}

function subscribe() {
    $('.subscribe .card button') . click (function () {
        var amount = $(this).val();
        // Paypal_Gateway('#paypal-button', amount, paypal);
        visibleFadeIn('.payment-method-box')
    });
}

function schedule() {
    var e = OnBodyClickHide('schedule-body', 'schedule-box');
    var syncBTN = $('.sync');
    $('.sync').click(function() {
        if(this.checked) {
            var schedule_id = $(this).val();
            $('#sch-id').val(schedule_id);
            visibleFadeIn('.schedule-body');
            $('.schedule-body').click(function() {
                if(e) {
                    $('.sync').attr('checked', false);
                }
                $('.sync').attr('checked', false);
            })
        }
    })

    $("#sch-form").on('submit', function(e) {
        e.preventDefault();
        alert($('#sch-id').val());
        innerSpinnerLoader('#sch-form button');
        $.ajax({
            url: insertScheduleUrl,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(info) {
                if(info == 'Process failed'){
                    alert_error(info)
                }else{
                    alert_success(info)
                }
                console.log(info)
                spinnerLoaderOut('#sch-form button', 'Save');
            }
        })
    })
}

function addAppliance() {
    $('.add-appliance-form').on("submit", function(e) {
        e.preventDefault();
        innerSpinnerLoader('.add-appliance-form button');
        try {
            $.ajax({
                url: addApplianceUrl,
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(info) {
                    if(info == 'Process failed'){
                        alert_error(info)
                    }else{
                        alert_success(info)
                        setTimeout(() => {
                            window.open("/setting/setting","_SELF");
                        }, 5000);
                    }
                    console.log(info)
                    spinnerLoaderOut('.add-appliance-form button', 'Save');
                }
            })
        }catch(err) {
            alert_error(err);
        }
    });
}

function applianceTableJSON() {
    $.ajax({
        dataType: "json",
        url: applianceTableJSONUrl,
        type: 'GET',
        data: {
            '_token': _token
        },
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if(data.length > 0) {
                var table = '<div class="row bold bg-blue pad-tb-15 txt-fff appliance">';
                table += '<div class="pad-lr-15">S/N</div>';
                table += '<div class="flex-1">Appliance name</div>';
                table += '<div class="flex-1 align-center">Switch Number</div>';
                table += '<div class="flex-1 flex-center">Sync</div>';
                table += '<div class="flex-1 flex-center">Disable/Enable</div>';
                table += '</div>';
            var sn = 1;
            for(var i = 0; i < data.length; i++) {
                table += "<div class='row stripe'>";
                    if(i < 9) 
                        table += "<div class='pad-lr-15'>&nbsp;&nbsp;" + sn++ +"</div>";
                    else
                    table += "<div class='pad-lr-15'>" + sn++ +"</div>";

                    table += "<div class='flex-1 padl-10'>" + data[i].app_name + "</div>";
                    table += "<div class='flex-1 flex-center'>" + data[i].switch_no + "</div>";
                
                    table += "<div class='flex-1 flex-center'>";
                    if(data[i].sync == 1)
                        table += "<input type='checkbox' value=" + data[i].schedule_id + " name='schedule_id'  class='sw-btn sync pointer' id='' checked>";
                    else
                        table += "<input type='checkbox' value=" + data[i].schedule_id + " name='schedule_id'  class='sw-btn sync pointer' id=''>"
                    table += "</div>";

                    table += "<div class='flex-1 flex-center'>";
                    if(data[i].access == 1)
                        table += "<input type='checkbox' value=" + data[i].switch_no + " name='access'  class='sw-btn permit pointer' id='' checked>";
                    else
                        table += "<input type='checkbox' value=" + data[i].switch_no + " name='access'  class='sw-btn permit pointer' id=''>";
                    table += "</div>";
                table += "</div>";
                }
            } else {
                table += '<div class="flex-center"><h4>Home is empty, Please add your preferrable appliances</h4></div>';
            }
            $('.applianceSettingTable').html(table);
        }
    }) 
}

function synchronization() {
    var syncBTN = $('.sync');
    $('div').on('click', '.sync', function() {
        if(this.checked) {
            var schedule_id = $(this).val();
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: getScheduleUrl,
                data: {
                    '_token': _token,
                    schedule_id: schedule_id
                }
            }) . done (function (data) {
                for(var i = 0; i < data.length; i++) {
                    $('#starting') . val(data[i].starting)
                    $('#ending') . val(data[i].end)
                }
            })
        }
    })
}

function Turn_appliance_off_on() {
    $(".appliance-page .sw-btn") . click(function() {
        var data = $(this).val().split('<!>');
        var switch_number = data[0];
        var app_name = data[1]
        var state;
        if(this.checked)
            state = 1
        else
            state = 0

        $.post(turn_appliance_off_on_url,{
            '_token': _token,
            switch_number: switch_number,
            state: state,
            app_name: app_name
        }, function(info) {
            alert_success(info)
        });
    })
}
