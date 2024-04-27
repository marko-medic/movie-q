import { isPage } from "./utils/utils";
import "./styles/base.css"

if (isPage('login')) {
    import('./pages/login');
}