export class Modal {
    constructor() {
        this.modalElement = document.createElement("div");
        this.modalElement.classList.add("custom-modal");
        this.modalElement.innerHTML = `
            <div class="modal-content">
                <span class="close">&times;</span>
                <p id="modal-message"></p>
            </div>
        `;
        document.body.appendChild(this.modalElement);
        this.closeButton = this.modalElement.querySelector(".close");
        this.modalMessage = this.modalElement.querySelector("#modal-message");
        this.closeButton.addEventListener("click", () => this.close());
    }

    showMessage(message) {
        this.modalMessage.textContent = message;
        this.modalElement.style.display = "block";
    }

    close() {
        this.modalElement.style.display = "none";
    }
}
