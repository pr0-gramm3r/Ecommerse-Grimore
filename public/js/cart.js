let debounceTimer;

document.addEventListener('input', function (e) {
    if (e.target.name === 'quantity') {

        let input = e.target;
        let quantity = input.value;

        // Try to get item id from a parent element
        let itemId = input.closest('[data-id]')?.dataset.id;

        // enforce limits manually
        if (quantity < 1) quantity = 1;
        if (quantity > 20) quantity = 20;


        if (!itemId) {
            console.error('Item ID not found');
            return;
        }

        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(() => {
        input.value = quantity;

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/cart/update/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(res => res.json())
            .then(data => console.log('Updated'))
            .catch(err => console.error(err));
        }, 1000);
    }
});
