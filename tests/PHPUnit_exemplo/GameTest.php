<?php
/**
 * Este é apenas um simples projeto PHPUnit de exemplo.
 * OBS: ainda estou aprendendo essa bagaça, portanto comentários e sugestões
 * são bem vindos.
 * ---------------------------------------------------------------------------
 * This is a simple sample PHPUnit project test
 * Tip: I'm still learning this stuff, so comments and suggestions are welcome
 *
 * @author Jorgeley <jorgeley@gmail.com>
 */

namespace PHPUnit_exemplo;

require_once '../src/PHPUnit_exemplo/Game.php';
use PHPUnit_Framework_TestCase;
use PHPUnit_exemplo\Game;
use Exception;

class GameTest extends PHPUnit_Framework_TestCase{
    protected $gameTest;
    
    protected function setUp(){
        $this->gameTest = new Game("The Last of Us");
    }
    
    public function testGameIsStantiated(){
        $this->assertInstanceOf('PHPUnit_exemplo\Game', $this->gameTest);
    }
    
    public function testGetTitle(){
        $this->assertEquals("The Last of Us", $this->gameTest->getTitle());
    }
    
    public function testSetGetStyle(){
        $this->gameTest->setStyle("zombie");
        $this->assertEquals("zombie", $this->gameTest->getStyle());
    }
    
    /**
     * @expectedException Exception
     * o array $platforms não pode ser maior que o array Game::VALID_PLATFORMS
     * -----------------------------------------------------------------------
     * the $platforms array must no be larger than Game::VALID_PLATFORMS array
     */
    public function testArrayPlatformsMustNotBeLargerThanClassArrayPlatform(){
        $platforms = array( "PS1", "PS2", "PS3", "PS4", "PS Vita",
                            "XBox", "XBox 360", "XBox One", 
                            "PC", "Nintendo*", "Android", "IOS", 
                            "One More To Force Error");
        $this->gameTest->setPlatforms($platforms);
    }
    
    /**
     * @expectedException Exception
     * o array $platforms deve conter somente os ítens de Game::VALID_PLATFORMS
     * ---------------------------------------------------------------------------
     * the $platforms array must contain only the itens from Game::VALID_PLATFORMS
     */
    public function testArrayPlatformsMustContainOnlyItensFromClassArrayPlatforms(){
        $platforms = array( "this item is not valid" );
        $this->gameTest->setPlatforms($platforms);
    }
    
    /**
     * @expectedException Exception
     * o array $platforms só pode conter valores string, não há necessidade de
     * fazer esse teste, pois o teste anterior 'testArrayPlatformsMustContainOnlyItensFromClassArrayPlatforms'
     * já faz esse trabalho
     * ------------------------------------------------------------------------------------------------------
     * the $platforms array must contain only string values, there is no need to do
     * this test, due to the prior test 'testArrayPlatformsMustContainOnlyItensFromClassArrayPlatforms'
     * already do this job
     */
    public function testArrayPlatformsMustContainOnlyStrings(){
        $this->markTestSkipped("there is no need do to this test, the prior test "
                . "'testArrayPlatformsMustContainOnlyItensFromClassArrayPlatforms'"
                . "do the job");
    }
    
    public function testSetGetPlatforms(){
        $plaftorms = array("PS3", "PS4", "PC");
        $this->gameTest->setPlatforms($plaftorms);
        $this->assertEquals($plaftorms, $this->gameTest->getPlatforms());
    }
    
    public function testInitialMultiplayerIsTrue(){
        $this->assertTrue($this->gameTest->getMultiplayer());
    }
    
    public function testMultiplayerIsSetted(){
        $this->gameTest->setMultiplayer(false);
        $this->assertFalse($this->gameTest->getMultiplayer());
    }
    
}