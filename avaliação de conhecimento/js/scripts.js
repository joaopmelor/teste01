const enderecoForm = document.querySelector("#endereco-form");
const cepInput = document.querySelector("#cep");
const ruaInput = document.querySelector("#rua");
const bairroInput = document.querySelector("#bairro");
const estadoInput = document.querySelector("#estado");
const cidadeInput = document.querySelector("#cidade");

const fadeElement = document.querySelector("#hide")

cepInput.addEventListener("keypress", (e) => {
    const onlyNumbers = /[0-9]/;
    const key = String.fromCharCode(e.keyCode);

    console.log(e.keyCode)
    console.log(key)

    if(!onlyNumbers.test(key)) {
        e.preventDefault();
        return;
    }
});

cepInput.addEventListener("keyup", (e) => {
    const inputValue = e.target.value

    if(inputValue.length === 8) {
        getAddress(inputValue);
    }
});

const getAddress = async (cep) => {
    cepInput.blur();

    const apiUrl = `https://viacep.com.br/ws/${cep}/json/`

    const response = await fetch (apiUrl)

    const data = await response.json()

    if(data.erro === "true") {
        enderecoForm.reset()
        // toggleMessage("CEP inválido.")
        return;
    }

    ruaInput.value = data.logradouro;
    bairroInput.value = data.bairro;
    estadoInput.value = data.estado;
    cidadeInput.value = data.localidade;
};

const toggleLoader = () => {
    fadeElement.classList.toggle("hide")
}

// const toggleMessage = (msg) => {
//     const messageElement = document.querySelector("#message")

//     const messageElementText = document.querySelector("#message p")
    
//     messageElementText.innerText = msg

//     fadeElement.classList.toggle("hide")
//     messageElement.classList.toggle("hide")
// }