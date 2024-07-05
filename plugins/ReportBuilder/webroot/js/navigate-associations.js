document.addEventListener('click', async function (event) {
    if (event.target.classList.contains('navigate')) {
        const element = event.target;
        const response = await fetch(element.dataset.url);
        const body = await response.text();

        const insertElement = document.createElement('div');
        insertElement.innerHTML = body;
        element.parentNode.insertBefore(insertElement, element.nextSibling);
    }
});
