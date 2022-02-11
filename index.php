<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpet</title>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <header>
        <div class="logo-place"><img src="assets/logo.png"></div>
        <div class="search-place">
            <input class="search-place" type="text" id="idbusqueda" placeholder="Busca el reloj de tus sueños">
            <button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <div class="options-place">
            <div class="item-option" title="Registrarse"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
            <div class="item-option" title="Iniciar sesion"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
            <div class="item-option" title="Carrito de compras"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
        </div>
    </header>
    <div class="main-content">
        <div class="content-page">
            <div class="title-section">Productos destacados</div>
            <div class="product-list" id="space-list">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url:'servicios/producto/get_all_products.php',
                type: 'POST',
                data:{},
                success: function(data){
                    let html='';
                    console.log(data)
                    for(var i = 0; i < data.datos.length; i++){
                        html+=
                        '<div class="product-box">'+
                            '<a href="producto.php?p=' + data.datos[i].codpro + '">'+
                                '<div class="product">'+
                                    '<img src="' + data.datos[i].rutimapro +'">'+
                                    '<div class="detail-title">' + data.datos[i].nompro +'</div>'+
                                    '<div class="detail-description">' + data.datos[i].despro +'</div>'+
                                    '<div class="detail-price">' + formato_precio(data.datos[i].prepro) +'</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>';
                    }
                    document.getElementById("space-list").innerHTML=html;
                },
                error:function(err){
                    console.error(err)
                }
            });
        });
        function formato_precio(valor){
            let $valor = valor.toString();
            let array = $valor.split(".");
            return "S/. " + array[0] + ".<span>" + array[1] + "</span>";
        }
    </script>
</body>
</html>