window.addEventListener("load", function () {
    const loaderG = document.querySelector(".loader");
    loaderG.className += " hidden";

    const loader = document.querySelector(".animate");
    setTimeout(() => {
        loader.className += " active";
    }, 50);
    setTimeout(() => {
        document.querySelector(".animate2").className += " active";
    }, 250);
    setTimeout(() => {
        document.querySelector(".animate3").className += " active";
    }, 350);
});

document.querySelector(".contact").onclick = () => {
    document.querySelector(".footer").classList.toggle("active");
};

document.getElementById("linkedin").onclick = () => {
    window.location.href = 'https://linkedin.com/in/harsh-topno-2abb021a1';
};

document.getElementById("getStarted").onclick = () => {
    window.location.href = 'vcust.php';
};