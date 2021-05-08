<?php
/**
 * Комплексное число
 */

class Complex
{
	private $real;
	private $imaginary;
	
	public function __construct(float $re, float $im = null)
	{
		$this->real = $re;
		$this->imaginary = is_null($im) ? 0 : $im;
	}
	
	public function __get($prop)
	{
		if (property_exists($this, $prop)) {
			return $this->$prop;
		}
	}
	
	public function __set($prop, $value)
	{
	}	
	
	public function set($prop, $value)
	{
		if (property_exists($this, $prop) && !is_null($value)) {
			$this->$prop = $value;
		}
	}
	
	public function getComplexAlgebraicForm()
	{
		return sprintf('%s', $this->real).(empty($this->imaginary) ? '' : ($this->imaginary > 0 ? '+' : '').sprintf('%s', $this->imaginary).'i');
	}
}

?>