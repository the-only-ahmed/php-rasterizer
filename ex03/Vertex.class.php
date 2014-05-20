<?php

require_once 'Color.class.php';

class	Vertex{
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1;
	private $_Color;
	static $verbose = FALSE;

	public function	getX() {return ($this->_x);}
	public function	getY() {return ($this->_y);}
	public function	getZ() {return ($this->_z);}
	public function	getW() {return ($this->_w);}
	public function	getColor() {return ($this->_color);}


	public function	setX($val)
	{
		$this->_x = $val;
		return ;
	}

	public function	setY($val)
	{
		$this->_y = $val;
		return ;
	}
	
	public function	setZ($val)
	{
		$this->_z = $val;
		return ;
	}
	
	public function	setW($val)
	{
		$this->_w = $val;
		return ;
	}
	
	public function	setColor($val)
	{
		$this->_Color = $val;
		return ;
	}

	function	__construct($array)
	{
		if (array_key_exists('x', $array))
			$this->_x = $array['x'];
		if (array_key_exists('y', $array))
			$this->_y = $array['y'];
		if (array_key_exists('z', $array))
			$this->_z = $array['z'];
		if (array_key_exists('w', $array))
			$this->_w = $array['w'];
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
		return "Vertex( x: ".round($this->_x, 2).", y: ".round($this->_y, 2).", z: ".round($this->_z, 2).", w: ".round($this->_w, 2).", $this->_Color )";
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
