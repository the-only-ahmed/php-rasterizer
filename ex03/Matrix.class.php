<?php

require_once 'Vector.class.php';

class	Matrix{
	const	IDENTITY = 1;
	const	SCALE = 2;
	const	RX = 3;
	const	RY = 4;
	const	RZ = 5;
	const	TRANSLATION = 6;
	const	PROJECTION = 7;
	static	$verbose = FALSE;
	private	$M;

	private function	setM00($val) {$this->M[0][0] = $val;}
	private function	setM01($val) {$this->M[0][1] = $val;}
	private function	setM02($val) {$this->M[0][2] = $val;}
	private function	setM03($val) {$this->M[0][3] = $val;}

	private function	setM10($val) {$this->M[1][0] = $val;}
	private function	setM11($val) {$this->M[1][1] = $val;}
	private function	setM12($val) {$this->M[1][2] = $val;}
	private function	setM13($val) {$this->M[1][3] = $val;}

	private function	setM20($val) {$this->M[2][0] = $val;}
	private function	setM21($val) {$this->M[2][1] = $val;}
	private function	setM22($val) {$this->M[2][2] = $val;}
	private function	setM23($val) {$this->M[2][3] = $val;}

	private function	setM30($val) {$this->M[3][0] = $val;}
	private function	setM31($val) {$this->M[3][1] = $val;}
	private function	setM32($val) {$this->M[3][2] = $val;}
	private function	setM33($val) {$this->M[3][3] = $val;}

	public function	mult(Matrix $mat)
	{
		$new_m = clone $this;
		$new->setM00(($this->M[0][0] * $mat->M[0][0]) + ($this->M[0][1] * $mat->M[1][0]) + ($this->M[0][2] * $mat->M[2][0]) + ($this->M[0][3] * $mat->M[3][0]));
		$new->setM01(($this->M[0][0] * $mat->M[0][1]) + ($this->M[0][1] * $mat->M[1][1]) + ($this->M[0][2] * $mat->M[2][1]) + ($this->M[0][1] * $mat->M[3][1]));
		$new->setM02(($this->M[0][0] * $mat->M[0][2]) + ($this->M[0][1] * $mat->M[1][2]) + ($this->M[0][2] * $mat->M[2][2]) + ($this->M[0][3] * $mat->M[3][2]));
		$new->setM03(($this->M[0][0] * $mat->M[0][3]) + ($this->M[0][1] * $mat->M[1][3]) + ($this->M[0][2] * $mat->M[2][3]) + ($this->M[0][3] * $mat->M[3][3]));

		$new->setM10(($this->M[1][0] * $mat->M[0][0]) + ($this->M[1][1] * $mat->M[1][0]) + ($this->M[1][2] * $mat->M[2][0]) + ($this->M[1][3] * $mat->M[3][0]));
		$new->setM11(($this->M[1][0] * $mat->M[0][1]) + ($this->M[1][1] * $mat->M[1][1]) + ($this->M[1][2] * $mat->M[2][1]) + ($this->M[1][1] * $mat->M[3][1]));
		$new->setM12(($this->M[1][0] * $mat->M[0][2]) + ($this->M[1][1] * $mat->M[1][2]) + ($this->M[1][2] * $mat->M[2][2]) + ($this->M[1][3] * $mat->M[3][2]));
		$new->setM13(($this->M[1][0] * $mat->M[0][3]) + ($this->M[1][1] * $mat->M[1][3]) + ($this->M[1][2] * $mat->M[2][3]) + ($this->M[1][3] * $mat->M[3][3]));

		$new->setM20(($this->M[2][0] * $mat->M[0][0]) + ($this->M[2][1] * $mat->M[1][0]) + ($this->M[2][2] * $mat->M[2][0]) + ($this->M[2][3] * $mat->M[3][0]));
		$new->setM21(($this->M[2][0] * $mat->M[0][1]) + ($this->M[2][1] * $mat->M[1][1]) + ($this->M[2][2] * $mat->M[2][1]) + ($this->M[2][1] * $mat->M[3][1]));
		$new->setM22(($this->M[2][0] * $mat->M[0][2]) + ($this->M[2][1] * $mat->M[1][2]) + ($this->M[2][2] * $mat->M[2][2]) + ($this->M[2][3] * $mat->M[3][2]));
		$new->setM23(($this->M[2][0] * $mat->M[0][3]) + ($this->M[2][1] * $mat->M[1][3]) + ($this->M[2][2] * $mat->M[2][3]) + ($this->M[2][3] * $mat->M[3][3]));

		$new->setM30(($this->M[3][0] * $mat->M[0][0]) + ($this->M[3][1] * $mat->M[1][0]) + ($this->M[3][2] * $mat->M[2][0]) + ($this->M[3][3] * $mat->M[3][0]));
		$new->setM31(($this->M[3][0] * $mat->M[0][1]) + ($this->M[3][1] * $mat->M[1][1]) + ($this->M[3][2] * $mat->M[2][1]) + ($this->M[3][1] * $mat->M[3][1]));
		$new->setM32(($this->M[3][0] * $mat->M[0][2]) + ($this->M[3][1] * $mat->M[1][2]) + ($this->M[3][2] * $mat->M[2][2]) + ($this->M[3][3] * $mat->M[3][2]));
		$new->setM33(($this->M[3][0] * $mat->M[0][3]) + ($this->M[3][1] * $mat->M[1][3]) + ($this->M[3][2] * $mat->M[2][3]) + ($this->M[3][3] * $mat->M[3][3]));
		return ($new_m);
	}
	private function	create()
	{
		$this->M[0][0] = 1;
		$this->M[0][1] = 0;
		$this->M[0][2] = 0;
		$this->M[0][3] = 0;

		$this->M[1][0] = 0;
		$this->M[1][1] = 1;
		$this->M[1][2] = 0;
		$this->M[1][3] = 0;

		$this->M[2][0] = 0;
		$this->M[2][1] = 0;
		$this->M[2][2] = 1;
		$this->M[2][3] = 0;

		$this->M[3][0] = 0;
		$this->M[3][1] = 0;
		$this->M[3][2] = 0;
		$this->M[3][3] = 1;
		return ($this->M);
	}

