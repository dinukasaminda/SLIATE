/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validate() {

    var type = document.getElementById("type");
    var nic = document.getElementById("nic");
    var telno = document.getElementById("telno");
    var gen = document.getElementById("gender");
    var al = document.getElementById("al_stream");
    var comtest = document.getElementById("comtest");
    var english = document.getElementById("english");
    var maths = document.getElementById("maths");
    var p1 = document.getElementById("pref1");
    var p2 = document.getElementById("pref2");
    var p3 = document.getElementById("pref3");

    if (gen.value == "TYPE") {
        alert("Please Select Gender");
        gen.focus();
        return false;
    }
    else if (al.value == "TYPE") {
        alert("Please Select A/L Stream");
        al.focus();
        return false;
    }
    else if (comtest.value == "TYPE") {
        alert("Please Select Pass or Fail of General Test");
        comtest.focus();
        return false;
    }
    else if (maths.value == "TYPE") {
        alert("Please Select the Grade for Maths");
        maths.focus();
        return false;
    }
    else if (english.value == "TYPE") {
        alert("Please Select the Grade for English");
        english.focus();
        return false;
    }
    else if (p1.value == "0" && p2.value == "0" && p3.value == "0") {
        alert("Please Select the Course Preference ");
        p1.focus();
        return false;
    }

    //    else if (p2.value == "TYPE") {
//        alert("Please Select the Course for Preference 2");
//        p2.focus();
//        return false;
//    }
//    else if (p3.value == "TYPE") {
//        alert("Please Select the Course for Preference 3");
//        p3.focus();
//        return false;
//    }



    var pattern = /^\d{10}$/;
    if (!telno.value.match(pattern)) {
        alert("Please Enter Correct Contact Number");
        telno.focus();
        return false;
    }

    var postalpattern = /^\d{9}$/;
    if (!nic.value.match(postalpattern)) {
        alert("Please Enter Correct NIC");
        nic.focus();
        return false;
    }

    return true;

}

// rounded to 2 fraction points
function validateZ(el) {
    var z = document.getElementById("zscore");
    var regex = /^[0-9]+(\.[0-9]{2})?$/;
    if (!regex.test(el.value)) {
        alert('invalid value');
    }
    if (z.value <= 0 || z.value > 5) {
        alert('Invalid Value for Z score');
    }

}
//avoid the undesireble charachter typings only digits =Jquery
$(document).ready(function () {
    $("#txtboxToFilter").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [47, 8, 9, 27, 13, 110]) !== -1 ||
                // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                                (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode <= 47 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }


            });
}); 