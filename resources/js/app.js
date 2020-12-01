require('./bootstrap');

window.$ = require('jquery');

var Handlebars = require('handlebars');




function validateAnswers() {

  var form = $('.answer');
  var btn = $('#addQuestions');

  form.on('change', function () {
    form.each(function () {
      if ($(this).val().length <= 0) {
      btn.prop('disabled', true);
      }
      else {
        btn.prop('disabled', false);
      }
    });
  });

}

function addChoicesListener() {

  var addAnswerBTN = $('#addAnswerBtn');
  var removeAnswerBTN = $('#removeAnswerBtn');
  var num = 4;
  var submitBTN = $('#addQuestions');

  addAnswerBTN.click(function () {
    addChoices(num);
    num++;
    submitBTN.prop('disabled', true);
    validateAnswers();
  });

  removeAnswerBTN.click(function () {
    var form = $('.form-group');
    form.last().remove();
    num--;
    validateAnswers();
  })
}


function addChoices(choiceNumber) {
  var source = document.getElementById("answer-template").innerHTML;
  var compiled = Handlebars.compile(source);
  var target = $('.answerContainer');
  var answer = {

     'answerN' : 'answer' + choiceNumber,
     'n' : choiceNumber,
     'nMinus' : choiceNumber - 1,
     'answer-n' : 'Scelta' + ' ' + choiceNumber

   };

  var targetHTML = compiled(answer);
  target.append(targetHTML);

}






function init() {
addChoicesListener();
validateAnswers();
}

$(document).ready(init);