	private function	create_scale($val)
	{
		$new_c = clone $this;
		$new_c->setM00($val);
		$new_c->setM11($val);
		$new_c->setM22($val);
		return ($new_c);
	}
	private function	create_translation(Vector $vect)
	{
		$new_c = clone $this;
		$new_c->setM03($vect->getX());
		$new_c->setM13($vect->getY());
		$new_c->setM23($vect->getZ());
		return ($new_c);
	}
	private function	create_rx($angle)
	{
		$new_c = clone $this;
		$new_c->setM11(cos($angle));
		$new_c->setM12(sin($angle) * (-1));
		$new_c->setM21(sin($angle));
		$new_c->setM22(cos($angle));
		return ($new_c);
	}
	private function	create_ry($angle)
	{
		$new_c = clone $this;
		$new_c->setM00(cos($angle));
		$new_c->setM02(sin($angle));
		$new_c->setM20(sin($angle) * (-1));
		$new_c->setM22(cos($angle));
		return ($new_c);
	}
	private function	create_rz($angle)
	{
		$new_c = clone $this;
		$new_c->setM00(cos($angle));
		$new_c->setM01(sin($angle) * (-1));
		$new_c->setM10(sin($angle));
		$new_c->setM11(cos($angle));
		return ($new_c);
	}
	public function	transformVertx($ver)
	{
		$new_v = clone $ver;
		$new_v->setX(($new_v->getX() * $this->M[0][0]) + ($new_v->getY() * $this->M[0][1]) + ($new_z->getZ() * $this->M[0][2]) + $this->M[0][3]); 
		$new_v->setY(($new_v->getX() * $this->M[1][0]) + ($new_v->getY() * $this->M[1][1]) + ($new_z->getZ() * $this->M[1][2]) + $this->M[1][3]); 
		$new_v->setZ(($new_v->getX() * $this->M[2][0]) + ($new_v->getY() * $this->M[2][1]) + ($new_z->getZ() * $this->M[2][2]) + $this->M[2][3]);
	   return ($new_v);	
	}

