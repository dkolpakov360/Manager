<?php

namespace Manager;

class Manager
{
	public function place($item)
	{
		//$parent = get_parent_class($item);
		
		if ( $item instanceof Papers ) {
			echo 'Положил ' . get_class($item) . ' на стол';
		} elseif ( $item instanceof Instrument ) {
			echo 'Убрал ' . get_class($item) . ' внутрь стола';
		} else {
			echo 'Выкинул ' . get_class($item) . ' в корзину';
		}
			
		echo '<hr>';
	}
}