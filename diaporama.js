// Paramètres des images / Pictures settings
var widthImg = 300,
heightImg = 300,
// Paramètres du container / Container settings
widthContainer = widthImg,
heightContainer = heightImg,
// Paramètres de la Box Image / BoxImage settings
widthBox = widthImg*4,
// Time setting
timeRepetition = 3000,
timeMargin = 500;

$('#container').css('overflow','hidden');
$('#container').css("width",widthContainer)
$('#container').css("height",heightContainer);

$('img').css("width",widthImg);
$('img').css("height",heightImg);
$('img').css("float","left");

$(".box-image").css("width",widthBox);


setInterval(diaporama,timeRepetition);

function diaporama(){
  $('img').eq(0).delay().animate({
   "margin-left" : - widthImg
},timeMargin,function(){
  src = $(this).attr('src');
  $(this).remove();
  $('img').last().after("<img width="+widthImg+"  height="+heightImg+" src="+''+src+''+">");
});

}
