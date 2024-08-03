document.getElementById('send-button').addEventListener('click', () => {
    const message = document.getElementById('message-input').value;
    fetch('/send-message', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ message }),
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('messages').innerHTML += `<div>${data.message}</div>`;
        document.getElementById('message-input').value = '';
    });
});

function loadMessages() {
    fetch('/get-messages')
        .then(response => response.json())
        .then(data => {
            const messagesDiv = document.getElementById('messages');
            messagesDiv.innerHTML = '';
            data.messages.forEach(msg => {
                messagesDiv.innerHTML += `<div>${msg}</div>`;
            });
        });
}

setInterval(loadMessages, 5000); // Actualiza los mensajes cada 5 segundos
