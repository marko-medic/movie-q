/* 
 Adapter for browser storage
 Can be easily replaced with localStorage/sessionStorage/etc
*/
export const get = (key) => {
    const cookies = document.cookie
        .split(";")
        .map((cookie) => cookie.trim().split("="));
    const cookie = cookies.find((cookie) => cookie[0] === key);
    return cookie ? cookie[1] : null;
};

export const set = (key, value, expiresDays = 1) => {
    const expiresDate = new Date();
    expiresDate.setDate(expiresDate.getDate() + expiresDays);
    document.cookie = `${key}=${value}; expires=${expiresDate.toUTCString()}; path=/`;
};

export const del = (key) => {
    document.cookie = `${key}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
};

export const print = () => {
    const cookies = document.cookie
        .split(";")
        .map((cookie) => cookie.trim().split("="));
    console.log("Cookies:");
    cookies.forEach((cookie) => console.log(`${cookie[0]}: ${cookie[1]}`));
};
