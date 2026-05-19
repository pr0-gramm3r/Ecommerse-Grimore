const lbox = document.querySelector(".login-box");
const sbox = document.querySelector(".signup-box");
const msg = document.querySelector(".alert");


if (msg) {
    lbox?.style && (lbox.style.padding = "5rem 0 2rem 0");
    sbox?.style && (lbox.style.padding = "5rem 0 2rem 0");
    setTimeout(() => {
    msg.remove();
    }, 3000);
}