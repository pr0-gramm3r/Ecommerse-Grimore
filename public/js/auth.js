const i = document.querySelector(".toggle-eye");
const pass = document.querySelector("#pass");

i.addEventListener("click", () => {
    if (pass.type === "password") {
        pass.type = "text";
        i.classList.replace("fa-eye-slash", "fa-eye");
    } else {
        pass.type = "password";
        i.classList.replace("fa-eye", "fa-eye-slash");
    }
});