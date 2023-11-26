
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
   
 <img class="img" src="./imagenes/pato-detective.jpeg" alt="">
    <div class="conte_text">
    <h1>
        404
    </h1>
    <p>los sentimos ruta no encontrada</p>
    <div class="btn">
    <button><a href="index.php"> regresar al inicio</a > </button>
    <img class="extencion" src="./imagenes/extencion.png" alt="">

</div>
<style>

  @import url('https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display:wght@700&family=Overpass:wght@300;600&family=Ubuntu:wght@400;500;700&display=swap');

        body{
            margin: 0;
            padding: 0;
            background-color: rgb(105, 124, 133);
            font-family: 'Big Shoulders Stencil Display', sans-serif;
            /* font-family: 'Overpass', sans-serif;
            font-family: 'Ubuntu', sans-serif; */
            overflow: hidden;
        }
        h1{
            margin: auto;
            font-size: 20vw;
            margin-top: -47vw;
            margin-right:18vw ;
            color: white;    
        }
        p{
            margin: auto;
            font-size: 2vw;
            margin-top: -4vw;
            margin-right:20vw ;
            color: white;
        }
        .conte_text{
            margin: auto;
            width: 100%;
            text-align: end;
            justify-content: center;
            height:100%;
        }
        .img{
            width: 36%;
        }  
        button{
            margin: auto;
            font-size: 1vw;
            margin-top: 2vw;
            margin-right: 23vw;
            color: white;
            padding: 1vw 5vw; 
            border-radius: 3vw;
            border: none;z-index: 100;
            cursor: pointer;
            transition: all 300ms;
        }       
        button:hover {
            color: white;
            background-color: rgb(105, 136, 136);
            transition: all 300ms;
        }
        a{
            text-decoration: none;
            color: rgb(0, 0, 0);
            background-color: none;
        }
        .extencion{
            width: 60%;
            margin-top: 5vw;
            float: right;
             margin-left: 40vw;
             margin-top: -15vw;
            
        }
        .btn{
            display: flex;
            flex-direction: column;
        }
</style>
    
</body>
</html>
