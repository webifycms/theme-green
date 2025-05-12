// import our custom CSS
import '../css/style.css'
// import uikit
import Uikit from 'uikit'
import { ajax_navigator } from "./ajax_navigator.js"

// when the DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    ajax_navigator('#content', '.menu-item')
});