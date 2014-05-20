<?php
	
require_once 'Vertex.class.php';

class	Vector{
	private	$_x = 0;
	private	$_y = 0;
	private	$_z = 0;
	private	$_w = 0;
	static	$verbose = FALSE;

	public function	getX() {return ($this->_x);}
	public function	getY() {return ($this->_y);}
	public function	getZ() {return ($this->_z);}
	public function	getW() {return ($this->_w);}

	private function	setX($val)
	{
		if (!(isset($val)))
		{
			echo "X can't be set. (Missing parameter)\n";
			return;
		}
		$this->_x = $val;
	}
	private function	setY($val) 
	{
		if (!(isset($val)))
		{
			echo "Y can't be set. (Missing parameter)\n";
			return;
		}
		$this->_y = $val;
	}
	private function	setZ($val)
	{
		if (!(isset($val)))
		{
			echo "Z can't be set. (Missing parameter)\n";
			return;
		}
		$this->_z = $val;
	}
	private function	setW($val) 
	{
		if (!(isset($val)))
		{
			echo "W can't be set. (Missing parameter)\n";
			return;
		}
		$this->_w = $val;
	}

	public function	magnitude()
	{
		$x = pow($this->_x, 2);
		$y = pow($this->_y, 2);
		$z = pow($this->_z, 2);
		$w = pow($this->_w, 2);
		return (sqrt($x + $y + $z + $w));
	}
	public function	normalize()
	{
		$norm = $this->magnitude();
		$c = clone $this;
		if ($norm > 0)
		{
			$inv = 1 / $norm;
			$c->setX($this->_x * $inv);
			$c->setY($this->_y * $inv);
			$c->setZ($this->_z * $inv);
			$c->setW($this->_w * $inv);
		}
		$this->write($c);
		return ($c);
	}
	public function	add(Vector $vect)
	{
		if (!isset($vect))
		{
			echo "ERROR: Vector can not be created\n";
			return;
		}
		$c = clone $this;
		$c->setX($this->_x + $vect->getX());
		$c->setY($this->_y + $vect->getY());
		$c->setZ($this->_z + $vect->getZ());
		$c->setW($this->_w + $vect->getW());

		$this->write($c);
		return ($c);
	}
	public function	sub(Vector $vect)
	{
		if (!isset($vect))
		{
			echo "ERROR: Vector can not be created\n";
			return;
		}
		$c = clone $this;
		$c->setX($this->_x - $vect->getX());
		$c->setY($this->_y - $vect->getY());
		$c->setZ($this->_z - $vect->getZ());
		$c->setW($this->_w - $vect->getW());

		$this->write($c);
		return ($c);
	}
	public function	opposite()
	{
		$c = clone $this;
		$c->setX($this->_x * (-1));
		$c->setY($this->_y * (-1));
		$c->setZ($this->_z * (-1));
		$c->setW($this->_w * (-1));

		$this->write($c);
		return ($c);
	}
	public function	scalarProduct($k)
	{
		if (!isset($k))
		{
			echo "ERROR: Vector can not be created\n";
			return;
		}
		$c = clone $this;
		$c->setX($this->_x * $k);
		$c->setY($this->_y * $k);
		$c->setZ($this->_z * $k);
		$c->setW($this->_w * $k);

		$this->write($c);
		return ($c);
	}
	public function	dotProduct(Vector $vect)
	{
		$x = $this->_x * $vect->getX();
		$y = $this->_y * $vect->getY();
		$z = $this->_z * $vect->getZ();
		$w = $this->_w * $vect->getW();
		return ($x + $y + $z);
	}
	public function	cos(Vector $vect)
	{
		if (!isset($vect))
		{
			echo "ERROR: Cos can not be calculated\n";
			return;
		}
		$dot = $this->dotProduct($vect);
		$a = $this->magnitude();
		$b = $vect->magnitude();
		return ($dot / ($a * $b));
	}
	public function	crossProduct(Vector $vect)
	{
		if (!isset($vect))
		{
			echo "ERROR: Vector can not be created\n";
			return;
		}
		$c = clone $this;
		$c->setX(($this->_y * $vect->getZ()) - ($this->_z * $vect->getY()));
		$c->setY(($this->_z * $vect->getX()) - ($this->_x * $vect->getZ()));
		$c->setZ(($this->_x * $vect->getY()) - ($this->_y * $vect->getX()));

		$this->write($c);
		return ($c);
	}

	private function	write($vect)
	{
		if (self::$verbose)
			echo $vect." constructed.\n";
	}

	function	__construct($array)
	{
		if (array_key_exists('orig', $array))
			$orig = clone $array['orig'];
		else
			$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
		if (array_key_exists('dest', $array))
			$dest = $array['dest'];
		else
		{
			echo "ERROR: Vector can not be created\n";
			return;
		}
		$this->_x = $dest->getX() - $orig->getX();
		$this->_y = $dest->getY() - $orig->getY();
		$this->_z = $dest->getZ() - $orig->getZ();
		$this->_w = $dest->getW() - $orig->getW();
		
		$this->write($this);
		return;
	}
	function	__toString()
	{
		return "Vector( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w: ".number_format($this->_w, 2)." )";
	}
	function	__destruct()
	{
		if (self::$verbose)
			echo $this." destructed.\n";
		return;
	}
	static function	doc()
	{
		if (file_exists("Vector.doc.txt"))
			echo file_get_contents("Vector.doc.txt");
		else
			echo "No doc.\n";
	}
}

?>
