import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

// modal conferma eliminazione

const deleteSubmitButtons = document.querySelectorAll(".delete_button");
if (deleteSubmitButtons) {
    deleteSubmitButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const dataTitle = button.getAttribute("data_item_title");

            const dataAction = button.getAttribute("form_action");

            const modal = document.getElementById("deleteModal");

            const bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();

            const modalItemTitle = modal.querySelector("#modal_item_title");
            modalItemTitle.textContent = dataTitle;

            modal
                .querySelector("#formAction")
                .setAttribute("action", dataAction);
        });
    });
}
