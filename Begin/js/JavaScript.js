function openForm() {
    let open = document.getElementById("form");
    open.style.display = "block";
    document.body.style.overflow = "hidden";
}
function closeForm() {
    let close = document.getElementById("form");
    close.style.display = "none";
}
function password(value) {
    if (value.style.backgroundImage == 'url("icon/view.png")') {
        value.style.backgroundImage = "url(icon/hide.png)";
        document.querySelector("#psw").type = "password";
    } else {
        value.style.backgroundImage = "url(icon/view.png)";
        document.querySelector("#psw").type = "text";
    }
}
let file = document.querySelector("#file");
let photo = document.querySelector("#img");
file.onchange = function() {
    photo.src = URL.createObjectURL(file.files[0]);
}