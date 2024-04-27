import { isPage } from "./utils/utils";
import "./styles/base.css";

if (isPage("login")) {
    import("./pages/login");
}
if (isPage("logout")) {
    import("./pages/logout");
}
