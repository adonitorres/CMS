// Get the button
mybutton=document.getElementById("topBtn");

// Show the button when the user scrolls down 20px from the top
window.onscroll=function(){scrollFunction()};

function scrollFunction(){
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
    mybutton.style.display="block";
  } else {
    mybutton.style.display="none";
  }
}

// Scroll to the top when the user clicks the button
function topFunction(){
  document.body.scrollTop=0;
  document.documentElement.scrollTop=0;
}