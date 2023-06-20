
function TutupSidebar() {
    document.getElementsByClassName("sidebar")[0].style.width = "0";
    document.getElementsByClassName("sidebar")[0].style.left = "-20px"
}

function BukaSidebar() {
    document.getElementsByClassName("sidebar")[0].style.width = "230px";
    document.getElementsByClassName("sidebar")[0].style.left = "0px"
}

function TampilkanSection(button) {
    var section = button.id;
  window.location.href = "../dashboard/" + section;
  
    TutupSidebar();
  }
  

function BukaOpsiProfile(element) {
    if (element.id === "info-profile") {
        element.id = "";
        document.getElementsByClassName("info-profile")[0].style.display = "flex";

    }else{
        element.id = "info-profile";
        document.getElementsByClassName("info-profile")[0].style.display = "none";
    }
}






document.addEventListener('DOMContentLoaded', function() {
    TutupSidebar();
});

