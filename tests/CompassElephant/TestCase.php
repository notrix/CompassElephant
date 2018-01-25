<?php

/**
 * This file is part of the GitElephant package.
 *
 * (c) Matteo Giachino <matteog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Just for fun...
 */

namespace CompassElephant;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var \CompassElephant\CompassProject
     */
    private $compassProject;

    /**
     * Project initialization
     */
    public function initProject()
    {
        $tempDir = realpath(sys_get_temp_dir()).'compass_elephant_'.md5(uniqid(rand(),1));
        mkdir($tempDir);
        $tempName = tempnam($tempDir, 'compass_elephant');
        $this->path = $tempName;
        unlink($this->path);
        mkdir($this->path);
        $this->compassProject = new CompassProject($this->path);
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return \CompassElephant\CompassBinary
     */
    public function getBinary()
    {
        return $this->compassProject->getCompassBinary();
    }

    /**
     * @return \CompassElephant\CommandCaller
     */
    public function getCommandCaller()
    {
        return $this->getCompassProject()->getCommandCaller();
    }

    /**
     * @return \CompassElephant\CompassProject
     */
    public function getCompassProject()
    {
        return $this->compassProject;
    }

    /**
     * @param string $style
     */
    protected function writeStyle($style)
    {
        sleep(1.1);
        $handle = fopen($this->getPath().'/sass/screen.scss', 'w');
        fwrite($handle, PHP_EOL.$style.PHP_EOL);
        fclose($handle);
    }
}
