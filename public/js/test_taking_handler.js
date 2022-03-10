var duration = parseInt(document.getElementById('timer').innerHTML);
var totalQuestions = document.getElementById('answered').innerHTML;
var select = document.querySelectorAll(`[id^="choosedoption"]`);
var timer = document.getElementById('timer');
var QuestionsAnswered = document.getElementById('answered');
var seconds = 0;
var minutes = duration;
var selected = 0;
QuestionsAnswered.innerHTML =  "Total Question : " + totalQuestions;
function countDown(){     
        if(minutes == 0 && seconds == 0) forceSubmit();
        if(seconds == 0){
            seconds = 59;
            minutes -= 1;
        }
        else seconds -= 1;
        timer.innerHTML = (minutes < 10 ? "0"+minutes : minutes) + ":" + (seconds < 10 ? "0"+seconds : seconds);
}
function forceSubmit(){
    document.getElementById('test-form').submit();
}
function GradeTest(code){
    var unanswer = totalQuestions;
    for(var i = 1; i <= totalQuestions; i ++){
        var answer = document.getElementsByName("choosedoption"+i);
        for(var j = 0; j < 4; j++)
            if(answer[j].checked) {unanswer--; break;}
    }
    if(unanswer > 0){
        if(confirm("You still have " + unanswer + " unanswered question(s) do you wish to submit anyway?"))
            document.getElementById("test-form").submit();
    }else 
        document.getElementById("test-form").submit();
}
var x = setInterval(countDown, 1000);