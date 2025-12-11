function mostrarMensagem(texto, classe) {
    const chat = document.getElementById("chat");

    const p = document.createElement("p");

    p.className = classe;

    p.textContent = texto;

    chat.appendChild(p);

    chat.scrollTop = chat.scrollHeight;
}

function enviarMensagem() {
    const msg = document.getElementById("campoMensagem").value;

    if (msg.trim() === "") return;

    mostrarMensagem("Você :" + msg, "mensagem-user" );

    document.getElementById("campoMensagem").value = "";

    fetch("php.php", {
        method: "POST",

        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },

        body: "mensagem=" + encodeURIComponent(msg)
    })

    .then(res => res.json())

    .then(data => {
        mostrarMensagem("ChatBot: " + data.resposta, "mensagem-bot");
    })

    .catch(() => {
        mostrarMensagem("chatBot: ❌ Erro ao se conectar ao servidor.", "mensagem-bot");
    });
}

function limparChat() {

document.getElementById ("chat").innerHTML = "";

}
// Tamanho inicial da fonte

let tamanhoFonte = 16; // você pode mudar se quiser

//Aumenta a fonte

function aumentarFonte() {

tamanhoFonte += 2; // aumenta 2px

document.getElementById("chat").style.fontSize

tamanhoFonte

"px";
}

// Diminui a fonte

function diminuirFonte() {

tamanhoFonte -= 2; // diminui 2px

if (tamanhoFonte < 10) tamanhoFonte = 10; // mínimo recomendado

document.getElementById("chat").style.fontSize = tamanhoFonte +

"px";
}