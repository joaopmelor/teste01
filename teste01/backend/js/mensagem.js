// Função para fechar mensagem
const fecharMensagem = (msg) => {
    const mensagemBackground = document.querySelector("#mensagem-bg");
    const closeButton = document.querySelector("#mensagem-bg button");

    // Verificar se a mensagem de erro está visível
    if (mensagemBackground.style.display === "flex") {
        closeButton.addEventListener("click", () => {
            mensagemBackground.style.display = "none"; // Fechar a mensagem
        });
    }
}

window.onload = () => {
    fecharMensagem();
};

