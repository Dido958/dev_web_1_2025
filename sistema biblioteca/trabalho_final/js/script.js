const API = "http://localhost/php/projeto_final/controller/";


function login() {
    fetch(API + "LoginController.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        credentials: "same-origin",
        body: JSON.stringify({
            email: email.value,
            senha: senha.value
        })
    })
    .then(res => res.text()) // ⬅️ IMPORTANTE PARA DEBUG
    .then(txt => {
        console.log("RESPOSTA CRUA:", txt);

        const data = JSON.parse(txt);

        if (data.status === "ok") {
            window.location.href = "dashboard.html";
        } else {
            alert("Login inválido");
        }
    })
    .catch(err => console.error(err));
}


// ===== USUÁRIOS =====
function criarUsuario() {
    fetch(API + "UsuarioController.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            nome: nome.value,
            email: emailUser.value,
            senha: senhaUser.value
        })
    }).then(() => listarUsuarios());
}

function listarUsuarios() {
    const listaUsuarios = document.getElementById("listaUsuarios");
    if (!listaUsuarios) return;

    fetch(API + "UsuarioController.php", {
        credentials: "same-origin"
    })
    .then(res => res.json())
    .then(data => {
        listaUsuarios.innerHTML = "";

        data.forEach(usuario => {
            listaUsuarios.innerHTML += `
                <li>
                    ${usuario.nome} - ${usuario.email}
                </li>
            `;
        });
    })
    .catch(err => console.error(err));
}


function deletarUsuario(id) {
    fetch(API + "UsuarioController.php", {
        method: "DELETE",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({id})
    }).then(() => listarUsuarios());
}

// ===== LIVROS =====
function criarLivro() {
    fetch(API + "LivroController.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            titulo: titulo.value,
            autor: autor.value,
            ano: ano.value
        })
    }).then(() => listarLivros());
}

function listarLivros() {
    const listaLivros = document.getElementById("listaLivros");
    if (!listaLivros) return;

    fetch(API + "LivroController.php", {
        credentials: "same-origin"
    })
    .then(res => res.json())
    .then(data => {
        listaLivros.innerHTML = "";

        data.forEach(livro => {
            listaLivros.innerHTML += `
                <li>
                    ${livro.titulo} - ${livro.autor}
                </li>
            `;
        });
    })
    .catch(err => console.error(err));
}



function deletarLivro(id) {
    fetch(API + "LivroController.php", {
        method: "DELETE",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({id})
    }).then(() => listarLivros());
}

function logout() {
    fetch(API + "LogoutController.php")
        .then(() => window.location = "index.html");
}

function editarUsuario(id) {
    const nomeNovo = prompt("Novo nome:");
    const emailNovo = prompt("Novo email:");

    fetch(API + "UsuarioController.php", {
        method: "PUT",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({ id, nome: nomeNovo, email: emailNovo })
    }).then(() => listarUsuarios());
}

function editarLivro(id) {
    const tituloNovo = prompt("Novo título:");
    const autorNovo = prompt("Novo autor:");
    const anoNovo = prompt("Novo ano:");

    fetch(API + "LivroController.php", {
        method: "PUT",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            id,
            titulo: tituloNovo,
            autor: autorNovo,
            ano: anoNovo
        })
    }).then(() => listarLivros());
}

function carregarRelatorio() {
    fetch(API + "RelatorioController.php")
        .then(r => r.json())
        .then(dados => {
            relatorio.innerHTML = "";
            dados.forEach(r => {
                relatorio.innerHTML += `
                <li>${r.autor}: ${r.total} livros</li>
                `;
            });
        });
}

// Só executa no dashboard
document.addEventListener("DOMContentLoaded", () => {

    if (document.getElementById("listaUsuarios")) {
        listarUsuarios();
    }

    if (document.getElementById("listaLivros")) {
        listarLivros();
    }

});
