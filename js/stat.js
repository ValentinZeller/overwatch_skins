function sort(event, id) {
    let container = document.getElementById('container');
    let category = document.getElementById('category');
    let button = event.target;
    let order = button.getAttribute('data-sort')
    order = order === 'asc' ? 'desc' : 'asc';
    button.setAttribute('data-sort', order);

    let heroes = document.querySelectorAll('[data-name]');
    heroes = Array.from(heroes).sort((a, b) => {
        let aValue = a.querySelector('[data-index="' + id + '"]').textContent;
        let bValue = b.querySelector('[data-index="' + id + '"]').textContent;

        if (button.getAttribute('data-category') == 2) {
            aValue = parseFloat(aValue);
            bValue = parseFloat(bValue);
        }
        if (order === 'asc') {
            return aValue - bValue;
        } else {
            return bValue - aValue;
        }
    })

    container.innerHTML = '';
    container.append(category.cloneNode(true));
    heroes.forEach(hero => {
        container.append(hero);
    });
    container.append(category.cloneNode(true));
}