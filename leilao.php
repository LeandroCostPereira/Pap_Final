<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leilao</title>
    <link rel="shortcut icon" type="image/x.png" href="Imagens/Background-Recuperado.png"/>
    <link rel="stylesheet" href="Style.css" type="text/css">
    <link rel="stylesheet" href="Style_Colors.css" type="text/css">
</head>

<body> 
    <div class="menu">
        <ul id="list">
            <li class="item"><a href="index.html" class="link">Inicio</a></li>
            <li class="item"><a href="quem_somos.html" class="link">Quem somos</a></li>
            <li class="item"><a href="contacto.html" class="link">Contactos</a></li>
            <li class="item"><a href="leilao.php" class="link">Leilão</a></li>
            <li class="item"><a href="iniciar_sessao.html" class="link">Iniciar Sessão</a></li>
        </ul>
        <img src="Imagens/nome.png" alt="logo da empresa TransAuction" class="img1">
    </div>
        <p class="text3">
            Nesta pagina poderá encontrar uma lista de produtos onde são leiloados para se <br>
            poder fazer o transporte dos mesmos. <br>
            Contudo para poder fazer a sua locitação terá de <a href="iniciar_sessao.html" class="cor url">iniciar a sessao</a>.<br>
        </p>
        <p class="text4">Como fonciona? <br> </p>
        <div class="produtos" style="margin-top:5%;">
           
            <table class="Tab">
                <?php 
                include('php/conexao.php');
                $rec_limit = 5;
                $sql = " SELECT * FROM produtos LIMIT $rec_limit;";
                
                $rest = mysqli_query($conexao, $sql);
               
                if (mysqli_num_rows($rest) == true){ ?>

                <tr>
                    <th class="tab">Produto</th>
                    <th class="tab">Peso</th>
                </tr>
                <?php
                for ($i=0; $i < $row = mysqli_fetch_assoc($rest); $i++) { 
                    $produto = $row['Produto'];
                    $peso = $row['peso'];     
                ?>
                <tr>
                    <td ><?php echo $produto?></td>
                    <td ><?php echo $peso;?></td>
                </tr>
                
                <?php  
                  } 
                }else{
                    echo("<img src='../Imagens/triste.png' width='20%' class='img9'><br>
                   <h3 class='Text87'>Não tem produtos na sua conta.<br>
                   Vá a adicionar, e preencha os campos referidos.</h3>");
                }
                ?>
            </table>
        </div>
      <!-- rodape -->
    <div class="rodape">
        <div class="Direita">
            <p>Sigam nos em:</p><br>
            <a href="https://www.facebook.com/TransAuctionLda-108867900869630/?view_public_for=108867900869630" class="url cor" > FaceBook</a>
            <a href="https://www.instagram.com/transauction5/" class="url cor" > Instagram</a>
            <a href="https://twitter.com/LdaTrans" class="url cor" > Twitter</a>
        </div>
        <div class="centro">   
            <p>A nossa app está disponivel para:</p>
            <h5><a href="#4" class="url cor" >Android</a></h5>
            <h5><a href="#5" class="url cor" >IOS</a></h5> 
        </div>
        <div class="esquerda"> 
            <p><a href="#6" class="url cor" > Direitos de Autor</a></p>
        </div>
    </div> 
    <!-- fim rodape -->    
</body>
</html>