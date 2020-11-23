/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



const ID_POPUP = "id_popup";


$(document).ready(function () {
    registerEventHandlers();
});

function activateMenu()
{
    var current_page_URL = location.href;
    $(".navbar-nav a").each(function ()
    {
        var target_URL = $(this).prop("href");
        if (target_URL === current_page_URL)
        {
            $('nav a').parents('li, ul').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        }
    });
}

/*
 * This function toggles the nav menu active/inactive status as
 * different pages are selected. It should be called from $(document).ready()
 * or whenever the page loads.
 */
function activateMenu()
{
    var current_page_URL = location.href;
    $(".navbar-nav a").each(function ()
    {
        var target_URL = $(this).prop("href");
        if (target_URL === current_page_URL)
        {
            $('nav a').parents('li, ul').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        }
    });
}

function sendContact() {
    var valid;
    valid = validateContact();
    if (valid) {
        jQuery.ajax({
            url: "contact_mail.php",
            data: 'userName=' + $("#userName").val() + '&userEmail=' +
                    $("#userEmail").val() + '&subject=' +
                    $("#subject").val() + '&content=' +
                    $(content).val(),
            type: "POST",
            success: function (data) {
//                $("#mail-status").html(data);
                alert("We have recived your email and will look into your feedback")
            },
            error: function () {}
        });
    }
}

function validateContact() {
    var valid = true;
    $(".demoInputBox").css('background-color', '');
    $(".info").html('');
    if (!$("#userName").val()) {
        $("#userName-info").html("(required)");
        $("#userName").css('background-color', '#FFFFDF');
        valid = false;
    }
    if (!$("#userEmail").val()) {
        $("#userEmail-info").html("(required)");
        $("#userEmail").css('background-color', '#FFFFDF');
        valid = false;
    }
    if (!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#userEmail-info").html("(invalid)");
        $("#userEmail").css('background-color', '#FFFFDF');
        valid = false;
    }
    if (!$("#subject").val()) {
        $("#subject-info").html("(required)");
        $("#subject").css('background-color', '#FFFFDF');
        valid = false;
    }
    if (!$("#content").val()) {
        $("#content-info").html("(required)");
        $("#content").css('background-color', '#FFFFDF');
        valid = false;
    }
    return valid;
}


jQuery(document).ready(function () {
    // This button will increment the value
    $('[data-quantity="plus"]').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        productName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name="quantity_' + productName + '"]').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name="quantity_' + productName + '"]').val(currentVal + 1);
            document.getElementsByName("quantity_" + productName).value = currentVal + 1;
        } else {
            // Otherwise put a 0 there
            $('input[name="quantity_' + productName + '"]').val(0);
        }
    });
    // This button will decrement the value till 0
    $('[data-quantity="minus"]').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        productName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name="quantity_' + productName + '"]').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name="quantity_' + productName + '"]').val(currentVal - 1);
            document.getElementsByName("quantity_" + productName).value = currentVal - 1;

        } else {
            // Otherwise put a 0 there
            $('input[name="quantity_' + productName + '"]').val(0);
            document.getElementById("quantity_" + productName).value = s;
        }
    });
});



function openCategory(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


$("form#myform").submit(function (event) {
    event.preventDefault();
//    var login_status = $("#login_status").val();
    var login_status = document.getElementById("login_status").value;
    var quantity_ = document.getElementsByName("quantity_" + productName).value;
    if (login_status === "false") {
        setTimeout(function () {
            alert("You need to register before purchasing");
        }, 3000);
        window.location.replace("register.php");
        //Maybe can ajax a popup register??
    } else {
        $.ajax({
            type: "POST",
            url: "add-to-cart.php",
            data: "productName=" + productName + "&quantity_=" + quantity_ + "&action=add",
            success: function () {
                alert(productName + quantity_);
            }
        });
    }
}); 