const express = require('express');
const app = express();
const port = 3000;

let messages = [];

app.use(express.static('public')); // Sirve archivos estáticos

app.use(express.json());

app.post('/send-message', (req, res) => {
    const { message } = req.body;
    messages.push(message);
    res.json({ message });
});

app.get('/get-messages', (req, res) => {
    res.json({ messages });
});

app.listen(port, () => {
    console.log(`Servidor escuchando en http://localhost:${port}`);
});
