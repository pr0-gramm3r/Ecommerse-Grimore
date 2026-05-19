{
    const container = document.querySelector('.container');
    const buyButtons = document.querySelectorAll(".btn1");
    const msgText = "This function isn't implemented yet.";

    buyButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            container.style.display = container.style.display === 'none' ? 'block' : 'none';

            // Create or update a message element instead of wiping body
            let msgEl = document.getElementById('buy-msg');
            if (!msgEl) {
                msgEl = document.createElement('p');
                msgEl.id = 'buy-msg';
                document.body.appendChild(msgEl);
            }

            msgEl.textContent = msgText;
            msgEl.style.color = "white";
            msgEl.style.display = "flex";
            msgEl.style.alignItems = "center";
            msgEl.style.justifyContent = "center";
            msgEl.style.fontSize = "80px"; // 200px would be huge
        });
    });
}