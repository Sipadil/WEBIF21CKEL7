
function BukaOptions(button) {
    for(let i = 0; i<3; i++){
        document.querySelectorAll(".main-profile-content div")[i].style.display = "none";
    }
    document.getElementsByClassName(button.id)[0].style.display = "block";
}

function changePassword(){
    var password = document.querySelectorAll(".content-password-change input");
    var DataPassword = [];
    DataPassword.push(document.getElementById("user-name").textContent);
    password.forEach(function(e) {
        DataPassword.push(e.value);
    });
    
    console.log(DataPassword);
}