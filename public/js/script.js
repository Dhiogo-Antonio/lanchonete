function abrirModal(nome, descricao, preco, imagem, id) {
    const modal = document.getElementById('modal');

    modal.style.display = 'block';

    document.getElementById('modal-nome').innerText = nome;
    document.getElementById('modal-desc').innerText = descricao;
    document.getElementById('modal-preco').innerText = 'R$ ' + preco;
    document.getElementById('modal-img').src = imagem;
    document.getElementById('modal-produto-id').value = id;
}

function fecharModal() {
    document.getElementById('modal').style.display = 'none';
}


window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};  