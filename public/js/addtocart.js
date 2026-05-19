document.addEventListener('click', function(e) {
    if (e.target.closest('.add-to-cart-btn')) {
        e.preventDefault();
        e.stopPropagation();
        
        const btn = e.target.closest('.add-to-cart-btn');
        const productId = btn.dataset.productId;
        const csrfToken = btn.dataset.csrf;
        
        fetch(`/add-to-cart/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                quantity: 1,
                source: 'home'
            })
        })
        .then(res => {
            if (res.status === 401) {
                showNotification('Login Required to add this product to the cart','error');
                setTimeout(() => {
                    window.location.href = "/login";
                }, 2500);
                return null;
            }
            return res.json();
        })
        .then(data => {
            if (!data) return;
            if (data.success) {
                // Show success message
                showNotification(data.message);
            }
        })
        .catch(err => {
            console.error('Error:', err);
            showNotification('Error adding to cart', 'error');
        });
    }
});

function showNotification(message, type = 'success') {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert ${alertClass}`;
    alertDiv.textContent = message;

    document.body.appendChild(alertDiv);
    
    setTimeout(() => {
        alertDiv.remove();
    }, 3000);
}
