   
   <div class="contem-todo"><div class="conten-img">

            <img class="candado"  src="./imagenes/candado.png" alt="">
            <img class="policia" src="./imagenes/policia1.png" alt="">
            
    </div>

<div class="conte_text">
    <h1>
        403
    </h1>
    <p>Acceso denegado</p>
    <div class="btn">
    <button><a href="index.php">regresar al inicio</a> </button>

</div>
</div>


<style>
     @import url('https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display:wght@700&family=Overpass:wght@300;600&family=Ubuntu:wght@400;500;700&display=swap');
     
     
     body{
             margin: 0;
            padding: 0;
            background-color: rgb(105, 124, 133);
            font-family: 'Big Shoulders Stencil Display', sans-serif;
     }
     .contem-todo{
        display: flex;
     }
     .conten-img{
        width: 50%;
        height: 100vh;
 
       
     }
     .candado{
        width:12% ;
        position: absolute;
        margin-left: 10vw;
        margin-top: 5vw;
        z-index: 100;
     }
     .policia{
        width:22% ;
        position: absolute;
       
        margin-left: 22vw;

     }
     .stop{
        width:30% ;
        margin-left: 15vw;
        margin-top: 15vw;
        position: absolute;
     }
     h1{
            margin: auto;
            font-size: 20vw;
            margin-top: -15vw;
            margin-right:15vw ;
            color: white;    
        }
        p{
            margin: auto;
            font-size: 2vw;
            margin-top: -4vw;
            margin-right:23vw ;
            color:white;
        }
        .conte_text{
            margin: auto;
            width: 100%;
            text-align: end;
            justify-content: center;
            height:100%;
        }
        button{
            margin: auto;
            font-size: 1.5vw;
            margin-top: 2vw;
            margin-right: 19vw;
            background-color: black;
            padding: 1vw 5vw; 
            border-radius: 3vw;
            border: none;z-index: 100;
            cursor: pointer;
            transition: all 300ms;
        }       
        button:hover a{
            color: black;
            transition: all 300ms;
        }
        button:hover {
            color: black;
            background-color: white;
            transition: all 300ms;
        }
        a{
            text-decoration: none;
            color: white;
            transition: all 300ms;
            font-family:'Big Shoulders Stencil Display', sans-serif;
        }
</style>