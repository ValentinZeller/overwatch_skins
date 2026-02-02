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