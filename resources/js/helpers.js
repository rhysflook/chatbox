export const saveTheme = () => {

}

export const loadTheme = () => {
    let theme = localStorage.getItem('theme');

    if (theme) {
        theme = JSON.parse(theme);
        let bodyStyle = document.documentElement.style;
        let styles = [
            'main', 'secondary', 'accent', 'highlight', 'nav',
            'alt', 'font', 'heading', 'border', 'icon'
         ];
        styles.forEach(style => {
            let key = `--${style}-color`;
            bodyStyle.setProperty(key, theme[key]);
        })
    }
}