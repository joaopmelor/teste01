// Formatar CPF enquanto é digitado
function formatCPF(input) {
    let cpf = input.value.replace(/\D/g, ''); // Remover todos os caracteres não numéricos
    
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adicionar o primeiro ponto
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adicionar o segundo ponto
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adicionar o traço

    input.value = cpf;
}

// Formatar telefone enquanto é digitado
function formatTelefone(input) {
    let telefone = input.value.replace(/\D/g, ''); // Remover todos os caracteres não numéricos

    telefone = telefone.replace(/^(\d{2})(\d)/, '($1)$2'); // Adicionar o DDD
    telefone = telefone.replace(/(\d{5})(\d)/, '$1-$2'); // Adicionar o traço após o 5º dígito

    input.value = telefone;
}

// Formatar CEP enquanto é digitado
function formatCEP(input) {
    let cep = input.value.replace(/\D/g, ''); // Remover todos os caracteres não numéricos
    
    cep = cep.replace(/(\d{5})(\d)/, '$1-$2'); // Adicionar o traço
    
    input.value = cep;
}