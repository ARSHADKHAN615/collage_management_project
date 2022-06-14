import Alpine from 'alpinejs'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import Focus from '@alpinejs/focus'
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(Focus)
window.Alpine = Alpine

Alpine.start()


var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function () {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

        // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }

});

const driver = new Driver();
        driver.defineSteps([{
                element: '#first-element-introduction',
                popover: {
                    className: 'first-step-popover-class',
                    title: 'Title on Popover',
                    description: 'Body of the popover',
                    position: 'bottom',
                }
            },
            {
                element: '#second-element-introduction',
                popover: {
                    title: 'Title on Popover',
                    description: 'Body of the popover',
                    position: 'left',
                }
            },
            {
                element: '#third-element-introduction',
                popover: {
                    title: 'Title on Popover',
                    description: 'Body of the popover',
                    position: 'bottom'
                }
            },
            {
                element: '#fourth-element-introduction',
                popover: {
                    title: 'Title on Popover',
                    description: 'Body of the popover',
                    position: 'bottom'
                }
            },
        ]);
        // Start the introduction
        // driver.start();
