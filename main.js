function toggleMenu() {
  var x = document.getElementById("menu");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function openLink(id){
  switch(id) {
    case 1: window.open("https://www.instagram.com/myfamily_institute/");
            break;
    case 2: window.open("https://www.facebook.com/myfamilykz");
            break;
    case 3: window.open("https://www.instagram.com/myfamily_institute/");
            break;
    case 4: window.open("https://www.instagram.com/myfamily_institute/");
            break;
  }
  
}