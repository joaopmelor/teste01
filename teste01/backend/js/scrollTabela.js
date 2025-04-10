// Função para rolar até a tabela
function scrollToTable() {
    const table = document.querySelector("#table-bg");
    if (table) {
        // Rolagem suave
        table.scrollIntoView({ behavior: "smooth" });
    }
}

// Verificar se a tabela foi gerada na página
window.onload = function() {
    const tableExists = document.querySelector("#table-bg");
    if (tableExists) {
        scrollToTable();
    }
};