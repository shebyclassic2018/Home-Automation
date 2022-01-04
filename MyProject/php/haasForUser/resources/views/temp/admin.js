$(document).ready(Main);
function Main(){getWidthOnWindowResize()}

//VARIABLE DECLARATIONS
var threads = $('.threads');
var chatBody = $('.chat-body');
function ajaxFileStream() {
    var url = pdf;
    var oReq = new XMLHttpRequest();
    oReq.open("GET", url, true);
    oReq.responseType = "arraybuffer";

    oReq.onload = function (oEvent) {
        console.log(oReq.response);
        var blob = new Blob([oReq.response], { type: "application/pdf" });
        var win = window.open('', '_blank');
        var URL = window.URL || window.webkitURL;
        var dataUrl = URL.createObjectURL(blob);
        win.location = dataUrl;
    };
    oReq.send();
}

function ALL_MEDIA(){
    //Message_Navigation();
    active()
    var isClickedDownload = false;
    var isClickedPrint = false;
    download_pdf()
    dropdown(isClickedDownload,isClickedPrint);
    updateCustomerStatus()
    Datatable()
    message_loader();
    outgoing_messages()
    preview('.register-customer-content #file');
    preview('#post-file');
    Close_Preview();
    Logout()
    Message_Checkbox();
    $( "#fb_button" ).click(function() {
        fbShare('https://google.com', 'A title', 'A discription');
    });
    Close_Confirm_Box('logout-cancel', 'logout-content');
    Menu_Navigation();
    Share_Post();
    Float_Button();
    LeftSideBarNavigation();
}

function MOBILE_MEDIA(){
    MobileTablet_Message_Navigation();
    Close_Menus();
    show('ls-text');
    $('.left-side-bar').css({
        'width':'200px'
    });
}

function TABLET_MEDIA(){
    MobileTablet_Message_Navigation();
    Show_Menus();
    hide('ls-text');
    $('.close').css({
        'visibility': 'hidden'
    });
    $('.left-side-bar').css({
        'width':'50px'
    });
    $('.message-list-content').css({
        'display' : 'block'
    });
    threads.css('width','100%');
}

function DESKTOP_MEDIA(){
    Desktop_Message_Navigation();
    show('ls-text');
    Show_Menus();
    $('.close').css({
        'visibility': 'hidden'
    });
    $('.left-side-bar').css({
        'width':'200px'
    });
    
    $('.message-list-content').css({
        'display' : 'flex'
    });
    chatBody.css({
        'transform' : 'translateX(0)',
        'visibility' : 'visible'
    })
    threads.css('width','380px').show();
}

function active(){
    $(document).on('click','.left-side-btn',function(){
        $(this).addClass('active').siblings().removeClass('active')
    })
}

function dropdown(isClickedDownload,isClickedPrint){
    $('.download-btn').click(function(){
        if(!isClickedDownload){
            $('.download-dropdown').css('visibility','visible')
            $('.print-dropdown').css('visibility','hidden')
            isClickedDownload = true;
            isClickedPrint = false;    
        }else{
            $('.download-dropdown').css('visibility','hidden')
            isClickedDownload = false;
            
        }
    })

    $('.print-btn').click(function(){
        if(!isClickedPrint){
            $('.print-dropdown').css('visibility','visible')
            $('.download-dropdown').css('visibility','hidden')
            isClickedPrint = true;
            isClickedDownload = false;
        }else{
            $('.print-dropdown').css('visibility','hidden')
            $('.download-dropdown').css('left','0px')
            isClickedPrint = false;
        }
    })
    $("#download_current_page").click(function(){
         $('.download-dropdown').css('visibility','hidden')
         isClickedDownload = false;
    })
    $("#download_all_pages").click(function(){
         $('.download-dropdown').css('visibility','hidden')
         isClickedDownload = false;
    })

    $("#print_current_page").click(function(){
         $('.print-dropdown').css('visibility','hidden')
         isClickedPrint = false;
    })
    $("#print_all_pages").click(function(){
         $('.print-dropdown').css('visibility','hidden')
         isClickedPrint = false;
    })

}

