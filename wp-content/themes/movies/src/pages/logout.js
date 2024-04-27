import * as BrowserStorage from "../services/browser-storage";
import { getGlobal } from "../utils/utils";

window.addEventListener("load", () => {
    BrowserStorage.del("token_key");
    BrowserStorage.del("refresh_token_key");
    BrowserStorage.del("user_email");
    BrowserStorage.del("user_id");
    setTimeout(() => {
        window.location.href = getGlobal("base_url");
    }, 1500);
});