	function	__construct($array)
	{
		if (array_key_exists('preset', $array)) //obligatoire: type de la matrice (scale, translation, rotation, projection)
		{
			$this->preset = $array['preset'];
			if ($array['preset'] == self::SCALE)
			{
				if (array_key_exists('scale', $array)) //obligatoire if preset == scale
					$this->M = $this->create_scale($array['scale']);
				if (self::$verbose)
					echo "Matrix SCALE preset instance constructed\n";	
			}
			else if ($array['preset'] == self::RX)
			{
				if (array_key_exists('angle', $array)) //obligatoire if preset indicate a rotation matrix
					$this->M = $this->create_rx($array['angle']);
				if (self::$verbose)
					echo "Matrix Ox ROTATION preset instance constructed\n";	
			}
			else if ($array['preset'] == self::RY)
			{
				if (array_key_exists('angle', $array)) //obligatoire if preset indicate a rotation matrix
					$this->M = $this->create_ry($array['angle']);
				if (self::$verbose)
					echo "Matrix Oy ROTATION preset instance constructed\n";	
			}
			else if ($array['preset'] == self::RZ)
			{
				if (array_key_exists('angle', $array)) //obligatoire if preset indicate a rotation matrix
					$this->M = $this->create_rz($array['angle']);
				if (self::$verbose)
					echo "Matrix Oz ROTATION preset instance constructed\n";	
			}
			else if ($array['preset'] == self::TRANSLATION)
			{
				if (array_key_exists('vtc', $array)) //obligatoire if preset == translation
					$this->M = $this->create_translation($array['vtc']);
				if (self::$verbose)
					echo "Matrix TRANSLATION preset instance constructed\n";	
			}
		/*	else if ($array['preset'] == PROJECTION)
			{
				if (array_key_exists('fov', $array)) //obligatoire for the projection matrix
					$fov = $array['fov'];
				if (array_key_exists('ratio', $array)) //obligatoire for the projection matrix
					$ratio = $array['ratio'];
				if (array_key_exists('near', $array)) //obligatoire for the projection matrix
					$near = $array['near'];
				if (array_key_exists('far', $array)) //obligatoire for the projection matrix
					$far = $array['far'];
				$this = $this->create_projection($fov, $ratio, $near, $far);
			}*/
			else if ($array['preset'] == self::IDENTITY)
			{
				$this->M = $this->create();
				if (self::$verbose)
					echo "Matrix IDENTITY instance constructed\n";	
			}
			else
			{
				echo "ERROR\n";
				return;
			}
			return;
		}
		
		if (self::$verbose)
			echo $this->write();
		return;
	}
	private function	write()
	{
		$str = "M | vtcX | vtcY | vtcZ | vtc0\n-----------------------------";
		$str2 =	"x | ".number_format($this->M[0][0], 2)." | ".number_format($this->M[0][1], 2)." | ".number_format($this->M[0][2], 2)." | ".number_format($this->M[0][3], 2);
		$str3 = "y | ".number_format($this->M[1][0], 2)." | ".number_format($this->M[1][1], 2)." | ".number_format($this->M[1][2], 2)." | ".number_format($this->M[1][3], 2);
		$str4 = "z | ".number_format($this->M[2][0], 2)." | ".number_format($this->M[2][1], 2)." | ".number_format($this->M[2][2], 2)." | ".number_format($this->M[2][3], 2);
		$str5 = "w | ".number_format($this->M[3][0], 2)." | ".number_format($this->M[3][1], 2)." | ".number_format($this->M[3][2], 2)." | ".number_format($this->M[3][3], 2);

		return ("$str$str1\n$str2\n$str3\n$str4\n$str5");
	}
	function	__toString()
	{
		return ($this->write());
	}
	function	__destruct()
	{
		if (self::$verbose)
			echo "destructed.\n";
		return;
	}
	static function	doc()
	{
		if (file_exists("Matrix.doc.txt"))
			echo file_get_contents("Matrix.doc.txt");
		else
			echo "No doc\n";
	}

}

?>