function download_pdf(){
    
    $("#download_current_page").click(function(){
        var current_class = $("#range").val();
        current_class = current_class + ",DC"
        window.open("/pdf/" + current_class,"_SELF")
         
    })
    $("#download_all_pages").click(function(){
        var current_class = $("#range").val();
        current_class = current_class + ",DA"
        window.open("/pdf/" + current_class,"_SELF")
    })
    print_pdf();
}

function print_pdf(){
    $("#print_current_page").click(function(){
        var current_class = $("#range").val();
        current_class += ",PC"
        window.open("/pdf/" + current_class,"_blank")
    })
    $("#print_all_pages").click(function(){
        var current_class = $("#range").val();
        current_class +=  ",PA"
        window.open("/pdf/" + current_class,"_blank")
    })
}

function message_loader(){
    var refresh = setInterval(function(){
        $.get(conversation_url, function(sms_details){
            $("#conversation").html(sms_details)
            // $('#conversation input[type=checkbox]').hide();
        })
    }, 1000);   
}

function show_loader(){
    $(".loader").css("visibility","visible");
}
function close_loader(){
    $(".loader").css("visibility","hidden");
}

function customer_loader_view(limit){
    show_loader()
    $.get(viewlist + '/' + limit, function(details){
        $("#view-datatable").html(details)
        close_loader();
    })


}

function customer_loader_action(limit){
    show_loader()
    $.get(customer_list + '/' + limit, function(details){
        $("#datatable").html(details)
        close_loader();
    })
    
    $("div").on("click",".action-btn",function(){
        show_loader();
        var value = $(this).val();
        data = value.split(',');
        var id = data[0];
        var status = data[1];
        $("#customer_id").val(id);
        $("#new-status").val(status);
        var img = document.getElementById('passport')
        $.get(customer_details + '/' + id,function(details){
            close_loader();
            var data = details.split(',');
            var fullname = data[0];
            var email = data[1];
            var phone = data[2];
            var location = data[3];
            var passport = data[4];
            var status = data[5];
            if(status == 'activated')
                $('#permit-btn').html("<button class='danger-alert'><span class='fa fa-key'></span> Deactivate</button>");
            else
                $('#permit-btn').html("<button class='primary-alert'><span class='fa fa-key'></span> Activate</button>");

            $('#fullname').text(fullname);
            $('#email').text(email)
            $('#phone').text(phone)
            $('#location').text(location)
            $('#status').text(status)
            $("#passport").attr("src", "image/uploads/customerpassport/" + passport)
            open_modal('.modal');
            $(this).unbind('click');
        })
    })

    $('.close-mark').click(function(){
        close_modal('.modal');
        $(".modal-form")[0].reset();
    })
}

function open_modal(className){
    $(className).css("visibility","visible");
}
function close_modal(className){
    $(className).css("visibility","hidden");
}

function Datatable(){
    var limit = $("#record-limit").val() + ",0"
    $("#range").val(limit)
    customer_loader_action(limit);
    customer_loader_view(limit)
    $("#record-limit").change(function(){
        limit = $(this).val()  + ",0";
        $("#range").val(limit)
        customer_loader_action(limit);
        customer_loader_view(limit)
    })
    
    $("div").on("click",".dock",function(){
        var limit = $(this).val();
        $("#range").val(limit)
        customer_loader_action(limit);
        customer_loader_view(limit)
    })

    // show previous class
    $("div").on("click",".previous-class",function(){
        var current_class = $("#range").val();
        var data = current_class.split(',');
        var upper = data[0]
        var lower = data[1]
        var class_size = upper - lower
        if(lower != 0){
            var last_upper = upper - class_size
            var last_lower = lower - class_size
        }
        var previous_class = last_upper + "," + last_lower
        $("#range").val(previous_class);
        customer_loader_action(previous_class);
        customer_loader_view(previous_class)
    })

    // show next class
    $("div").on("click",".next-class",function(){
        var current_class = $("#range").val();
        var data = current_class.split(',');
        var upper = data[0]
        var lower = data[1]
        var class_size = upper - lower
        if(upper <= 30){
            var next_upper = upper + class_size
            var next_lower = lower + class_size
        }
        var next_class = next_upper + "," + next_lower
        $("#range").val(next_class);
        customer_loader_action(next_class);
        customer_loader_view(next_class)
    })
}

