


//取cookies函数       
function getCookie(name) {
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
    if (arr != null) return unescape(arr[2]); return null;

}

function delCookie(name) {//为了删除指定名称的cookie，可以将其过期时间设定为一个过去的时间 

    var date = new Date();
    date.setTime(date.getTime() - 10000);
    document.cookie = name + "=userID=2&username=13898648031&uPwd=123456;path=/;expires=" + date.toGMTString();
}

//写入cookie  
function setCookies(name, value) {
    var Days = 1; //此 cookie 将被保存 30 天  
    var expdate = new Date();
    expdate.setTime(expdate.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";path=/;"//expire*=" + expdate.toGMTString();
}

//写入cookie,时间为一分钟  
function setCookiesOneM(name, value) {
    var minute = 1; //此 cookie 将被保存 1分钟  
    var expdate = new Date();
    expdate.setTime(expdate.getTime() + minute * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";path=/;expire*=" + expdate.toGMTString();
}

//获取URL参数
function q(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}
//获取URL参数
function q1(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return r[2]; return null;
}
function csubstr(str, len) {
    if (str.length > 10) {
        return str.substring(0, len) + "...";
    } else {
        return str;
    }
}

function str2asc(strstr) {
    return ("0" + strstr.charCodeAt(0).toString(16)).slice(-2);
}
function asc2str(ascasc) {
    return String.fromCharCode(ascasc);
}
/*这里开始时UrlEncode和UrlDecode函数*/
function UrlEncode(str) {
    var ret = "";
    var strSpecial = "!\"#$%&'()*+,/:;<=>?[]^`{|}~%";
    var tt = "";

    for (var i = 0; i < str.length; i++) {
        var chr = str.charAt(i);
        var c = str2asc(chr);
        tt += chr + ":" + c + "n";
        if (parseInt("0x" + c) > 0x7f) {
            ret += "%" + c.slice(0, 2) + "%" + c.slice(-2);
        } else {
            if (chr == " ")
                ret += "+";
            else if (strSpecial.indexOf(chr) != -1)
                ret += "%" + c.toString(16);
            else
                ret += chr;
        }
    }
    return ret;
}
function UrlDecode(str) {
    var ret = "";
    for (var i = 0; i < str.length; i++) {
        var chr = str.charAt(i);
        if (chr == "+") {
            ret += " ";
        } else if (chr == "%") {
            var asc = str.substring(i + 1, i + 3);
            if (parseInt("0x" + asc) > 0x7f) {
                ret += asc2str(parseInt("0x" + asc + str.substring(i + 4, i + 6)));
                i += 5;
            } else {
                ret += asc2str(parseInt("0x" + asc));
                i += 2;
            }
        } else {
            ret += chr;
        }
    }
    return ret;
}



function setpagetitle() {
    $.ajax({
        type: "get",
        dataType: "text",
        async: false,
        data: "time=" + (new Date().getTime()),
        url: "../extends/Phone/GetStoreName.ashx",
        success: function (d) {
            return d;
        }
    });
}
