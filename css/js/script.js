const darkMode = document.getElementById("darkMode");


// ============================
// DARK MODE
// ============================

darkMode.addEventListener("click", function () {

    document.body.classList.toggle("dark");

    if (document.body.classList.contains("dark")) {

        darkMode.textContent = "☀️";

        localStorage.setItem(
            "darkMode",
            "true"
        );

    } else {

        darkMode.textContent = "🌙";

        localStorage.setItem(
            "darkMode",
            "false"
        );

    }

});


// ============================
// CEK DARK MODE
// ============================

if (
    localStorage.getItem("darkMode")
    === "true"
) {

    document.body.classList.add("dark");

    darkMode.textContent = "☀️";

}


// ============================
// ANIMASI CARD
// ============================

const cards =
    document.querySelectorAll(".schedule-card");

cards.forEach((card, index) => {

    card.style.opacity = "0";

    card.style.transform = "translateY(10px)";

    setTimeout(() => {

        card.style.transition =
            "all 0.4s ease";

        card.style.opacity = "1";

        card.style.transform =
            "translateY(0)";

    }, index * 100);

});