document.addEventListener('click', async function (event) {
    if (event.target.classList.contains('navigate')) {
        const element = event.target;
        const response = await fetch(element.dataset.url);
        const body = await response.text();

        const insertElement = document.createElement('div');
        insertElement.innerHTML = body;
        element.parentNode.insertBefore(insertElement, element.nextSibling);
    }
    if (event.target.classList.contains('add-association')) {
        const element = event.target;
        const response = await fetch(element.dataset.url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-Token': element.dataset.csrf,
            },
        });
        const body = await response.json();
        alert(body.result + ' ' + body.message);
    }
});
