<?php include("template/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sopa de letras</title>
  
    
    <link rel="stylesheet" type="text/css" href="css/crus.css">
    <script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
    <script type="text/javascript" src="wordfind.js"></script> 
    <script type="text/javascript" src="wordfindgame.js"></script> 
</head>
<body>

    <div id='juego'></div>
    <div id='Palabras'></div>
    
    <script>
    var words = ['Realidad','Virtual','Fibra','Carbono','Impulsos','Electromagneticos'];
    var gamePuzzle = wordfindgame.create(words, '#juego', '#Palabras'); 
        
    var puzzle = wordfind.newPuzzle(words,{height: 18, width:18, fillBlanks: false});
    wordfind.print(puzzle);   
        
    </script>
    <button>Finalizar</button>
    
</body>
</html>