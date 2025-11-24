<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lanchonete Sabor & Arte</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #111;
    }
    header {
      background: #000;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    nav {
      background: #ff0000;
      padding: 10px;
      text-align: center;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }
    .hero {
position: relative;
background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('https://www.assai.com.br/sites/default/files/blog/shutterstock_1924461281.jpg') center/cover;
height: 300px;
display: flex;
align-items: center;
justify-content: center;
color: white;
font-size: 3rem;
font-weight: bold;
text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
padding-top: 150px;
}
    .container {
      padding: 40px 20px;
      max-width: 1100px;
      margin: auto;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #ffcc00;
    }
    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }
    .card {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      text-align: center;
      border: 2px solid #ff0000;
    }
    .card img {
      width: 100%;
      height: 170px;
      object-fit: cover;
      border-radius: 10px;
    }
    footer {
      background: #000;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
      border-top: 3px solid #ffcc00;
    }
  
    @media (max-width: 600px) {
      .card { padding: 10px; }
      .card img { height: 100px; }
      .card h3 { font-size: 1rem; }
      .card p { font-size: 0.85rem; }

      header h1 { font-size: 1.6rem; }
      nav a { display: inline-block; margin: 8px; font-size: 0.9rem; }
      .hero { height: 200px; font-size: 1.8rem; padding: 0 10px; text-align: center; }
      .container { padding: 20px 10px; }
      .card img { height: 130px; }
    }
      /* Hover Effects */
    nav a:hover {
      color: #ffcc00;
      text-shadow: 0 0 8px #ffcc00;
    }

    .card:hover {
      transform: scale(1.05);
      transition: 0.3s ease;
      box-shadow: 0 6px 15px rgba(255,0,0,0.4);
      border-color: #ffcc00;
    }

    button:hover, .btn:hover {
      background: #ff0000;
      color: #fff;
      transition: 0.3s ease;
    }

  </style>
</head>
<body>
  <header>
    <h1>Lanchonete Sabor & Arte</h1>
  </header>

  <nav>
    <a href="#home">Home</a>
    <a href="#cardapio">Cardápio</a>
    <a href="#contato">Contato</a>
  </nav>

  <section class="hero" id="home">
    Os melhores lanches da cidade!
  </section>

  <section class="container" id="cardapio">
    <h2>Cardápio</h2>
    <div class="card-grid">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1601050690597-df4f0c2516c2" />
        <h3>X-Burguer</h3>
        <p>Pão, hambúrguer, queijo e molho especial.</p>
      </div>
      <div class="card">
        <img src="https://images.unsplash.com/photo-1607013409024-9b23986f93ef" />
        <h3>X-Salada</h3>
        <p>Hambúrguer com alface, tomate e maionese.</p>
      </div>
      <div class="card">
        <img src="https://images.unsplash.com/photo-1606756365229-4c2f11e8f302" />
        <h3>Batata Frita</h3>
        <p>Crocantes e deliciosas!</p>
      </div>
    </div>
  </section>

  <footer id="contato">
    <p>Endereço: Rua Central, 123 - Centro</p>
    <p>Telefone: (00) 90000-0000</p>
    <p>© 2025 Lanchonete Sabor & Arte</p>
  </footer>

</body>
</html>
