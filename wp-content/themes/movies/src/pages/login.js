import { getGlobal } from "../utils/utils";
import * as BrowserStorage from "../services/browser-storage";
import * as HttpService from "../services/http-service";
import { Modal } from "../components/modal";

class LoginPage {
    constructor() {
        this.loginForm = document.getElementById("login-form");
        this.init();
    }

    init() {
        if (this.loginForm) {
            this.loginForm.addEventListener(
                "submit",
                this.handleLoginForm.bind(this),
            );
        }
    }

    handleLoginForm(event) {
        event.preventDefault();

        const submitUrl = "https://symfony-skeleton.q-tests.com/api/v2/token";
        const formData = new FormData(this.loginForm);

        const data = {
            email: formData.get("email"),
            password: formData.get("password"),
        };

        HttpService.post(submitUrl, data)
            .then(this.handleSuccess.bind(this))
            .catch(this.handleError.bind(this));
    }

    handleSuccess(response) {
        // Store data in browser cookie
        const { id, token_key, refresh_token_key, user } = response;
        const expiresDate = new Date(response.expires_at);

        // Set cookies
        BrowserStorage.set("user_id", id, expiresDate.toUTCString());
        BrowserStorage.set("token_key", token_key, expiresDate.toUTCString());
        BrowserStorage.set(
            "refresh_token_key",
            refresh_token_key,
            expiresDate.toUTCString(),
        );
        BrowserStorage.set("user_email", user.email, expiresDate.toUTCString());

        const modal = new Modal();
        modal.showMessage("Success, you will be redirected!");
        setTimeout(() => {
            window.location.href = getGlobal("base_url");
        }, 1500);
    }

    handleError(error) {
        const modal = new Modal();
        modal.showMessage("Something went wrong, look console!");
        console.error("Error:", error);
    }
}

window.addEventListener("load", () => {
    new LoginPage();
});
