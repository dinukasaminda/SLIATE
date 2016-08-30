/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validate() {


    var pw = document.getElementById("pw");
    var conpw = document.getElementById("conpw");
    var dept = document.getElementById("dept");
    var utype = document.getElementById("utype");

    if (dept.value == "TYPE") {
        alert("Please Select  Department");
        dept.focus();
        return false;
    }
    else if (utype.value == "TYPE") {
        alert("Please Select  User Type");
        utype.focus();
        return false;
    }

    else if (pw.value != conpw.value) {
        alert("Please Match Confirm Password to Password");
        conpw.focus();
        return false;
    }
    
    


    return true;
}