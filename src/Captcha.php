<?php

namespace Captcha3D;

use Symfony\Component\Process\ProcessBuilder;

class Captcha
{
    protected $executable;
    protected $string;
    protected $width;
    protected $height;
    protected $file;
    
    public function __construct($executable)
    {
        $this->executable = $executable;
    }
    
    public function setString($string)
    {
        $this->string = $string;
        
        return $this;
    }
    
    public function setWidth($width)
    {
        $this->width = $width;
        
        return $this;
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
        
        return $this;
    }
    
    public function setFile($file)
    {
        $this->file = $file;
        
        return $this;
    }

    public function run()
    {
        $builder = new ProcessBuilder();
        $args = [];
        
        foreach (['string', 'width', 'height', 'file'] as $arg) {
            if (null !== $this->$arg) {
                $args[] = sprintf('--%s=%s', $arg, $this->$arg);
            }
        }
        
        return $builder->setPrefix($this->executable)
            ->setArguments($args)
            ->getProcess()
            ->run();
    }
}