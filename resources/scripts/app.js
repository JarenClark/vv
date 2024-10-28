import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...

  AOS.init();

  const menuToggler = document.querySelector('#menu-toggler');
  const menuTogglers = document.querySelectorAll('.menu-toggler');
  const mainNav = document.querySelector('#main-nav');
  const backdrop = document.querySelector('#backdrop');
  function openMenu() {
    backdrop.classList.remove('hidden');
    mainNav.classList.add('transition');
    mainNav.classList.add('duration-500');
    mainNav.classList.remove('translate-x-full');
  }
  function closeMenu() {
    backdrop.classList.add('hidden');
    mainNav.classList.add('translate-x-full');
  }
  // menuToggler.addEventListener('click', (event) => {
  //   event.preventDefault();
  //   mainNav.classList.contains('translate-x-full') ? openMenu() : closeMenu();
  // });
  menuTogglers.forEach((toggler) => {
    toggler.addEventListener('click', (event) => {
      event.preventDefault();
      mainNav.classList.contains('translate-x-full') ? openMenu() : closeMenu();
    });
  });
  backdrop.addEventListener('click', (event) => {
    closeMenu();
    closeDropdowns();
  });
  // header menu dropdowns
  const topLevelMenuItems = document.querySelectorAll('header li.depth-0');
  const topLevelMenuItemsWithChildren = document.querySelectorAll(
    'header li.depth-0.menu-item-has-children'
  );

  function closeDropdowns() {
    console.log('closeDropdowns');
    topLevelMenuItems.forEach((item) => {
      item.classList.remove('open');
    });
  }

  // header shadow on scroll
  function handleHeaderEffect() {
    const header = document.querySelector('header');
    if (window.scrollY > 200) {
      header.classList.add('active');
    } else {
      header.classList.remove('active');
    }
  }
handleHeaderEffect();

  function openSearch() {
    console.log('opening search');
    // document.getElementById('backdrop').classList.remove('hidden');
    document.getElementById('search').classList.remove('hidden');
    document
      .querySelector('#search .inner')
      .classList.remove('-translate-y-full');
    document.querySelector('.search-form input').focus();
  }

  function closeSearch() {
    console.log('closing search');
    // document.getElementById('backdrop').classList.add('hidden');
    document.getElementById('search').classList.add('hidden');
    document.querySelector('#search .inner').classList.add('-translate-y-full');
    document.querySelector('.search-form input').blur();
  }
  document.querySelector('#search-btn').addEventListener('click', function (e) {
    e.preventDefault();
    openSearch();
  });

  document.querySelector('.close-search').addEventListener('click', function (e) {
    e.preventDefault();
    closeSearch();
  });
  document.querySelector('body').addEventListener('click', function (e) {
    if (!e.target.closest('#search') && !e.target.closest('#search-btn')) {
      closeSearch();
    }
  });
  document.addEventListener('scroll', function () {
    closeSearch();
  });
  // event listeners
  topLevelMenuItems.forEach((item) => {
    item.addEventListener('mouseenter', (event) => {
      if (window.innerWidth >= 1024) {
        event.preventDefault();
        closeDropdowns();
        item.classList.add('open');
      }
    });
  });

  topLevelMenuItemsWithChildren.forEach((item) => {
    item.addEventListener('click', (event) => {
      if (window.innerWidth < 1024) {
        console.log('opening menu');
        if (item.classList.contains('open')) {
          console.log('if');
        } else {
          console.log('else');
          event.preventDefault();

          item.classList.add('open');
        }
      }
      // closeDropdowns();
    });
  });

  document.querySelector('body').addEventListener('click', function (event) {
    if (window.innerWidth >= 1024) {
      closeDropdowns();
    }
  });

  document.addEventListener('resize', function (event) {
    document.querySelector('#main-nav').classList.remove('transition');
  });

  document.addEventListener('scroll', function (event) {
    closeDropdowns();
    handleHeaderEffect();
  });

  const verticalNumbers = document.querySelectorAll('.vertical-number-counter');
  verticalNumbers.forEach((span) => {
    const target = span.dataset.to;
    span.querySelector('ul').style.transform = `translateY(-${target * 10}%)`;
  });



  // reomve empty p tags
  document.querySelectorAll('p').forEach(p => {
    if (!p.textContent.trim() || p.innerHTML.trim() === '&nbsp;') {
        p.remove();
    }
});

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