function updateCustomerStatus(){
    $('.updatecustomerstatusForm').on("submit", function(e){
        e.preventDefault()
        var limit = $("#range").val()
        $.ajax({
            url: updatecustomerstatus,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(info){
                if(info){
                    $.message.success({
                        message: "Updated successfully",
                        duration: 5000
                    })
                    close_modal('.modal')
                    customer_loader_action(limit);
                }else{
                    $.message.error({
                        message: "Process failed",
                        duration: 5000
                    })
                }
            }
        })
    })
} 


function outgoing_messages(){
    $('.text-editor').on("submit", function(e){
        e.preventDefault()
        
        $.ajax({
            url: message_url,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(info){
                if(info){
                    $.message.success({
                        message: "Message sent",
                        duration: 5000
                    })
                    scrollToBottomAnimate('.chat-box',1000)
                }else{
                    $.message.error({
                        message: "Message failed",
                        duration: 5000
                    })
                }
            }
        })
    })
}

function Close_Preview(){
    $('.img-closer').click(function(){
        visibility('.image-preview','hidden');
    })
}

function preview(AttrName){
    visibility('.file-details','hidden');
    $(AttrName).change(function(e){
        var filename = e.target.files[0].name;
        var filesize = e.target.files[0].size;
        var filetype = e.target.files[0].type;
        var ext = filename.substring(filename.lastIndexOf('.') + 1);
        
        filesize = filesize / (1024 * 1024);
        var size = filesize;
        if(filesize < 1){
            filesize = filesize * 1024;
            filesize = filesize.toFixed(2) + " KB";
        }else{
            filesize = filesize.toFixed(2) + " MB";
        }
        
        if(size <= 2 && (ext == 'jpg' || ext == 'png' || ext == 'JPG' || ext =='PNG')){
            $('#filename').html(filename);
            $('#filetype').html(filetype);
            $('#filesize').html(filesize);
            previewImage(this);
            visibility('.image-preview','visible');
            visibility('.file-details','visible');
        }else{
            var error = (size > 2) ? "File exceeds the maximum size" : "File type not supported";
            $.message.error({
                message: error,
                duration: 5000
            })
        }
    })
}

function Logout(){
    hide('logout-content');
    $('.logout').click(function(){
        $('.logout-content').css({
            'visibility': 'visible'
        });
        fadeIn('logout-content');
    })
}

function MobileTablet_Message_Navigation(){
    //hide('chat-body');
    //hide('threads');
    $('.list').click(function(){
        hide('threads');
        chatBody.css({
            'transform' : 'translateX(0)',
            'visibility' : 'visible'
        })
        // var senderName = $(".sender-name").text()
        // $('.recipient-name').text(senderName)
    });
    
    $('.back-to-threads').click(function(){
        chatBody.css({
            'transform' : 'translateX(100%)',
            'visibility' : 'hidden'
        });
        fadeIn('threads');
    }).show();
}

function Desktop_Message_Navigation(){
    //hide('chat-body');
    //hide('threads');
    $('.list').click(function(){
        show('threads');
        chatBody.css({
            'transform' : 'translateX(0)',
            'visibility' : 'visible'
        })
    });
    
    $('.back-to-threads').hide();
}



function Close_Confirm_Box(close_button, className){
    $('.' + close_button).click(function(){
        hide(className);
    })
}
function Menu_Navigation(){ 
    $('.menu-icon').click(Show_Menus);
    $('.close').click(Close_Menus);
}

function Share_Post(){
    Hide_Share_Body();
    $('.share-btn').click(function(){Show_Share_Body()});
    $('.cancel-btn').click(function(){Hide_Share_Body()});
}
function Float_Button(){
    Hide_Social_Networks_list();
    $('.float-button .fa-share').click(Show_Social_Networks_list);
    $('.close-button').click(Hide_Social_Networks_list);
}
function Hide_Share_Body(){hide('share-body');}
function Show_Share_Body(){fadeIn('share-body');}
function Hide_Social_Networks_list(){
    // hide('social-networks-list');
    hide('float-button .fa-times');
    show('float-button .fa-share');
}
function Show_Social_Networks_list(){
    fadeIn('social-networks-list');
    show('float-button .fa-times');
    hide('float-button .fa-share');
}


function Show_Menus(){
    $('.left-side-bar').css({
        'transform':'translateX(0)'
    });
    hide('menu-icon');
    $('.close').css({
        'visibility': 'visible'
    })
}

