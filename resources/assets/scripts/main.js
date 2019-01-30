// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import malFagvelger from './routes/fagvelger';

// base package
//import fortawesome from "fontawesome";
// Facebook and Twitter icons
//import faFacebook from "@fortawesome/fontawesome-free-brands/faFacebook";
//import faTwitter from "@fortawesome/fontawesome-free-brands/faTwitter";
//console.log(fortawesome);

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,

  malFagvelger,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
