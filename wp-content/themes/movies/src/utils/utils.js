const { wp_global } = window;

export const isPage = (pageName) => window.location.href.includes(pageName);

export const getGlobal = (key) => {
    return wp_global?.[key] || null;
};
