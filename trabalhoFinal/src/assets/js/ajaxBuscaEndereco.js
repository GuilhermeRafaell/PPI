window.onload = function () {
  const inputCep = document.getElementById("cep");
  inputCep.onkeyup = () => buscaEndereco(inputCep.value);
}

async function buscaEndereco(cep) {
  if (cep.length !== 9) return;
  let form = document.querySelector("form");

  try {
    const response = await fetch(`../../web/php/buscaEndereco.php?cep=${cep}`);

    if (!response.ok) {
      throw new Error(response.status);
    }

    const endereco = await response.json();
    form.rua.value = endereco.rua;
    form.bairro.value = endereco.bairro;
    form.cidade.value = endereco.cidade;
    form.estado.value = endereco.estado;
  } catch (error) {
    //form.reset();
    console.error('Falha inesperada: ' + error);
  }
}