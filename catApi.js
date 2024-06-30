// Conexión a API

const main = document.getElementById("mainApi");

const endPoint = "https://api.thecatapi.com/v1/images/search?limit=10";

const obtenerGatitos = async () => {
    try {
        const res = await fetch(endPoint);
        const data = await res.json();
        console.log(data);

        data.forEach(unGatito => {
            main.innerHTML += `
                <img src=${unGatito.url} width="200px">
            `
        });
    } catch {
        alert("Lo sentimos, ocurrió un error");
    }
    
}

obtenerGatitos();