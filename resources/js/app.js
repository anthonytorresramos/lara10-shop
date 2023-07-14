import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const pageNumberInput = document.getElementById("pageNumber");
const paginationLinks = document.querySelectorAll(".page-link");

pageNumberInput.addEventListener("change", (event) => {
    const pageNumber = event.target.value;

    for (const paginationLink of paginationLinks) {
        paginationLink.href = `?page=${pageNumber}`;
        paginationLink.click();
    }
});
