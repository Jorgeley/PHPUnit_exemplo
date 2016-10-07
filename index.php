<!DOCTYPE html>
<!--
 Este é apenas um simples projeto PHPUnit de exemplo.
 OBS: ainda estou aprendendo essa bagaça, portanto comentários e sugestões
 são bem vindos.
 ---------------------------------------------------------------------------
 This is a simple sample PHPUnit project test
 Tip: I'm still learning this stuff, so comments and suggestions are welcome
 Jorgeley <jorgeley@gmail.com>
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>
            Este é apenas um simples projeto PHPUnit de exemplo.
            OBS: ainda estou aprendendo essa bagaça, portanto comentários e sugestões
            são bem vindos.<br>
            <i>*veja a classe GameTest no diretório tests/PHPUnit_exemplo<hr>
            This is a simple sample PHPUnit project test
            Tip: I'm still learning this stuff, so comments and suggestions are welcome<br>
            <i>*see the GameTest class into dir tests/PHPUnit_exemplo
            <br>author: Jorgeley <a href="mailto:jorgeley@gmail.com">jorgeley@gmail.com</a>
        </p>
        <?php
            require_once 'src/PHPUnit_exemplo/Game.php';
            use PHPUnit_exemplo\Game;
            
            $game = new Game("Beyond Two Souls");
            echo $game->getTitle()."<br>";
            
            $game->setStyle("Aventura");
            echo $game->getStyle()."<br>";
            
            //checking if accept any platform
            try{
                $game->setPlatforms(array("Atari"));
            }catch (Exception $exception){
                echo $exception->getMessage()."<br>";
            }
            
            //checking if accept more platforms than permited
            try{
                $game->setPlatforms(array("PS1", "PS2", "PS3", "PS4", "PS Vita",
                                    "XBox", "XBox 360", "XBox One", 
                                    "PC", "Nintendo*", "Android", "IOS", "IOS"));
            }catch (Exception $exception){
                echo $exception->getMessage()."<br>";
            }
            
            $game->setPlatforms(array("PS3", "PS4", "PC"));
            echo implode(", ", $game->getPlatforms())."<br>";
            
            //checking multiplayer default value
            echo $game->getMultiplayer() ? "Multiplayer" : "Not Multiplayer";
        ?>
    </body>
</html>
