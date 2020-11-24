require('./bootstrap');

window.$ = require('jquery');

var Handlebars = require('handlebars');



function addChoicesListener() {

  var addAnswerBTN = $('#addAnswerBtn');
  var removeAnswerBTN = $('#removeAnswerBtn');
  var num = 4;

  addAnswerBTN.click(function () {
    addChoices(num);
    num++;
  });

  removeAnswerBTN.click(function () {
    var form = $('.form-group');
    form.last().remove();
    num--;
  })
}


function addChoices(choiceNumber) {
  var source = document.getElementById("answer-template").innerHTML;
  var compiled = Handlebars.compile(source);
  var target = $('.answerContainer');
  var answer = {

     'answerN' : 'answer' + choiceNumber,
     'n' : choiceNumber,
     'nMinus' : choiceNumber -1,
     'answer-n' : 'Scelta' + ' ' + choiceNumber
   };

  var targetHTML = compiled(answer);
  target.append(targetHTML);

}






function init() {
addChoicesListener()
}

$(document).ready(init);
