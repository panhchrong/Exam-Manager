var Questions = document.getElementsByName("questions[]");
var Options = document.getElementsByName("option[]");
var container = document.getElementById("test-container");
function NewQuestion(){
    var num = Questions.length + 1;
    var div = document.createElement('div');
    div.className = "col-md-11 mt-2 shadow row rounded";
    div.innerHTML = "<h4>Question " + num + ":</h4>";
    var textArea = document.createElement('textarea');
    textArea.setAttribute('name', 'questions[]');
    textArea.className = "col-md-12 m-1";
    textArea.placeholder = "Question...";
    textArea.setAttribute('rows', '3');
    div.appendChild(textArea);
    var inputs;
    for(var i = 1; i <= 4; i++){
        inputs = document.createElement('input');
        inputs.className = "col-md-10 m-1";
        inputs.setAttribute('style', 'height : 30px;');
        inputs.placeholder = "Answer Option " + i + "..";
        inputs.setAttribute('name', 'option[]');
        inputs.setAttribute('autocomplete', 'off');
        div.appendChild(inputs);
    }
    var label = document.createElement('label');
    label.setAttribute('for', "correctoption");
    label.innerHTML = "Choose a correct option";
    div.appendChild(label);
    var selector = document.createElement('select');
    selector.name = "correctoption[]";
    selector.id = "correctoption";
    selector.className = "mb-2 col-md-3 rounded";
    div.appendChild(selector);
    var options = ['a', 'b', 'c', 'd'];
    options.forEach(option => {
        var o = document.createElement('option');
        o.value = option;
        o.innerHTML = option;
        selector.appendChild(o);
    });
    var remove_btn = document.createElement("a");
    remove_btn.id = Questions.length + 1;
    remove_btn.className = "btn btn-danger mb-2";
    remove_btn.style = "color : white !important;";
    remove_btn.innerHTML = "Remove";
    remove_btn.setAttribute('onclick', 'removeQuestion(this)')
    div.appendChild(remove_btn);
    container.appendChild(div);
}
function removeQuestion(num){
    container.removeChild(container.children[num.id - 1]);
    for(var i = 0; i < container.childNodes.length-1 ; i++){
        container.children[i].children[6].id = i+1;
        container.children[i].children[0].innerHTML = "Question " + (i+1) + ":";
    }
}
function EditQuestion(){
    document.getElementById("question-form").setAttribute("style", "pointer-events : auto; opacity : 1;");
    document.getElementById("config-form").setAttribute("style", "pointer-events : none; opacity : 0.4;");
    document.getElementById("question-form").scrollIntoView();
}
function TestValidating(){
    
    for(var i = 0; i < Questions.length; i ++){
        if(Questions[i].value == ""){
            Questions[i].scrollIntoView();
            Questions[i].style = "border-color:red;"
            alert("Seems like you not quite done with this question yet");
            return;
        }
        else Questions[i].style = "border-color:black;";
        console.log("question")
    }
    for(var i = 0; i< Options.length; i++){
        if(Options[i].value == ''){
            Options[i].scrollIntoView();
            Options[i].style = "border-color: red;";
            alert("Seems like you not quite done with this question yet")
            return;
        }
        else Options[i].style = "height : 30px;";
        console.log('option')
    }
    document.getElementById("question-form").setAttribute("style", "pointer-events : none; opacity : 0.4;")
    document.getElementById("config-form").setAttribute("style", "pointer-events : auto; opacity: 1;")
    document.getElementById("config-form").scrollIntoView();
}
function ConfigValidation(){
    var testname = document.getElementById("testname");
    var teststartdate = document.getElementById("teststartdate");
    var testenddate = document.getElementById("testenddate");
    var score = document.getElementById("score");
    var testduration = document.getElementById("testduration");
    var err = false;
    if(testname.value == ""){
        err = true;
    }else if(teststartdate.value == ""){
        err = true
    }else if(testenddate.value == ""){
        err = true;
    }else if(score.value == ""){
        err = true;
    }else if(testduration.value == ""){
        err = true
    }
    if(err){
        alert("please fill in all the form before proceed")
        return;
    }
    if(Date.parse(testenddate.value) - Date.parse(teststartdate.value) < 3600){
        alert("Please choose a new scedule for your test, make sure there's atleast 1 hour window for when the test is online")
    }
    alert('all good');
    document.getElementById('test-form').submit();
}
