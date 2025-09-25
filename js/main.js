/* Lazy loading */
document.addEventListener("DOMContentLoaded", function () {
    var lazyBackgrounds = [].slice.call(document.querySelectorAll(".lazy-background"));
    if ("IntersectionObserver" in window) {
        let lazyBackgroundObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.style.backgroundImage = entry.target.dataset.bg;
                    lazyBackgroundObserver.unobserve(entry.target);
                }
            });
        });

        lazyBackgrounds.forEach(function (lazyBackground) {
            lazyBackgroundObserver.observe(lazyBackground);
        });
    }
});

/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}

// Get Local storage data
let rareBar = localStorage.getItem('rare') === 'true' ? true : false;
let epicBar = localStorage.getItem('epic') === 'true' ? true : false;
let legendaryBar = localStorage.getItem('legendary') === 'true' ? true : false;
let mythicBar = localStorage.getItem('mythic') === 'true' ? true : false;
let categoriesColor = localStorage.getItem('categoriesColor') === 'true' ? true : false;

// Apply data
if (document.querySelector('[data-rarity="rare"]') != null) {
    document.querySelector('[data-rarity="rare"]').checked = rareBar
    updateBar(rareBar, 'rare');
    document.querySelector('[data-rarity="mythic"]').checked = mythicBar
    updateBar(mythicBar, 'mythic');
}
document.getElementById('categoriesColors').checked = categoriesColor
document.querySelector('[data-rarity="epic"]').checked = epicBar
document.querySelector('[data-rarity="legendary"]').checked = legendaryBar
updateCategoryColor(categoriesColor);
updateBar(epicBar, 'epic');
updateBar(legendaryBar, 'legendary');

function updateCategoryColor(show) {
    localStorage.setItem('categoriesColor', show);
    document.querySelectorAll('[data-category]').forEach(function (element) {
        element.style.backgroundColor = show ? '' : 'unset';
    });
}

// Change bar visibility from a checkbox
function manageBar(event) {
    updateBar(event.target.checked, event.target.dataset.rarity)
}

//Change bar visibility
function updateBar(show, rarity) {
    localStorage.setItem(rarity, show)
    let elmt = document.getElementsByClassName(rarity)
    for (let i = 0; i < elmt.length; i++) {
        if (show) {
            // Normal bar
            elmt[i].style.border = ''
        } else {
            // No bar
            elmt[i].style.border = 'none'
        }
    }
}

function unselectHeroes() {
    let elmt = document.querySelectorAll('input[name="hero[]"]')
    for (let i = 0; i < elmt.length; i++) {
        elmt[i].checked = false
    }
}

function selectRole(role) {
    unselectHeroes();
    let elmt = document.querySelectorAll('input[name="hero[]"][data-role="' + role + '"]')
    for (let i = 0; i < elmt.length; i++) {
        elmt[i].checked = true
    }
}

function sortAlph() {
    let container = document.getElementById('container');
    let category = document.getElementById('category');
    let total = document.getElementById('total');
    let heroes = document.querySelectorAll('[data-count]');
    heroes = Array.from(heroes).sort((a, b) => a.id.localeCompare(b.id));
    container.innerHTML = '';
    container.append(category);
    heroes.forEach(hero => {
        container.append(hero);
    });
    container.append(total);
}

function sortHeroes() {
    let container = document.getElementById('container');
    let category = document.getElementById('category');
    let total = document.getElementById('total');
    let heroes = document.querySelectorAll('[data-count]');
    heroes = Array.from(heroes).sort((a, b) => b.getAttribute('data-count') - a.getAttribute('data-count'));
    container.innerHTML = '';
    container.append(category);
    heroes.forEach(hero => {
        container.append(hero);
    });
    container.append(total);
}