// Default Laravel bootstrapper, installs axios
import './bootstrap';

 // Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

 // Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

//if want using jquery
// $(() => {
//     setTimeout(() => {
//         alert('jQuery triggered via app.js')
//     }, 2500);
// });