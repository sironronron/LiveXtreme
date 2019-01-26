function init() {
var imgDefer = document.getElementsByTagName('img');
    for (var i=0; i<imgDefer.length; i++) {
    if(imgDefer[i].getAttribute('data-src')) {
    imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
} } }
window.onload = init;

window.onscroll = function() {myFunction()};

var navbar = document.getElementById("snav");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("fixed-top")
  } else {
    navbar.classList.remove("fixed-top");
  }
}

var popupMeta = {
    width: 800,
    height: 600
}
$(document).on('click', '.social-button', function(event){
    event.preventDefault();

    var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
        hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

    var url = $(this).attr('href');
    var popup = window.open(url, 'Social Share',
        'width='+popupMeta.width+',height='+popupMeta.height+
        ',left='+vPosition+',top='+hPosition+
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
        popup.focus();
        return false;
    }
});

$('#btnModal').modal('hide');

