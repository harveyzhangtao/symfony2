
var activeFlag=false;
$('.anew').click(function(){
$(".warn-icon").hide();
$(".err-icon").hide();

if($('#mobileNo').val() == ''){
return false;
}

if($(this).val()=='请填写验证码后再点此获取手机动态码'){
activeFlag = true;
}

if($(this).val()!= '重新发送手机动态码' && !activeFlag){
return false;
}

//if(!reSendShortMessage('1')){return false;}

var times = 120,
elem = $('.anew'),
intervalID,
updateTime = function(elem, s) {
s = s > 0 && s < 10 ?  ('0' + s) : s;
$(elem).attr({value:'动态码发送成功，请在'+s+'秒内输入动态码'});
},
updateTimes = function() {
updateTime(elem, times);
times--;
if(times<0){
clearInterval(intervalID);
$(elem).attr({value:'重新发送手机动态码'});
}
};

intervalID = window.setInterval(function() {
updateTimes();
}, 1000);
activeFlag = false;
})
