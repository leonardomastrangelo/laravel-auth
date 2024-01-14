import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const btns = document.querySelectorAll(".btn-danger");

btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        console.log(e);
        // preventing to send form
        e.preventDefault();

        // take title from attribute in modal
        const dataTitle = btn.getAttribute("data-item-title");

        // take modal
        const modal = document.getElementById("deleteModal");
        // create new bs modal
        const bootstrapModal = new bootstrap.Modal(modal);

        // show the modal
        bootstrapModal.show();

        // take and set title
        const title = modal.querySelector("#modal-item-title");
        title.textContent = dataTitle;

        // take from modal the final delete btn
        const btnDelete = document.getElementById("modal_delete_btn");
        // send the actual form
        btnDelete.addEventListener("click", (e) => {
            btn.parentElement.submit();
        });
    });
});
