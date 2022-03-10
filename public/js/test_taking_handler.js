var duration = parseInt(document.getElementById('timer').innerHTML);
var totalQuestions = document.getElementById('answered').innerHTML;
var select = document.querySelectorAll(`[id^="choosedoption"]`);
var timer = document.getElementById('timer');
var QuestionsAnswered = document.getElementById('answered');
var seconds = 0;
var minutes = duration;
var selected = 0;
QuestionsAnswered.innerHTML =  "Questions answered : 0/" + totalQuestions;
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
    document.getElementById("test-form").setAttribute("action", "../../server/GrandeTest.php?code="+code);
    document.getElementById("test-form").submit();
}
function updateQuestionAswered(){
    QuestionsAnswered.innerHTML = "Questions answered : " + selected + "/" + totalQuestions;
}
selct.forEach(element => {
    element.setAttribute("onclick", "updateQuestionAnswered()")
});
var x = setInterval(countDown, 1000);