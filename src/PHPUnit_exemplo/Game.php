<?php
namespace PHPUnit_exemplo;

use Exception;

class Game {
    private $title;
    private $style;
    private $platforms;
    private $multiplayer = true;
    const VALID_PLATFORMS = array(  "PS1", "PS2", "PS3", "PS4", "PS Vita",
                                    "XBox", "XBox 360", "XBox One", 
                                    "PC", "Nintendo*", "Android", "IOS");
    
    public function __construct(string $title){
        $this->title = $title;
    }
    
    function getTitle() : string{
        return $this->title;
    }

    function getStyle() : string{
        return $this->style;
    }

    function getPlatforms() :array{
        return $this->platforms;
    }

    function getMultiplayer() :bool{
        return $this->multiplayer;
    }

    function setTitle(string $title) {
        $this->title = $title;
    }

    function setStyle(string $style) {
        $this->style = $style;
    }

    function setPlatforms(array $platforms) {
        //check if $platforms is large than VALID_PLATFORMS
        if ( count($platforms) > count(self::VALID_PLATFORMS) )
            throw new Exception("So much platforms!");
        //check if $platformns contains invalid value
        elseif ( count(array_diff($platforms, self::VALID_PLATFORMS)) > 0 )
                throw new Exception("One or more of the platforms are invalid!\n"
                        . "Accepted platforms: ".implode(", ", self::VALID_PLATFORMS));
            else
                $this->platforms = $platforms;
    }

    function setMultiplayer(bool $multiplayer) {
        $this->multiplayer = $multiplayer;
    }

}