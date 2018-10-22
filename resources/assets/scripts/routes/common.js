export default {
  init() {

    function toggleFane(e) {
      e.preventDefault();
      if(aktivKnapp === this) {
        // Do nothing, aktiv is the same
        return
      }

      aktiv.classList.remove("faner__fane--aktiv");
      aktivKnapp.classList.remove("fanemeny__knapp--aktiv");
      aktivKnapp = this;
      aktiv = document.getElementById(aktivKnapp.getAttribute("data-target"));
      aktiv.classList.add("faner__fane--aktiv");
      aktivKnapp.classList.add("fanemeny__knapp--aktiv");
    }

    // JavaScript to be fired on all pages
    var mobilmeny = document.querySelector(".mobilmeny");
    var navigasjonsholder = document.querySelector(".navigasjonsholder");
    if(mobilmeny) {
      mobilmeny.addEventListener("click", (event) => {
        event.preventDefault();
        event.target.classList.toggle("mobilmeny--aktiv");
        navigasjonsholder.classList.toggle("navigasjonsholder--aktiv");
      })
    }

    var faner = document.querySelector(".faner");
    if(faner) {
      var aktiv = faner.querySelector(".faner__fane--aktiv"),
          faneknapper = document.querySelectorAll(".fanemeny__knapp"),
          aktivKnapp = document.querySelector(".fanemeny__knapp--aktiv");
      if(! aktiv) {
        aktiv = faner.children[0];
        aktiv.classList.add("faner__fane--aktiv");
        aktivKnapp = document.querySelector('[data-target="' + aktiv.id + '"]');
      }

      faner.style.height = aktiv.getBoundingClientRect().height + "px";
      faner.classList.add("faner--aktivert");

      for(let i = 0; i < faneknapper.length; i++) {
        faneknapper[i].addEventListener("click", toggleFane);
      }
    }

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
