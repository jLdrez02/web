<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #eaf6e9;
            color: #2e4a2c;
        }
        header {
            background-color: #88b984;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 1.5em;
        }
        .carousel {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            border-radius: 10px;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slide {
            min-width: 100%;
            box-sizing: border-box;
            position: relative;
        }
        .slide img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 10px;
        }
        .caption {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(46, 74, 44, 0.7);
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .login-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 15px;
            background-color: #6fa96a;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
            font-size: 1.1em;
        }
        .login-btn:hover {
            background-color: #4e7a4d;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenidos a la escuelita</h1>
    </header>

    <div class="carousel">
        <div class="slides">
            <div class="slide">
                <img src="https://media.ambito.com/p/ea75b195d66d06accf97df2b6daa053d/adjuntos/239/imagenes/037/645/0037645435/1200x675/smart/aulas-colegio-escuela-clasesjpg.jpg" alt="Aula de clases">
                <div class="caption">Un espacio para aprender y crecer</div>
            </div>
            <div class="slide">
                <img src="https://noticias.unsam.edu.ar/wp-content/uploads/2021/08/escuela.jpg" alt="Pasillo de escuela">
                <div class="caption">Unidos en la educación</div>
            </div>
            <div class="slide">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7mq_yrq_m5Ue0N7Fu-1Oy0-uEaeH2--CSDQ&s" alt="Estudiantes en clase">
                <div class="caption">Preparándonos para el futuro</div>
            </div>
        </div>
    </div>

    <a href="/lista.estudiante" class="login-btn">Iniciar Sesión</a>

    <script>
        let currentIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slide').length;

        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            slides.style.transform = `translateX(-${currentIndex * 100}%)`;
        }, 3000);
    </script>
</body>
</html>
