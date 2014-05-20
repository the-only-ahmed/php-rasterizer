<?php

require_once 'Color.class.php';

class	Vertex{
	private $_x = 0.00;
	private $_y = 0.00;
	private $_z = 0.00;
	private $_w = 1.00;
	private $_Color;
	static $verbose = FALSE;

	public function	getX() {return ($this->_x);}
	public function	getY() {return ($this->_y);}
	public function	getZ() {return ($this->_z);}
	public function	getW() {return ($this->_w);}
	public function	getColor() {return ($this->_color);}


	public function	setX($val)
	{
		if (!(isset($val)))
		{
			echo "X can't be set. (Parameter missing)\n";
			return ;
		}
		$this->_x = $val;
		return ;
	}

	public function	setY($val)
	{
		if (!(isset($val)))
		{
			echo "Y can't be set. (Parameter missing)\n";
			return ;
		}
		$this->_y = $val;
		return ;
	}
	
	public function	setZ($val)
	{
		if (!(isset($val)))
		{
			echo "Z can't be set. (Parameter missing)\n";
			return ;
		}
		$this->_z = $val;
		return ;
	}
	
	public function	setW($val)
	{
		if (!(isset($val)))
		{
			echo "W can't be set. (Parameter missing)\n";
			return ;
		}
		$this->_w = $val;
		return ;
	}
	
	public function	setColor($val)
	{
		if (!(isset($val)))
		{
			echo "Color can't be set. (Parameter missing)\n";
			return ;
		}
		$this->_Color = $val;
		return ;
	}

	function	__construct($array)
	{
		if (array_key_exists('x', $array))
			$this->_x = number_format($array['x'], 2);
		if (array_key_exists('y', $array))
			$this->_y = number_format($array['y'], 2);
		if (array_key_exists('z', $array))
			$this->_z = number_format($array['z'], 2);
		if (array_key_exists('w', $array))
			$this->_w = number_format($array['w'], 2);
		else
			$this->_w = number_format("1", 2);
		if (array_key_exists('color', $array))
			$this->_Color = $array['color'];
		else
			$this->_Color = new Color (array('red' => 255, 'green' => 255, 'blue' => 255));
		if (self::$verbose)
			echo $this." constructed.\n";
		return;
	}
	function	__toString()
	{
		return "Vertex( x: $this->_x, y: $this->_y, z: $this->_z, w: $this->_w, $this->_Color )";
	}
	function	__destruct()
	{
		if (self::$verbose)
			echo $this." destructed.\n";
		return;
	}
	static function		doc()
	{
		if (file_exists("Vertex.doc.txt"))
			echo file_get_contents("Vertex.doc.txt");
		else
			echo "No doc.\n";
	}
}

?>
