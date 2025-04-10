// Receber valores do formulário de cadastro
const enderecoForm = document.querySelector("#endereco-form");
const cepInput = document.querySelector("#cep");
const ruaInput = document.querySelector("#rua");
const bairroInput = document.querySelector("#bairro");
const estadoInput = document.querySelector("#estado");
const cidadeInput = document.querySelector("#cidade");

// Receber valor digitado
cepInput.addEventListener("keyup", (e) => {
    const inputValue = e.target.value

    if(inputValue.length === 9) {
        getAddress(inputValue);
    }

    // Reabilitar campos quando cepInput estiver vazio
    if (cepInput.value === "") {
        enableAddressFields();
    }
});

// Retornar CEP com API
const getAddress = async (cep) => {
    cepInput.blur();

    const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

    const response = await fetch (apiUrl);

    const data = await response.json();

    // Resetar formulário
    if(data.erro === "true") {
        enderecoForm.reset();

        // Exibir mensagem de CEP inválido
        toggleMessage();

        // Reabilitar campos quando formulário resetar
        enableAddressFields();
        
        return;
    }

    // Preencher formulário com valores da API
    ruaInput.value = data.logradouro;
    bairroInput.value = data.bairro;
    estadoInput.value = data.estado;
    cidadeInput.value = data.localidade;

    // Desabilitar campos após formulário receber valores da API
    disableAddressFields();
};

// Função para desabilitar campos
const disableAddressFields = () => {
    ruaInput.setAttribute("readonly", "true");
    bairroInput.setAttribute("readonly", "true");
    estadoInput.setAttribute("readonly", "true");
    cidadeInput.setAttribute("readonly", "true");
};

// Função para habilitar campos
const enableAddressFields = () => {
    ruaInput.removeAttribute("readonly");
    bairroInput.removeAttribute("readonly");
    estadoInput.removeAttribute("readonly");
    cidadeInput.removeAttribute("readonly");
};

// Função para exibir e fechar mensagem de CEP inválido
const toggleMessage = (msg) => {
    const mensagemBackground = document.querySelector("#mensagem-bg");

    // Exibir mensagem
    mensagemBackground.style.display = "flex";

    // Fechar mensagem
    const closeButton = document.querySelector("#mensagem-bg button");
    closeButton.addEventListener("click", () => {
        mensagemBackground.style.display = "none";
    });
}