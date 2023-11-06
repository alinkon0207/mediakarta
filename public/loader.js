window.addEventListener("load", function () {
    var load_screen = document.getElementById("load_screen");
    document.body.removeChild(load_screen);

    var layoutName = 'Modern Light Menu';
    var settingsObject = {
        admin: 'Cork Admin Template', 
        settings: {
            layout: {
                name: layoutName, 
                toggle: true, 
                darkMode: false, 
                boxed: true, 
                logo: {
                    darkLogo: '../public/assets/img/logo.svg', 
                    lightLogo: '../public/assets/img/logo2.svg'
                }
            }
        }, 
        reset: false
    }
    
    if (settingsObject.reset) {
        localStorage.clear()
    }
    if (localStorage.length === 0) {
        corkThemeObject = settingsObject;
    } else {
        getcorkThemeObject = localStorage.getItem("theme");
        getParseObject = JSON.parse(getcorkThemeObject)
        ParsedObject = getParseObject;
        if (getcorkThemeObject !== null) {
            if (ParsedObject.admin === 'Cork Admin Template') {
                if (ParsedObject.settings.layout.name === layoutName) {
                    corkThemeObject = ParsedObject;
                } else {
                    corkThemeObject = settingsObject;
                }
            } else {
                if (ParsedObject.admin === undefined) {
                    corkThemeObject = settingsObject;
                }
            }
        } else {
            corkThemeObject = settingsObject;
        }
    }
    if (corkThemeObject.settings.layout.boxed) {
        localStorage.setItem("theme", JSON.stringify(corkThemeObject));
        getcorkThemeObject = localStorage.getItem("theme");
        getParseObject = JSON.parse(getcorkThemeObject)
        if (getParseObject.settings.layout.boxed) {
            if (document.body.getAttribute('layout') !== 'full-width') {
                document.body.classList.add('layout-boxed');
                if (document.querySelector('.header-container')) {
                    document.querySelector('.header-container').classList.add('container-xxl');
                }
                if (document.querySelector('.middle-content')) {
                    document.querySelector('.middle-content').classList.add('container-xxl');
                }
            } else {
                document.body.classList.remove('layout-boxed');
                if (document.querySelector('.header-container')) {
                    document.querySelector('.header-container').classList.remove('container-xxl');
                }
                if (document.querySelector('.middle-content')) {
                    document.querySelector('.middle-content').classList.remove('container-xxl');
                }
            }
        }
    } else {
        localStorage.setItem("theme", JSON.stringify(corkThemeObject));
        getcorkThemeObject = localStorage.getItem("theme");
        getParseObject = JSON.parse(getcorkThemeObject);
        if (!getParseObject.settings.layout.boxed) {
            if (document.body.getAttribute('layout') !== 'boxed') {
                document.body.classList.remove('layout-boxed');
                if (document.querySelector('.header-container')) {
                    document.querySelector('.header-container').classList.remove('container-xxl');
                }
                if (document.querySelector('.middle-content')) {
                    document.querySelector('.middle-content').classList.remove('container-xxl');
                }
            } else {
                document.body.classList.add('layout-boxed');
                if (document.querySelector('.header-container')) {
                    document.querySelector('.header-container').classList.add('container-xxl');
                }
                if (document.querySelector('.middle-content')) {
                    document.querySelector('.middle-content').classList.add('container-xxl');
                }
            }
        }
    }
});