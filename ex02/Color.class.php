<?php

class	Color{
	public $red;
	public $green;
	public $blue;
	static $verbose = FALSE;

	function	__construct($array)
	{
		if (array_key_exists('rgb', $array) && count($array) == 1)
		{
			$this->red = intval($array['rgb'] & 0xff);
			$this->green = intval(($array['rgb'] & 0xff00) >> 8);
			$this->blue = intval(($array['rgb'] & 0xff0000) >> 16);
		}
		else
		{
			if (array_key_exists('red', $array))
				$this->red = intval($array['red']);
			else
				$this->red = 255;
			if (array_key_exists('green', $array))
				$this->green = intval($array['green']);
			else
				$this->green = 255;
			if (array_key_exists('blue', $array))
				$this->blue = intval($array['blue']);
			else
				$this->blue = 255;
		}
		if (self::$verbose)
			echo $this." constructed.\n";
		return;
	}
	function	add(Color $instance)
	{
		if (!(isset($instance)))
		{
			echo "Error addition can't be done. (Parameter missing)\n";
			return ;
		}
		$c = new Color(array(
			'red' => $this->red + $instance->red,
			'green' => $this->green + $instance->green,
			'blue' => $this->blue + $instance->blue
		));
		return ($c);
	}

	function	sub(Color $instance)
	{
		if (!(isset($instance)))
		{
			echo "Error sub can't be done. (Parameter missing)\n";
			return ;
		}
		$c = new Color(array(
			'red' => $this->red - $instance->red,
			'green' => $this->green - $instance->green,
			'blue' => $this->blue - $instance->blue
		));
		return ($c);
	}
	function	mult($val)
	{
		if (!(isset($val)))
		{
			echo "Error mult can't be done. (Parameter missing)\n";
			return ;
		}
		$c = new Color(array(
			'red' => $this->red * $val,
			'green' => $this->green * $val,
			'blue' => $this->blue * $val
		));
		return ($c);
	}
	function	__toString()
	{
		return "Color( red: $this->red, green: $this->green, blue: $this->blue )";
	}
	function	__destruct()
	{
		if (self::$verbose)
			echo $this." destructed.\n";
		return;
	}
	static function		doc()
	{
		if (file_exists("Color.doc.txt"))
			echo file_get_contents("Color.doc.txt");
		else
			echo "No doc.\n";
	}
}

?>