function Close_Menus(){
    $('.left-side-bar').css({
        'transform':'translateX(-100%)'
    });
    $('.close').css({
        'visibility': 'hidden'
    })
    fadeIn('menu-icon');   
}

function stayOnLastTab(pages) {
    // for (var i = 0; i < pages.length; i++) {
    //     if (pages[i] == lastTab) {
    //         show(pages[i]);
    //         setcookie('lastTab', pages[i], 300);
    //     } else {
    //         hide(pages[i]);
    //     }
    // }
}


function LeftSideBarNavigation() {
    // hide('register-customer-content');
    // hide('registered-customer-content');
    // hide('post-advert-content');
    // hide('logout-content');
    //hide('home-content');
    // hide('message-list-content')
    var pages = [
        'home-content',
        'register-customer-content',
        'action-content',
        'upload-advert-content',
        'registered-customer-content',
        'post-advert-content',
        'message-list-content'
    ];
    var url = [
        '/home',
        '/registerCustomer',
        '/action',
        '/postadvert',
        '/viewlist',
        '/postadvert',
        '/chats'
    ]
    
    $(".left-side-bar div, .message-list").click(function () {
        var device_width = $('body').width();
        var btnClassName = $(this).attr('class');
        var data = btnClassName.split(' ');
        btnClassName = data[0];
        btnClassName += '-content';
        if(btnClassName != 'logout-content'){
            for (var i = 0; i < pages.length; i++) {
                if (btnClassName == pages[i]) {
                    window.open(url[i],'_SELF');
                    fadeIn(pages[i]);
                    setcookie('lastTab', pages[i], 300);
                    if(device_width <= 768){
                        Close_Menus();
                    }
                } else {
                    hide(pages[i]);
                }
            }
        }else{
            fadeIn(btnClassName);
        }
    });
    stayOnLastTab(pages);
}

function Message_Checkbox(){
    //CHECK BOX INPUT COUNT
    var count = 0;
    var selected = 0;
    
    
    //DISABLE CHECKBOX BEFORE SELECT BUTTON PRESSED;
    $('.checkbox input[type="checkbox"]').attr('disabled','');
    
    //HIDE and SHOW SOME MESSAGE HEADER FEATURES
    hide('cancel-select');
    hide('total-selected');
    hide('checkbox');
    hide('trash');
    
    //SELECT BUTTON
    $('.select-btn').click(function(){
        hide('select-btn');
        show('cancel-select');
        show('total-selected');
        show('checkbox');
        $('.checkbox input[type="checkbox"]').removeAttr('disabled');
    });
    
    //CANCEL SELECTED BUTTON
    $('.cancel-select').click(function(){
        hide('cancel-select');
        hide('total-selected');
        hide('trash');
        hide('checkbox');
        show('select-btn');
        show('paperclip');
        $('.checkbox input[type="checkbox"]').attr('disabled','');
        $('.checkbox input[type="checkbox"]').prop('checked',false);
        count = 0;
        $('#count').text(0);
    });
    
    //INPUT CHECKBOX
    $('div').on("click", 'input[type="checkbox"]', function(){
        if(this.checked){
            count++;
            $('#countCheckBox').val(count);
            selected = $('#countCheckBox').val();
        }else{
            count--;
            $('#countCheckBox').val(count);
            selected = $('#countCheckBox').val();
        }
        selected /= 7;
        $('#count').text(selected);
        //SHOW TRASH BUTTON WHEN AT LEAST ONE BUBBLE SELECTED
        if(count > 0){
            hide('paperclip');
            show('trash');
        }else{
            show('paperclip');
            hide('trash');
        }
    });
}



//SHARE ON FACEBOOK
// target the button and pass in:
// url - url of the site you want to share
// title -title of your share
// discription - description of your share




//fack a Facebook Share button popup with a window 
function fbShare(url, title, descr) {
    var windowHeight = 350,
    windowWidth = 520,  
    alignTop = (screen.height / 2) - (windowHeight / 2),
    alignLeft = (screen.width / 2) - (windowWidth / 2),
    facebookShareUrl = 'https://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url
    
    // how to open a window - https://www.w3schools.com/jsref/met_win_open.asp
    window.open( facebookShareUrl, "","top=" + alignTop + ",left=" + alignLeft + ",width=" + windowWidth +",height=" + windowHeight);
}