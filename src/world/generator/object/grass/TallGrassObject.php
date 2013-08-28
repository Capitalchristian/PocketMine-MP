<?php

/*

           -
         /   \
      /         \
   /   PocketMine  \
/          MP         \
|\     @shoghicp     /|
|.   \           /   .|
| ..     \   /     .. |
|    ..    |    ..    |
|       .. | ..       |
\          |          /
   \       |       /
      \    |    /
         \ | /

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.


*/


class TallGrassObject{
	public static function growGrass(Level $level, Vector3 $pos, Random $random, $count = 15){
		$arr = array(
			array(DANDELION, 0),
			array(CYAN_FLOWER, 0),
			array(TALL_GRASS, 1),
			array(TALL_GRASS, 1),
			array(TALL_GRASS, 1),
			array(TALL_GRASS, 1),
			array(AIR, 0),
		);
		$radius = ceil(sqrt($count) / 2);
		for($c = 0; $c < $count; ++$c){
			$x = $random->nextRange($pos->x - $radius, $pos->x + $radius);
			$z = $random->nextRange($pos->z - $radius, $pos->z + $radius);
			$b = $level->getBlock(new Vector3($x, $pos->y + 1, $z));
			$d = $level->getBlock(new Vector3($x, $pos->y, $z));
			if($b->getID() === AIR and $d->getID() === GRASS){
				$t = $arr[$random->nextRange(0, count($arr) - 1)];
				$level->setBlockRaw($b, BlockAPI::get($t[0], $t[1]));
			}
		}
	}
}