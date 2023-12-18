'use strict';
var textInput = document.querySelector('input');
var inputWrap = textInput.parentElement ;
var inputWidth = parseInt(getComputedStyle(inputWrap).width);
var svgText = Snap('.line');
var qCurve = inputWidth / 2;  // For correct curving on diff screen sizes
var textPath = svgText.path("M0 0 " + inputWidth + " 0");
var textDown = function(){
    textPath.animate({d:"M0 0 Q" + qCurve + " 40 " + inputWidth + " 0"},150,mina.easeout);
};
var textUp = function(){
  textPath.animate({d:"M0 0 Q" + qCurve + " -30 " + inputWidth + " 0"},150,mina.easeout);
};
var textSame = function(){
  textPath.animate({d:"M0 0 " + inputWidth + " 0"},200,mina.easein);
};
var textRun = function(){
  setTimeout(textDown, 200 );
  setTimeout(textUp, 400 );
  setTimeout(textSame, 600 );
};
